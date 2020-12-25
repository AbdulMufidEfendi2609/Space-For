<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Event;
use App\Participant;
use App\Pembayaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addevent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'event_name' => 'required|string|max:128',
            'deskripsi' => 'required|string',
            'dateNow' => 'required',
            'start_date' => 'required|after_or_equal:dateNow',
            'start_time' => 'required',
            'end_date' => 'required|after_or_equal:dateNow',
            'end_time' => 'required',
            'lokasi' => 'required|string|max:50',
            'image_file' => 'required|mimes:jpeg,jpg,png,gif',
            'kategori' => 'required',
            'event_privacy' => 'required',
            'package' => 'required',
            'limit_participant' => 'required',
            'link' => 'required',
            'email_contact' => 'required|email',
        ]);

        // dd($validate);

        $validate['user_id'] = auth()->user()->id;
        $validate['price'] = $request->input('price');
        if ($request->input('package') == "Professional") {
            $validate['status'] = "pending";
        }

        if ($request->hasFile('image_file')) {
            $validate['image'] = $request->file('image_file')->store('public/event_images');
        }
        // dd($validate);

        Event::create($validate);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::where('user_id', auth()->user()->id)->findOrFail($id);
        return view('editevent', [
            'event' => $event
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $validate = $this->validate($request, [
            'event_name' => 'required|string|max:128',
            'deskripsi' => 'required|string',
            'dateNow' => 'required',
            'start_date' => 'required|after_or_equal:dateNow',
            'start_time' => 'required',
            'end_date' => 'required|after_or_equal:dateNow',
            'end_time' => 'required',
            'lokasi' => 'required|string|max:50',
            'image_file' => 'required|mimes:jpeg,jpg,png,gif',
            'kategori' => 'required',
            'event_privacy' => 'required',
            'package' => 'required',
            'limit_participant' => 'required',
            'link' => 'required',
            'email_contact' => 'required|email',
            'status' => 'nullable'
        ]);

        $event = Event::findOrFail($id);
        // dd($event);

        if ($request->hasFile('image_file')) {
            Storage::delete($event->image);
            $validate['image'] = $request->file('image_file')->store('public/event_images');
        }

        $event->update($validate);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {
        $event = Event::where('user_id', auth()->user()->id)->findOrFail($id);
        $event->delete();

        return redirect()->back();
    }

    public function detail($id)
    {
        $event = Event::findOrFail($id);
        // dd($event);
        return view('_detailEvent', compact('event'));
    }

    public function daftar($id)
    {
        $event = Event::findOrFail($id);
        $participant = Participant::where('user_id', Auth::user()->id)->get();
        foreach ($participant as $item) {
            if ($event->start_date == $item->events->start_date) {
                if ($event->start_time == $item->events->start_time) {
                    return back()->with('alert', 'Anda telah mengikuti event di tanggal dan jam yang sama');
                }
                return back()->with('alert', 'Anda telah mengikuti event di tanggal yang sama');
            }
        }

        // dd(Auth::user()->id);

        $participant = new Participant();
        $participant->user_id = Auth::user()->id;
        $participant->event_id = $id;

        if ($event->package == 'Professional') {
            $participant->status = "belum bayar";
        }
        $participant->save();

        return back();
    }

    public function showAll()
    {
        $participants = Participant::where('user_id', Auth::user()->id)->get()->all();
        $events = Event::where('status', 'publish')->get()->all();
        $ourEvent = Event::where('user_id', Auth::user()->id)->get()->all();

        return view('event', compact(['participants', 'events', 'ourEvent']));
    }

    public function presence($id)
    {
        $event = Event::findOrFail($id);
        $participants = Participant::where(['event_id' => $id, 'status' => 'present'])->get()->all();
        $present =
            Participant::where(['event_id' => $id, 'user_id' => Auth::user()->id])->value('status');
        // dd($participantEvent);
        return view('_participant-present', compact('participants', 'id', 'present', 'event'));
    }

    public function submitPresence(Request $request, $id)
    {
        // dd($request->all());
        $validate = $request->validate([
            'nama_lengkap' => 'required|string|max:128',
            'no_hp' => 'required|max:14',
            'email' => 'required|email|max:50'
        ]);

        Participant::where(['event_id' => $id, 'user_id' => Auth::user()->id])->update([
            "status" => "present",
            "nama_lengkap" => $request->input('nama_lengkap'),
            "no_hp" => $request->input('no_hp'),
            "email" => $request->input('email')
        ]);

        return back();
    }

    public function participant_event($id)
    {
        $event = Event::findOrFail($id);

        if ($event->package == "Free") {
            $participants = Participant::where(['event_id' => $id, 'status' => "present"])->get();
        } else {
            $participants = Participant::where(['event_id' => $id, 'status' => "sudah bayar"])->orWhere('status', 'proses')->orWhere('status', 'present')->get();
        }

        return view('_participant_event', compact('event', 'participants'));
    }

    public function deleteParticipant($id)
    {
        $participant = Participant::findOrFail($id);
        $participant->delete();

        return back();
    }

    public function verifikasiParticipant($id)
    {
        $participant = Participant::findOrFail($id);
        $participant->status = 'sudah bayar';
        $participant->save();

        Pembayaran::where(['user_id' => $participant->user_id, 'event_id' => $participant->event_id])->update([
            'status' => 'berhasil'
        ]);

        return back();
    }

    public function postSertif(Request $request, $id)
    {
        if ($request->file('image')) {
            $path = $request->file('image')->store('image', 'public');
        }

        DB::table('sertifikat')->insert([
            'event_id' => $id,
            'sertifikat' => $path
        ]);

        return back();
    }

    public function download($id)
    {
        $sertifikat = DB::table('sertifikat')->where('event_id', $id)->value('sertifikat');
        // dd($sertifikat);

        return response()->download(storage_path("app/public/{$sertifikat}"));
    }

    public function ajaxGetEvent($id)
    {
        $data = Event::findOrFail($id);

        return json_encode($data);
    }
}

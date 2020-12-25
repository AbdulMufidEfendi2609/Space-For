<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pembayaran;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.events.index', [
            'events' => Event::with('user')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.create', [
            'users' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validate($request, [
            'event_name' => 'required|string',
            'user_id' => 'required|numeric|exists:users,id',
            'deskripsi' => 'required|string',
            'start_date' => 'required',
            'start_time' => 'required',
            'end_date' => 'required',
            'end_time' => 'required',
            'lokasi' => 'required',
            'image_file' => 'required|mimes:jpeg,jpg,png,gif',
            'kategori' => 'required',
            'event_privacy' => 'required',
            'package' => 'required',
            'link' => 'required',
            'shorten_link' => 'required',
            'email_contact' => 'required|email'
        ]);

        if ($request->hasFile('image_file')) {
            $validate['image'] = $request->file('image_file')->store('public/event_images');
        }

        Event::create($validate);

        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->edit($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $users = User::all();
        return view('admin.events.edit', [
            'event' => $event,
            'users' => $users,
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
        $validate = $this->validate($request, [
            'event_name' => 'required|string',
            'deskripsi' => 'required|string',
            'start_date' => 'required',
            'start_time' => 'required',
            'end_date' => 'required',
            'end_time' => 'required',
            'lokasi' => 'required',
            'image_file' => 'nullable|image',
            'kategori' => 'required',
            'event_privacy' => 'required',
            'package' => 'required',
            'link' => 'required',
            'shorten_link' => 'required',
            'email_contact' => 'required|email',
            'status' => 'required'
        ]);

        $event = Event::findOrFail($id);

        if ($request->hasFile('image_file')) {
            Storage::delete($event->image);
            $validate['image'] = $request->file('image_file')->store('public/event_images');
        }

        $event->update($validate);

        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        Storage::delete($event->image);

        $event->delete();

        return redirect()->route('events.index');
    }

    public function bayarEvent()
    {
        $bayar = DB::table('pembayaran_admin')->get();
        $admin = Admin::findOrFail(1);

        return view('admin.pembayaran', compact('bayar', 'admin'));
    }
}

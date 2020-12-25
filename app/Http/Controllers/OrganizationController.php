<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Event;
use App\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrganizationController extends Controller
{
    public function index()
    {
        $organization = Organization::where('user_id', Auth::user()->id)->first();
        // dd($organization);
        return view('organization', compact('organization'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:128',
            'alamat' => 'required',
            'website' => 'required|string|max:50',
            'email' => 'required|email|max:50',
            'no_telp' => 'required|max:14',
            'logo_organisasi' => 'mimes:jpg,png,svg,jpeg',
            'foto_perusahaan' => 'mimes:jpg,png,svg,jpeg',
            'nama_bank' => 'required|string|max:32',
            'no_rek' => 'required|max:32',
            'nama_pemilik_rekening' => 'required|string|max:32',
            'nama_cabang' => 'required|string|max:32',
            'kartu_identitas' => 'required',
        ]);

        if ($request->input('kartu_identitas') == "NPWP") {
            $request->validate([
                'foto_npwp' => 'mimes:jpg,png,svg,jpeg',
                'no_npwp' => 'required|max:32',
                'nama_npwp' => 'required|string|max:128',
            ]);

            $data = new Organization();
            $data->user_id = Auth::user()->id;
            $data->nama = $request->input('nama');
            $data->alamat = $request->input('alamat');
            $data->website = $request->input('website');
            $data->email = $request->input('email');
            $data->no_telp = $request->input('no_telp');
            $data->nama_bank = $request->input('nama_bank');
            $data->no_rek = $request->input('no_rek');
            $data->nama_pemilik_rekening = $request->input('nama_pemilik_rekening');
            $data->nama_cabang = $request->input('nama_cabang');
            $data->kartu_identitas = $request->input('kartu_identitas');
            $data->no_npwp = $request->input('no_npwp');
            $data->nama_npwp = $request->input('nama_npwp');

            if ($request->file('logo_organisasi')) {
                $logo_path = $request->file('logo_organisasi')->store('image', 'public');
                $data->logo_organisasi = $logo_path;
            }

            if ($request->file('foto_perusahaan')) {
                $foto_perusahaan_path = $request->file('foto_perusahaan')->store('image', 'public');
                $data->foto_perusahaan = $foto_perusahaan_path;
            }

            if ($request->file('foto_npwp')) {
                $npwp_path = $request->file('foto_npwp')->store('image', 'public');
                $data->foto_npwp = $npwp_path;
            }

            $data->save();

            return back();
        } else {
            $request->validate([
                'foto_ktp' => 'required|mimes:jpg,png,svg,jpeg',
                'nama_ktp' => 'required',
                'nik' => 'required',
            ]);

            $data = new Organization();
            $data->user_id = Auth::user()->id;
            $data->nama = $request->input('nama');
            $data->alamat = $request->input('alamat');
            $data->website = $request->input('website');
            $data->email = $request->input('email');
            $data->no_telp = $request->input('no_telp');
            $data->nama_bank = $request->input('nama_bank');
            $data->no_rek = $request->input('no_rek');
            $data->nama_pemilik_rekening = $request->input('nama_pemilik_rekening');
            $data->nama_cabang = $request->input('nama_cabang');
            $data->kartu_identitas = $request->input('kartu_identitas');
            $data->nama_ktp = $request->input('nama_ktp');
            $data->nik = $request->input('nik');

            if ($request->file('logo_organisasi')) {
                $logo_path = $request->file('logo_organisasi')->store('image', 'public');
                $data->logo_organisasi = $logo_path;
            }

            if ($request->file('foto_perusahaan')) {
                $foto_perusahaan_path = $request->file('foto_perusahaan')->store('image', 'public');
                $data->foto_perusahaan = $foto_perusahaan_path;
            }

            if ($request->file('foto_ktp')) {
                $ktp_path = $request->file('foto_ktp')->store('image', 'public');
                $data->foto_ktp = $ktp_path;
            }

            $data->save();

            return back();
        }
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
          'nama' => 'required|string|max:128',
          'alamat' => 'required',
          'website' => 'required|string|max:50',
          'email' => 'required|email|max:50',
          'no_telp' => 'required|max:14',
          'logo_organisasi' => 'mimes:jpg,png,svg,jpeg',
          'foto_perusahaan' => 'mimes:jpg,png,svg,jpeg',
          'nama_bank' => 'required|string|max:32',
          'no_rek' => 'required|max:32',
          'nama_pemilik_rekening' => 'required|string|max:32',
          'nama_cabang' => 'required|string|max:32',
          'kartu_identitas' => 'required',
        ]);

        if ($request->input('kartu_identitas') == "NPWP") {
            $request->validate([
                'foto_npwp' => 'mimes:jpg,png,svg,jpeg',
                'no_npwp' => 'required',
                'nama_npwp' => 'required',
            ]);

            $data = Organization::findOrFail($id);
            $data->nama = $request->input('nama');
            $data->alamat = $request->input('alamat');
            $data->website = $request->input('website');
            $data->email = $request->input('email');
            $data->no_telp = $request->input('no_telp');
            $data->nama_bank = $request->input('nama_bank');
            $data->no_rek = $request->input('no_rek');
            $data->nama_pemilik_rekening = $request->input('nama_pemilik_rekening');
            $data->nama_cabang = $request->input('nama_cabang');
            $data->kartu_identitas = $request->input('kartu_identitas');
            $data->no_npwp = $request->input('no_npwp');
            $data->nama_npwp = $request->input('nama_npwp');

            if ($request->file('logo_organisasi')) {
                if ($data->logo_organisasi && file_exists(storage_path('app/public/' . $data->logo_organisasi))) {
                    Storage::delete('public/' . $data->logo_organisasi);
                }
                $logo_path = $request->file('logo_organisasi')->store('image', 'public');
                $data->logo_organisasi = $logo_path;
            }

            if ($request->file('foto_perusahaan')) {
                if ($data->foto_perusahaan && file_exists(storage_path('app/public/' . $data->foto_perusahaan))) {
                    Storage::delete('public/' . $data->foto_perusahaan);
                }
                $foto_perusahaan_path = $request->file('foto_perusahaan')->store('image', 'public');
                $data->foto_perusahaan = $foto_perusahaan_path;
            }

            if ($request->file('foto_npwp')) {
                if ($data->foto_npwp && file_exists(storage_path('app/public/' . $data->foto_npwp))) {
                    Storage::delete('public/' . $data->foto_npwp);
                }
                $npwp_path = $request->file('foto_npwp')->store('image', 'public');
                $data->foto_npwp = $npwp_path;
            }

            $data->save();

            return back();
        } else {
            $request->validate([
                'foto_ktp' => 'mimes:jpg,png,svg,jpeg',
                'nama_ktp' => 'required',
                'nik' => 'required',
            ]);

            $data = Organization::findOrFail($id);
            $data->nama = $request->input('nama');
            $data->alamat = $request->input('alamat');
            $data->website = $request->input('website');
            $data->email = $request->input('email');
            $data->no_telp = $request->input('no_telp');
            $data->nama_bank = $request->input('nama_bank');
            $data->no_rek = $request->input('no_rek');
            $data->nama_pemilik_rekening = $request->input('nama_pemilik_rekening');
            $data->nama_cabang = $request->input('nama_cabang');
            $data->kartu_identitas = $request->input('kartu_identitas');
            $data->nama_ktp = $request->input('nama_ktp');
            $data->nik = $request->input('nik');

            if ($request->file('logo_organisasi')) {
                if ($data->logo_organisasi && file_exists(storage_path('app/public/' . $data->logo_organisasi))) {
                    Storage::delete('public/' . $data->logo_organisasi);
                }
                $logo_path = $request->file('logo_organisasi')->store('image', 'public');
                $data->logo_organisasi = $logo_path;
            }

            if ($request->file('foto_perusahaan')) {
                if ($data->foto_perusahaan && file_exists(storage_path('app/public/' . $data->foto_perusahaan))) {
                    Storage::delete('public/' . $data->foto_perusahaan);
                }
                $foto_perusahaan_path = $request->file('foto_perusahaan')->store('image', 'public');
                $data->foto_perusahaan = $foto_perusahaan_path;
            }

            if ($request->file('foto_ktp')) {
                if ($data->foto_ktp && file_exists(storage_path('app/public/' . $data->foto_ktp))) {
                    Storage::delete('public/' . $data->foto_ktp);
                }
                $ktp_path = $request->file('foto_ktp')->store('image', 'public');
                $data->foto_ktp = $ktp_path;
            }

            $data->save();

            return back();
        }
    }

    public function getOrganization()
    {
        $data = Organization::where('user_id', Auth::user()->id)->first();

        return json_encode($data);
    }

    public function getOrganizationId($id)
    {
        $event = Event::findOrFail($id);

        $data = Organization::where('user_id', $event->user_id)->first();

        $x = array($event, $data);

        return json_encode($x);
    }

    public function getAdmin()
    {
        $admin = Admin::findOrFail(1);

        return json_encode($admin);
    }
}

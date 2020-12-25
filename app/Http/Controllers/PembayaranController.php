<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Pembayaran;
use App\Participant;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function bayar(Request $request, $event, $organization)
    {
        $data = new Pembayaran();
        $data->user_id = Auth::user()->id;
        $data->event_id = $event;
        $data->organization_id = $organization;
        $data->tf_date = $request->input('transfer_date');
        $data->tf_time = $request->input('transfer_time');
        $data->status = "proses";

        if ($request->file('invoice_proof')) {
            $image_path = $request->file('invoice_proof')->store('image', 'public');
            $data->bukti_tf = $image_path;
        }
        $data->save();

        Participant::where(['user_id' => Auth::user()->id, 'event_id' => $event])->update([
            "status" => "proses"
        ]);


        return back();
    }

    public function data_admin(Request $request)
    {
        // dd($request->all());
        $admin = Admin::all();
        if (count($admin) == 0) {
            $data = new Admin();
            $data->bank_name = $request->input('bank_name');
            $data->bank_account_number = $request->input('bank_account_number');
            $data->bank_account_owner = $request->input('bank_account_owner');
            $data->bank_branch_name = $request->input('bank_branch_name');
            $data->save();
        } else {
            $adminUpdate = Admin::findOrFail(1);
            $adminUpdate->bank_name = $request->input('bank_name');
            $adminUpdate->bank_account_number = $request->input('bank_account_number');
            $adminUpdate->bank_account_owner = $request->input('bank_account_owner');
            $adminUpdate->bank_branch_name = $request->input('bank_branch_name');
            $adminUpdate->save();
        }

        return back();
    }

    public function bayarEvent(Request $request, $id)
    {
        // dd($id);
        if ($request->file('invoice_proof')) {
            $image_path = $request->file('invoice_proof')->store('image', 'public');
        }
        DB::table('pembayaran_admin')->insert([
            "event_id" => $id,
            'tf_date' => $request->input('transfer_date'),
            'tf_time' => $request->input('transfer_time'),
            'bukti_tf' => $image_path,
            'status' => 'proses'
        ]);

        Event::where('id', $id)->update([
            'status' => 'proses'
        ]);

        return back();
    }

    public function verifikasiPembayaranAdmin($id)
    {
        DB::table('pembayaran_admin')->where('id', $id)->update([
            'status' => 'berhasil'
        ]);

        Event::where('id', DB::table('pembayaran_admin')->where('id', $id)->value('event_id'))->update([
            'status' => 'publish'
        ]);

        return back();
    }
}

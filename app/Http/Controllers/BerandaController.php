<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Event;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Event::where('status', 'publish')->get()->take(3);
        return view('profil.home', ['data' => $data]);
    }

    public function profile()
    {
        $user = auth()->user();
        return view('profileuser', compact('user'));
    }

    public function updateProfile(Request $request)
    {

        $user = auth()->user();
        $validate = $this->validate($request, [
            'name' => 'required|string|max:1',
            'gender' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'jenis' => 'required',
            'organisasi' => 'required',
            'posisi' => 'required',
            'level' => 'required|in:admin,penyedia,user'
        ]);
        if ($user->password !== $request->get('password')) {
            $validate['password'] = app('hash')->make($request->get('password'));
        }
        $user->update($validate);
        return redirect()->back()->withSuccess('Profile berhasil diupdate');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

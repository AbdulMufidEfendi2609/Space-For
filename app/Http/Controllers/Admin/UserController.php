<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'name' => 'required|max:255',
            'gender' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'jenis' => 'required',
            'organisasi' => 'required',
            'posisi' => 'required',
            'level' => 'required|in:admin,penyedia,user'
        ]);
        $validate['password'] = app('hash')->make($request->get('password'));
        User::create($validate);
        
        return redirect()->route('users.index');
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
        $user = User::findOrFail($id);

        return view('admin.users.edit', [
            'user' => $user
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
            'name' => 'required|max:255',
            'gender' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'jenis' => 'required',
            'organisasi' => 'required',
            'posisi' => 'required',
            'level' => 'required|in:admin,penyedia,user'
        ]);
        $user = User::findOrFail($id);
        if ($user->password !== $request->get('password')) {
            $validate['password'] = app('hash')->make($request->get('password'));
        }
        $user->update($validate);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('users.index');
    }
}

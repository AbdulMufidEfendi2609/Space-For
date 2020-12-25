<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input; //untuk input::get
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Redirect; //untuk redirect

use Illuminate\Http\Request;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
  use AuthenticatesUsers;

  public function login()
  {
    return view('otentikasi.login');
  }

  public function logout(Request $request)
  {
    Auth::logout();
    return redirect('/');
  }

  public function postlogin(Request $request)
  {
    if (Auth::attempt($request->only('email', 'password'))) {
      $user = auth()->user();
      $redirectTo = '/';
      if ($user->level === 'admin') {
        $redirectTo = '/admin/users';
      }
      return redirect($redirectTo);
    }

    return redirect('login')->withErrors(['Login gagal!']);
  }

  public function register()
  {
    return view('otentikasi.register');
  }

  public function postregister(Request $request)
  {
    $validate = $this->validate($request, [
      'name' => 'required|max:255',
      'gender' => 'required',
      'no_hp' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required',
      'confirm' => 'required|same:password',
      'jenis' => 'required',
    ]);

    $validate['password'] = app('hash')->make($request->get('password'));

    if ($request->get('jenis') === 'penyedia') {
      $validate['level'] = 'penyedia';
    } elseif ($request->get('jenis') === 'user') {
      $validate['level'] = 'user';
    }

    User::create($validate);

    return redirect('login')->withSuccess('Pendaftaran berhasil! Silahkan login');
  }
}

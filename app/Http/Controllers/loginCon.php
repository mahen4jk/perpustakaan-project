<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class loginCon extends Controller
{
    //
    public function tmplogin()
    {
        # tampilan...
        return view('login');
    }

    public function postLogin(Request $request)
    {
        # sistem login...
        // dd($request->all());
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('dashboard')->with('toast_success', 'Selamat Datang');
        } else {
            return redirect('login')->with('toast_warning', 'Email/Password yang dimasukkan salah');
        }
    }

    public function Logout(Request $request)
    {
        # sistem logout...
        Auth::logout();
        return redirect('login')->with('toast_success', 'Berhasil Logout');
    }
}

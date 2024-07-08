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
        $input = $request->all();

        // Validasi input
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek apakah input adalah email atau username
        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (Auth::attempt([$fieldType => $input['email'], 'password' => $input['password']])) {
            return redirect('dashboard')->with('toast_success', 'Selamat Datang');
        } else {
            return redirect('login')->with('toast_warning', 'Email/Password yang dimasukkan salah');
        }

        // $input = $request->all();

        // // Validasi input
        // $request->validate([
        //     'email' => 'required|string',
        //     'password' => 'required|string',
        // ]);

        // // Cek apakah input adalah email atau username
        // $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // // Coba autentikasi berdasarkan email atau username
        // if (Auth::attempt([$fieldType => $input['email'], 'password' => $input['password']])) {
        //     return redirect()->route('dashboard')->with('toast_success', 'Selamat Datang');
        // } else {
        //     return redirect()->route('login')->with('toast_warning', 'Email/Username atau Password yang dimasukkan salah');
        // }
    }

    public function Logout(Request $request)
    {
        # sistem logout...
        Auth::logout();
        return redirect('login')->with('toast_success', 'Berhasil Logout');
    }
}

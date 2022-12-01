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
        if (Auth::attempt($request->only('email','password'))) {
            return redirect('index')->with('toast_success', 'Selamat Datang');
        }
        return redirect ('login');
    }

    public function Logout(Request $request)
    {
        # sistem logout...
        Auth::logout();
        return redirect('login');
    }
}

<?php

namespace App\Http\Controllers;

use App\MdPendik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

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
        // Validasi input
        // $request->validate([
        //     'username' => 'required|string',
        //     'password' => 'required|string',
        // ]);

        // Ambil kredensial dari request
        $credentials = $request->only('username','password');

        // Coba login dengan kredensial yang diberikan
        if (Auth::guard('pendik')->attempt($credentials)) {
            $user = Auth::guard('pendik')->user();

            \Log::info('Logged in User Roles: ' . trim($user->roles));

            // Hanya izinkan role tertentu untuk login
            if (in_array(trim($user->roles), ['admin', 'pustaka', 'kep_perpus'])) {
                return redirect()->intended('dashboard')->with('toast_success', "Selamat Datang {$user->nama_pendik}");
            } else {
                Auth::guard('pendik')->logout();
                return redirect('login')->with('toast_warning', 'Anda tidak memiliki akses');
            }
        }

        // Jika login gagal, kembali ke halaman login dengan pesan error
        return redirect('login')->with('toast_warning', 'Username atau Password salah');
    }


    public function logout()
    {
        Auth::guard('pendik')->logout();
        return redirect('login');
    }
}

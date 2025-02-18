<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function MasterPetugas()
    {
        $petugas = \App\User::all();
        return view('admin.petugas.masterpetugas', compact('petugas'));
    }

    public function FormPetugas()
    {
        return view('admin.petugas.formpetugas');
    }

    public function simpanPetugas(Request $petugas)
    {
        $validate_petugas = $petugas->validate([
            'name' => 'required',
            'username' => 'required',
            'gender' => 'required',
            'roles' => 'required',
            'email' => 'required',
            'password' => 'required',
            'status' => 'required',
        ]);

        $simpan = new \App\User();
        $simpan->insUser($petugas, ['id' => $validate_petugas]);
        return redirect('petugas/masterpetugas')->with('toast_success', 'Data Berhasil disimpan');
    }

    public function editPetugas($ptgs)
    {
        $petugas = DB::table('users')->where('id', decrypt($ptgs))->get();
        return view('admin.petugas.editpetugas', ['petugas' => $petugas]);
    }

    public function ubahPetugas(Request $petugas)
    {

        $validate_petugas = $petugas->validate([
            'name' => 'required',
            'username' => 'required',
            'gender' => 'required',
            'roles' => 'required',
            'email' => 'required',
            'password' => 'required',
            'status' => 'required',
        ]);

        $simpan = new \App\User();
        $simpan->upUser($petugas, ['id' => $validate_petugas]);
        return redirect('petugas/masterpetugas')->with('toast_success', 'Data Berhasil DiUbah');
    }
}

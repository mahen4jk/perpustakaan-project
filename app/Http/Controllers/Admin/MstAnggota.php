<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MdAnggota;
use App\MdKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MstAnggota extends Controller
{
    //
    public function MasterAnggota()
    {
        # code...
        $anggota = MdAnggota::all();
        $kelas = MdKelas::all();

        $kelas = MdKelas::select('id_kelas', 'nama_kelas')->get();
        return view('admin.masteranggota.masteranggota',compact('anggota','kelas'));
    }

    public function tambahanggota()
    {
        # code...
        $kelas = MdKelas::all();
        return view('admin.masteranggota.formanggota', compact('kelas'));
    }

    public function simpanAnggota(Request $Anggota)
    {
        # code...
        $validate_anggota = $Anggota->validate([
            'nis' => 'required',
            'nama_lengkap' => 'required',
            'j_kelamin' => 'required',
            'kelas_id' => 'required',
            'hp' => 'required',
            'status' => 'required',
        ]);
        $simpan = new MdAnggota();
        $simpan->insAnggota($Anggota, ['nis' => $validate_anggota]);
        return redirect('anggota/masteranggota')->with('toast_success', 'Data Berhasil disimpan');
    }

    public function kirimAnggota($idNIS)
    {
        //dd(decrypt($idNIS));
        # code...
        $kelas = MdKelas::all();
        $nis = DB::table('tb_anggota')->where('nis', decrypt($idNIS))->get();
        return view('admin.masteranggota.editanggota',['anggota'=> $nis],compact('kelas'));
    }

    public function ubahAnggota(Request $Anggota)
    {
        # code...
        $validate_anggota = $Anggota->validate([
            'nis' => 'required',
            'nama_lengkap' => 'required',
            'j_kelamin' => 'required',
            'kelas_id' => 'required',
            'hp' => 'required',
            'status' => 'required',
        ]);
        $simpan = new MdAnggota();
        $simpan->editAnggota($Anggota, ['nis' => $validate_anggota]);
        return redirect('anggota/masteranggota')->with('toast_success', 'Data Berhasil diubah');
    }

    public function hpsAnggota($idNIS)
    {
        # code...
        $delete = new MdAnggota();
        $delete->delAnggota($idNIS);
        return redirect('anggota/masteranggota');
    }
}

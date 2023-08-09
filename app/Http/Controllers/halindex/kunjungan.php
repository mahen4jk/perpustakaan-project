<?php

namespace App\Http\Controllers\halindex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MdAnggota;
use App\MdKelas;

class kunjungan extends Controller
{
    //
    public function show()
    {
        $anggota = MdAnggota::all();
        $kelas = MdKelas::all();

        $kelas = MdKelas::select('id_kelas', 'kelas')->get();
        return view('halindex.kunjungan.kunjungan',compact('anggota','kelas'));
    }
}

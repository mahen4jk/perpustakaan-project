<?php

namespace App\Http\Controllers\halindex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\MdAnggota;
use App\MdKelas;
use App\MdKunjungan;

class kunjungan extends Controller
{
    //
    public function show()
    {
        // $startOfWeek = Carbon::now()->startOfWeek();
        // $endOfWeek = Carbon::now()->endOfWeek();

        $Anggota = MdAnggota::all();
        $kelas = MdKelas::select('id_kelas', 'kelas')->get();
        // $kunjungan = MdKunjungan::whereBetween('tgl_kunjungan', [$startOfWeek, $endOfWeek])->paginate(10);
        $kunPaginator = MdKunjungan::paginate(10);
        $kunjungan = $kunPaginator->items();

        return view('halindex.kunjungan.kunjungan', compact('Anggota', 'kelas', 'kunPaginator', 'kunjungan'));
    }


    public function berkunjung(Request $kunjungan)
    {
        $simpan = new MdKunjungan();
        $simpan->insKunjung($kunjungan);

        return redirect()->back()->with('toast_success', 'Selamat Datang!');
    }
}

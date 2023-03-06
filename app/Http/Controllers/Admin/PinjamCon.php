<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MdAnggota;
use App\MdPinjam;
use App\MdBuku;
use Illuminate\Http\Request;

class PinjamCon extends Controller
{
    //
    public function viewpinjam()
    {
        # code...
        $Anggota = MdAnggota::all();
        $Buku = MdBuku::all();

        return view('admin.sirkulasi.peminjaman');
    }

    public function formpinjam()
    {
        $Anggota = MdAnggota::all();
        $Buku = MdBuku::all();
        $kd_pinjam = MdPinjam::kode_pinjam();
        return view('admin.sirkulasi.formpeminjaman', compact('Anggota','Buku') ,['kode_transaksi' => $kd_pinjam]);
    }
}

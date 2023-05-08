<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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
        $Peminjaman = MdPinjam::all();

        return view('admin.sirkulasi.peminjaman', compact('Peminjaman','Buku', 'Anggota'));
    }

    public function formpinjam()
    {
        $Anggota = MdAnggota::all();
        $Buku = MdBuku::all();
        $kode_pinjam = MdPinjam::kode_pinjam();
        return view('admin.sirkulasi.formpeminjaman', compact('Anggota', 'Buku'), ['kode_pinjam' => $kode_pinjam]);
    }

    public function simpanPinjam(Request $peminjaman)
    {
        # code...
        $this->validate($peminjaman, [
            'kode_pinjam' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'anggota_id' => 'required',
            'buku_id' => 'required',
        ]);

        $pinjam = new MdPinjam();
        $pinjam->insPinjam($peminjaman);
        return redirect('sirkulasi/peminjaman')->with('toast_success', 'Data Berhasil Disimpan!');
    }

    public function ubahPinjam(Request $idPinjam)
    {
        # code...
        $pinjam = new MdPinjam();
        $pinjam->updatePinjam($idPinjam);
        return redirect('sirkulasi/peminjaman');
    }
}

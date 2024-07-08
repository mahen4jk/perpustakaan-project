<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\MdBuku;
use App\MdPenerbit;
use App\MdKategori;
use App\MdDDC;
use App\MdKunjungan;
use App\MdDenda;
use App\MdAnggota;
use App\MdKembali;
use App\MdPinjam;

class Laporan extends Controller
{
    //Laporan Buku
    public function LaporanBuku()
    {
        $buku = MdBuku::all();
        $klasifikasi = MdDDC::all();
        $penerbit = MdPenerbit::all();
        $kategori = MdKategori::all();

        // $dataPinjam = DB::table('tb_peminjaman')
        //     ->join('tb_buku', 'buku_id', '=', 'id_buku')
        //     ->select(
        //         'tb_buku.judul as judul',
        //         DB::raw('count(tb_peminjaman.buku_id)as jumlah_buku')
        //     )->groupBy('tb_buku.judul')->take(10)->get();

        // $Peminjaman = $dataPinjam->mapWithKeys(function ($pinjam, $key) {
        //     return [$pinjam->judul => $pinjam->jumlah_buku];
        // });

        return view(
            'admin.laporan.laporanbuku',
            compact('buku', 'klasifikasi', 'penerbit', 'kategori')
        );
    }

    #Filter Laporan Buku

    //Laporan Sirkulasi
    public function LaporanPinjam()
    {
        # code...
        $Anggota = \App\MdAnggota::all();
        $Buku = \App\MdBuku::all();
        $Peminjaman = \App\MdPinjam::all();

        return view('admin.laporan.laporanpeminjaman', compact('Peminjaman', 'Anggota', 'Buku'));
    }

    public function LaporanKembali()
    {
        $sirPinjam = MdPinjam::all();
        $Anggota = MdAnggota::all();
        $Buku = MdBuku::all();
        $kembali = MdKembali::all();
        $Denda = MdDenda::all();
        return view('admin.laporan.laporanpengembalian', compact('sirPinjam', 'Anggota', 'Buku', 'kembali', 'Denda'));
    }

    //Laporan Kunjungan
    public function LaporanKunjungan()
    {
        $kunjungan = MdKunjungan::all();
        return view('admin.laporan.laporankunjungan', compact('kunjungan'));
    }
}

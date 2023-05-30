<?php

namespace App\Http\Controllers;

use App\MdBuku;
use App\MdAnggota;
use App\MdPinjam;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashController extends Controller
{
    public function Dashboard()
    {
        # menampilkan halaman dashboard
        $Anggota = MdAnggota::all();
        $Buku = MdBuku::all();
        // $Peminjaman = MdPinjam::all();

        // $total_buku = [];
        // $judul_buku = [];

        // $jumlah_buku = MdPinjam::select(DB::raw("count(buku_id) as jumlah_buku"))
        //     ->GroupBy(DB::raw("buku_id"))
        //     ->pluck('jumlah_buku');


        // $judul = DB::table('tb_peminjaman')
        //     ->join('tb_buku', 'buku_id', '=', 'id_buku')
        //     ->select(
        //         'tb_buku.judul',
        //         DB::raw('MAX(tb_peminjaman.buku_id) as buku_id'),
        //         DB::raw('count(tb_peminjaman.buku_id)as jumlah_buku')
        //     )
        //     ->groupBy('tb_buku.judul')->take(10)->get();


        // dd (json_encode($dataPinjam));
        // foreach ($Peminjaman as $pinjam) {
        //     # code...
        //     foreach ($Buku as $buku) {
        //         if ($buku->id_buku == $pinjam->buku_id) {
        //             $judul_buku[] = $buku->judul;
        //             $total_buku[] = $pinjam->jumlah_buku;
        //         }
        //     }
        // }

        //dd(json_encode($Peminjaman));

        // dd(json_encode($total_buku));
        // dd(json_encode($judul_buku));

        // return view('admin.dashboard', [
        //     'judul_buku' => $judul_buku,
        //     'total_buku' => $total_buku
        // ], compact('Buku', 'Anggota'));

        $dataPinjam = DB::table('tb_peminjaman')
            ->join('tb_buku', 'buku_id', '=', 'id_buku')
            ->select(
                'tb_buku.judul as judul',
                DB::raw('count(tb_peminjaman.buku_id)as jumlah_buku')
            )
            ->groupBy('tb_buku.judul')->take(10)->get();

        $Peminjaman = $dataPinjam->mapWithKeys(function ($pinjam, $key) {
            return [$pinjam->judul => $pinjam->jumlah_buku];
        });

        return view('admin.dashboard', compact('Buku', 'Anggota', 'Peminjaman'));
    }
}

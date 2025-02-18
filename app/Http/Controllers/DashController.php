<?php

namespace App\Http\Controllers;

use App\MdBuku;
use App\MdAnggota;
use App\MdKunjungan;
use App\MdPinjam;
use Carbon\Carbon;
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
        $kunjungan = MdKunjungan::all();
        $pinjam = MdPinjam::all();

        $dataPinjam = DB::table('tb_peminjaman')
            ->join('tb_buku', 'buku_id', '=', 'id_buku')
            ->select(
                'tb_buku.judul as judul',
                DB::raw('count(tb_peminjaman.buku_id)as jumlah_buku')
            )->groupBy('tb_buku.judul')->take(10)->get();

        $Peminjaman = $dataPinjam->mapWithKeys(function ($pinjam, $key) {
            return [$pinjam->judul => $pinjam->jumlah_buku];
        });

        // Mendapatkan tanggal 7 hari terakhir
        $startDate = Carbon::now()->subDays(6)->startOfDay();
        $endDate = Carbon::now()->endOfDay();
        $dates = [];
        $totals = [];

        // Isi array tanggal untuk seminggu
        for ($date = $startDate; $date <= $endDate; $date->addDay()) {
            $dates[] = $date->format('Y-m-d');
        }

        $datakunjungan = DB::table('tb_kunjungan')
            ->select(DB::raw('DATE(tgl_kunjungan) as date'), DB::raw('count(*) as total'))
            ->where('tgl_kunjungan', '>=', Carbon::now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Mengisi total kunjungan untuk setiap tanggal
        $datakunjungan = $datakunjungan->keyBy('date');
        foreach ($dates as $date) {
            $totals[] = isset($datakunjungan[$date]) ? $datakunjungan[$date]->total : 0;
        }

        return view(
            'admin.dashboard',
            compact(
                'Buku',
                'Anggota',
                'Peminjaman',
                'kunjungan',
                'pinjam',
                'dates',
                'totals'
            )
        );
    }
}

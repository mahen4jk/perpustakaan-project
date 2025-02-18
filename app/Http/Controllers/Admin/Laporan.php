<?php

namespace App\Http\Controllers\Admin;

use Dompdf\Dompdf;
use Dompdf\Options;
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
use PDF;
use Symfony\Component\HttpFoundation\RequestStack;

class Laporan extends Controller
{
    //Laporan Buku
    public function LaporanBuku()
    {
        // $penerbit = MdPenerbit::all();
        // $kategori = MdKategori::all();

        // $dataPinjam = DB::table('tb_peminjaman')
        //     ->join('tb_buku', 'buku_id', '=', 'id_buku')
        //     ->select(
        //         'tb_buku.judul as judul',
        //         DB::raw('count(tb_peminjaman.buku_id)as jumlah_buku')
        //     )->groupBy('tb_buku.judul')->take(10)->get();

        // $Peminjaman = $dataPinjam->mapWithKeys(function ($pinjam, $key) {
        //     return [$pinjam->judul => $pinjam->jumlah_buku];
        // });

        // return view('admin.laporan.laporanbuku', compact('buku', 'klasifikasi', 'penerbit', 'kategori'));

        $buku = MdBuku::all();
        $klasifikasi = MdDDC::all();

        $tahunInput = MdBuku::selectRaw("DISTINCT CONCAT(YEAR(created_at), '/', YEAR(created_at) + 1) AS tahun_ajaran")
            ->pluck('tahun_ajaran');

        return view('admin.laporan.laporanbuku', compact('buku', 'klasifikasi', 'tahunInput'));
    }

    public function filBuku(Request $request)
    {
        $tahunInput = $request->input('tahun_input');
        $tahun = explode('/', $tahunInput);

        // Validasi format input tahun
        if (count($tahun) !== 2) {
            return redirect()->back()->with('error', 'Format tahun input tidak valid.');
        }

        $startYear = $tahun[0];
        $endYear = $tahun[1];

        // Tentukan rentang tanggal dari Juli tahun yang dipilih hingga Juni tahun berikutnya
        $startDate = Carbon::create($startYear, 7, 1)->startOfDay();
        $endDate = Carbon::create($endYear, 6, 30)->endOfDay();

        // Ambil laporan buku berdasarkan rentang tanggal
        $reports = MdBuku::whereBetween('created_at', [$startDate, $endDate])->get();

        // Ambil semua tahun input yang tersedia
        $tahunInputList = MdBuku::selectRaw("DISTINCT CONCAT(YEAR(created_at), '/', YEAR(created_at) + 1) AS tahun_input")
            ->pluck('tahun_input');

        return view('admin.laporan.laporanbuku', [
            'reports' => $reports,
            'selectedTahunInput' => $tahunInput,
            'tahunInput' => $tahunInputList
        ]);
    }

    #View Cetak Laporan Buku
    public function viewBuku(Request $request)
    {
        $tahunInput = $request->input('tahun_input');
        \Log::info('viewBuku called with tahun_input: ' . $tahunInput);

        if ($tahunInput) {
            $tahun = explode('/', $tahunInput);
            if (count($tahun) === 2) {
                $startYear = $tahun[0];
                $endYear = $tahun[1];

                $startDate = Carbon::create($startYear, 7, 1)->startOfDay();
                $endDate = Carbon::create($endYear, 6, 30)->endOfDay();

                $reports = MdBuku::whereBetween('created_at', [$startDate, $endDate])->get();
            } else {
                return redirect()->back()->with('error', 'Format tahun input tidak valid.');
            }
        } else {
            $reports = MdBuku::all();
        }

        return view('admin.laporan.prLaporanBuku', [
            'reports' => $reports,
            'tahunInput' => $tahunInput
        ]);
    }

    #Cetak Laporan Buku
    public function cetakLaporanBK(Request $request)
    {
        $tahunInput = $request->input('tahun_input');
        \Log::info('viewBuku called with tahun_input: ' . $tahunInput);

        if ($tahunInput) {
            $tahun = explode('/', $tahunInput);
            if (count($tahun) === 2) {
                $startYear = $tahun[0];
                $endYear = $tahun[1];

                $startDate = Carbon::create($startYear, 7, 1)->startOfDay();
                $endDate = Carbon::create($endYear, 6, 30)->endOfDay();

                $reports = MdBuku::whereBetween('created_at', [$startDate, $endDate])->get();
            } else {
                return redirect()->back()->with('error', 'Format tahun input tidak valid.');
            }
        } else {
            $reports = MdBuku::all();
        }

        // Tentukan nama file PDF
        $filename = $tahunInput ? "laporan-buku-{$tahunInput}.pdf" : "laporan-buku-keseluruhan.pdf";

        try {
            $options = new Options();
            $options->set('debug', true);
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isPhpEnabled', true);

            $dompdf = new Dompdf($options);
            $dompdf->setPaper('A4', 'landscape');

            $html = view('admin.laporan.prLaporanBuku', compact('reports', 'tahunInput'))->render();
            $dompdf->loadHtml($html);
            $dompdf->render();

            return $dompdf->stream($filename);
        } catch (\Exception $e) {
            \Log::error('Error rendering PDF: ' . $e->getMessage());
            return 'Error rendering PDF: ' . $e->getMessage();
        }
    }

    //Laporan Sirkulasi
    #Laporan Peminjaman
    public function LaporanPinjam()
    {
        # code...
        $Anggota = \App\MdAnggota::all();
        $Buku = \App\MdBuku::all();

        // Ambil semua tahun ajaran yang tersedia
        $tahunPinjam = MdPinjam::selectRaw("DISTINCT CONCAT(YEAR(created_at), '/', YEAR(created_at) + 1) AS tahun_pinjam")
            ->pluck('tahun_pinjam');

        // Mendapatkan tanggal 7 hari terakhir
        $startDate = Carbon::now()->subDays(6)->startOfDay();
        $endDate = Carbon::now()->endOfDay();
        $dates = [];
        $totals = [];

        // Isi array tanggal untuk seminggu
        for ($date = $startDate; $date <= $endDate; $date->addDay()) {
            $dates[] = $date->format('Y-m-d');
        }

        $chPinjam = DB::table('tb_peminjaman')
            ->select(DB::raw('DATE(tgl_pinjam) as date'), DB::raw('count(*) as total'))
            ->where('tgl_pinjam', '>=', Carbon::now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Mengisi total kunjungan untuk setiap tanggal
        $chPinjam = $chPinjam->keyBy('date');
        foreach ($dates as $date) {
            $totals[] = isset($chPinjam[$date]) ? $chPinjam[$date]->total : 0;
        }

        // Chart Buku yang sering di pinjam
        $dataPinjam = DB::table('tb_peminjaman')
            ->join('tb_buku', 'buku_id', '=', 'id_buku')
            ->select(
                'tb_buku.judul as judul',
                DB::raw('count(tb_peminjaman.buku_id)as jumlah_buku')
            )->groupBy('tb_buku.judul')->take(10)->get();

        $chartPinjam = $dataPinjam->mapWithKeys(function ($pinjam, $key) {
            return [$pinjam->judul => $pinjam->jumlah_buku];
        });

        // Chart Anggota yang sering pinjam
        $dataAnggota = DB::table('tb_peminjaman')
            ->join('tb_anggota', 'tb_peminjaman.anggota_id', '=', 'tb_anggota.id_anggota')
            ->select(
                'tb_anggota.nama_anggota as nama_anggota',
                DB::raw('count(tb_peminjaman.kode_pinjam) as jumlah_peminjaman')
            )
            ->groupBy('tb_anggota.id_anggota', 'tb_anggota.nama_anggota')
            ->orderBy('jumlah_peminjaman', 'desc') // Mengurutkan berdasarkan jumlah peminjaman terbanyak
            ->take(10) // Mengambil 10 anggota teratas
            ->get();

        $chartAnggota = $dataAnggota->mapWithKeys(function ($pinjam) {
            return [$pinjam->nama_anggota => $pinjam->jumlah_peminjaman];
        });


        $peminjaman = MdPinjam::with(['Anggota', 'Buku'])->get();

        return view(
            'admin.laporan.laporanpeminjaman',
            compact(
                'peminjaman',
                'Anggota',
                'Buku',
                'chartPinjam',
                'chartAnggota',
                'chPinjam',
                'tahunPinjam',
                'dates',
                'totals'
            )
        );
    }

    public function filPinjam(Request $request)
    {
        $tahunPinjam = $request->input('tahun_pinjam');
        $tahun = explode('/', $tahunPinjam);

        // Validasi format input tahun
        if (count($tahun) !== 2) {
            return redirect()->back()->with('error', 'Format tahun input tidak valid.');
        }

        $startYear = $tahun[0];
        $endYear = $tahun[1];

        // Tentukan rentang tanggal dari Juli tahun yang dipilih hingga Juni tahun berikutnya
        $startDate = Carbon::create($startYear, 7, 1)->startOfDay();
        $endDate = Carbon::create($endYear, 6, 30)->endOfDay();

        // Ambil laporan buku berdasarkan rentang tanggal
        $reports = MdPinjam::whereBetween('created_at', [$startDate, $endDate])->get();

        // Ambil semua tahun input yang tersedia
        $tahunPinjamList = MdPinjam::selectRaw("DISTINCT CONCAT(YEAR(created_at), '/', YEAR(created_at) + 1) AS tahun_pinjam")
            ->pluck('tahun_pinjam');

        $dates = [];
        $totals = [];

        // Isi array tanggal untuk seminggu
        for ($date = $startDate; $date <= $endDate; $date->addDay()) {
            $dates[] = $date->format('Y-m-d');
        }

        $chPinjam = DB::table('tb_peminjaman')
            ->select(DB::raw('DATE(tgl_pinjam) as date'), DB::raw('count(*) as total'))
            ->where('tgl_pinjam', '>=', Carbon::now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Mengisi total kunjungan untuk setiap tanggal
        $chPinjam = $chPinjam->keyBy('date');
        foreach ($dates as $date) {
            $totals[] = isset($chPinjam[$date]) ? $chPinjam[$date]->total : 0;
        }

        // Chart Buku yang sering di pinjam
        $dataPinjam = DB::table('tb_peminjaman')
            ->join('tb_buku', 'buku_id', '=', 'id_buku')
            ->select(
                'tb_buku.judul as judul',
                DB::raw('count(tb_peminjaman.buku_id)as jumlah_buku')
            )->groupBy('tb_buku.judul')->take(10)->get();

        $chartPinjam = $dataPinjam->mapWithKeys(function ($pinjam, $key) {
            return [$pinjam->judul => $pinjam->jumlah_buku];
        });

        // Chart Anggota yang sering pinjam
        $dataAnggota = DB::table('tb_peminjaman')
            ->join('tb_anggota', 'tb_peminjaman.anggota_id', '=', 'tb_anggota.id_anggota')
            ->select(
                'tb_anggota.nama_anggota as nama_anggota',
                DB::raw('count(tb_peminjaman.kode_pinjam) as jumlah_peminjaman')
            )
            ->groupBy('tb_anggota.id_anggota', 'tb_anggota.nama_anggota')
            ->orderBy('jumlah_peminjaman', 'desc') // Mengurutkan berdasarkan jumlah peminjaman terbanyak
            ->take(10) // Mengambil 10 anggota teratas
            ->get();

        $chartAnggota = $dataAnggota->mapWithKeys(function ($pinjam) {
            return [$pinjam->nama_anggota => $pinjam->jumlah_peminjaman];
        });

        return view('admin.laporan.laporanpeminjaman', [
            'reports' => $reports,
            'selectedTahunPinjam' => $tahunPinjam,
            'tahunPinjam' => $tahunPinjamList,
            'chartAnggota' => $chartAnggota,
            'chartPinjam' => $chartPinjam,
            'dates' => $dates,
            'totals' => $totals
        ]);
    }

    #Preview sebelum cetak laporan peminjaman
    public function viewPinjam(Request $request)
    {
        # code...
        $Anggota = \App\MdAnggota::all();
        $Buku = \App\MdBuku::all();

        $tahunPinjam = $request->input('tahun_pinjam');
        \Log::info('viewBuku called with tahun_input: ' . $tahunPinjam);

        if ($tahunPinjam) {
            $tahun = explode('/', $tahunPinjam);
            if (count($tahun) === 2) {
                $startYear = $tahun[0];
                $endYear = $tahun[1];

                $startDate = Carbon::create($startYear, 7, 1)->startOfDay();
                $endDate = Carbon::create($endYear, 6, 30)->endOfDay();

                $reports = MdPinjam::whereBetween('created_at', [$startDate, $endDate])->get();
            } else {
                return redirect()->back()->with('error', 'Format tahun input tidak valid.');
            }
        } else {
            $reports = MdPinjam::with(['Anggota', 'Buku'])->get();
        }

        return view('admin.laporan.prLaporanPinjam', [
            'reports' => $reports,
            'tahunPinjam' => $tahunPinjam,
            'Anggota' => $Anggota,
            'Buku' => $Buku
        ]);
    }

    #Cetak Laporan Peminjaman
    public function cetakPinjam(Request $request)
    {
        # code...
        $Anggota = \App\MdAnggota::all();
        $Buku = \App\MdBuku::all();

        $tahunPinjam = $request->input('tahun_pinjam');
        \Log::info('viewBuku called with tahun_input: ' . $tahunPinjam);

        if ($tahunPinjam) {
            $tahun = explode('/', $tahunPinjam);
            if (count($tahun) === 2) {
                $startYear = $tahun[0];
                $endYear = $tahun[1];

                $startDate = Carbon::create($startYear, 7, 1)->startOfDay();
                $endDate = Carbon::create($endYear, 6, 30)->endOfDay();

                $reports = MdPinjam::whereBetween('created_at', [$startDate, $endDate])->get();
            } else {
                return redirect()->back()->with('error', 'Format tahun input tidak valid.');
            }
        } else {
            $reports = MdPinjam::with(['Anggota', 'Buku'])->get();
        }

        // Tentukan nama file PDF
        $filename = $tahunPinjam ? "laporan-peminjaman-$tahunPinjam.pdf" : "laporan-peminjaman-keseluruhan.pdf";

        try {
            $options = new Options();
            $options->set('debug', true);
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isPhpEnabled', true);

            $dompdf = new Dompdf($options);
            $dompdf->setPaper('A4', 'landscape');

            $html = view('admin.laporan.prLaporanPinjam', compact('reports', 'tahunPinjam'))->render();
            $dompdf->loadHtml($html);
            $dompdf->render();

            return $dompdf->stream($filename);
        } catch (\Exception $e) {
            \Log::error('Error rendering PDF: ' . $e->getMessage());
            return 'Error rendering PDF: ' . $e->getMessage();
        }
    }

    #Laporan Pengembalian
    public function LaporanKembali()
    {
        $sirPinjam = MdPinjam::all();
        $Anggota = MdAnggota::all();
        $Buku = MdBuku::all();
        $Denda = MdDenda::all();

        // Ambil semua tahun ajaran yang tersedia
        $tahunKembali = MdKembali::selectRaw("DISTINCT CONCAT(YEAR(created_at), '/', YEAR(created_at) + 1) AS tahun_kembali")
            ->pluck('tahun_kembali');

        // Mendapatkan tanggal 7 hari terakhir
        $startDate = Carbon::now()->subDays(6)->startOfDay();
        $endDate = Carbon::now()->endOfDay();
        $dates = [];
        $totals = [];

        // Isi array tanggal untuk seminggu
        for ($date = $startDate; $date <= $endDate; $date->addDay()) {
            $dates[] = $date->format('Y-m-d');
        }

        $chKembali = DB::table('tb_pengembalian')
            ->select(DB::raw('DATE(tgl_dikembalikan) as date'), DB::raw('count(*) as total'))
            ->where('tgl_dikembalikan', '>=', Carbon::now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Mengisi total kunjungan untuk setiap tanggal
        $chKembali = $chKembali->keyBy('date');
        foreach ($dates as $date) {
            $totals[] = isset($chKembali[$date]) ? $chKembali[$date]->total : 0;
        }

        // ChartPie Status Pengembalian
        $stsKembali = DB::table('tb_pengembalian')
            ->select('status', DB::raw('count(status) as jumlah_status'))
            ->groupBy('status')
            ->take(10)
            ->get();

        $chStatus = $stsKembali->mapWithKeys(function ($kembali) {
            return [$kembali->status => $kembali->jumlah_status];
        });

        $kembali = MdKembali::with(['sirPinjam', 'Anggota', 'Buku', 'Denda'])->get();

        return view('admin.laporan.laporanpengembalian', compact(
            'kembali',
            'sirPinjam',
            'Anggota',
            'Buku',
            'tahunKembali',
            'chStatus',
            'dates',
            'totals'
        ));
    }

    public function filKembali(Request $request)
    {
        $tahunKembali = $request->input('tahun_kembali');
        $tahun = explode('/', $tahunKembali);

        // Validasi format input tahun
        if (count($tahun) !== 2) {
            return redirect()->back()->with('error', 'Format tahun input tidak valid.');
        }

        $startYear = $tahun[0];
        $endYear = $tahun[1];

        // Tentukan rentang tanggal dari Juli tahun yang dipilih hingga Juni tahun berikutnya
        $startDate = Carbon::create($startYear, 7, 1)->startOfDay();
        $endDate = Carbon::create($endYear, 6, 30)->endOfDay();

        // Ambil laporan buku berdasarkan rentang tanggal
        $reports = MdKembali::whereBetween('created_at', [$startDate, $endDate])->get();

        // Ambil semua tahun ajaran yang tersedia
        $tahunKembalilist = MdKembali::selectRaw("DISTINCT CONCAT(YEAR(created_at), '/', YEAR(created_at) + 1) AS tahun_kembali")
            ->pluck('tahun_kembali');

        $dates = [];
        $totals = [];

        // Isi array tanggal untuk seminggu
        for ($date = $startDate; $date <= $endDate; $date->addDay()) {
            $dates[] = $date->format('Y-m-d');
        }

        $chKembali = DB::table('tb_pengembalian')
            ->select(DB::raw('DATE(tgl_dikembalikan) as date'), DB::raw('count(*) as total'))
            ->where('tgl_dikembalikan', '>=', Carbon::now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Mengisi total kunjungan untuk setiap tanggal
        $chKembali = $chKembali->keyBy('date');
        foreach ($dates as $date) {
            $totals[] = isset($chKembali[$date]) ? $chKembali[$date]->total : 0;
        }

        // ChartPie Status Pengembalian
        $stsKembali = DB::table('tb_pengembalian')
            ->select('status', DB::raw('count(status) as jumlah_status'))
            ->groupBy('status')
            ->take(10)
            ->get();

        $chStatus = $stsKembali->mapWithKeys(function ($kembali) {
            return [$kembali->status => $kembali->jumlah_status];
        });

        $sirPinjam = MdPinjam::all();
        $Anggota = MdAnggota::all();
        $Buku = MdBuku::all();

        return view('admin.laporan.laporanpengembalian', [
            'sirPinjam' => $sirPinjam,
            'Anggota' => $Anggota,
            'Buku' => $Buku,
            'dates' => $dates,
            'totals' => $totals,
            'reports' => $reports,
            'chStatus' => $chStatus,
            'selectedTahunKembali' => $tahunKembali,
            'tahunKembali' => $tahunKembalilist
        ]);
    }

    #View Pengembalian
    public function viewKembali(Request $request)
    {
        $sirPinjam = MdPinjam::all();
        $Anggota = MdAnggota::all();
        $Buku = MdBuku::all();
        $Denda = MdDenda::all();

        $tahunKembali = $request->input('tahun_kembali');
        \Log::info('viewBuku called with tahun_input: ' . $tahunKembali);

        if ($tahunKembali) {
            $tahun = explode('/', $tahunKembali);
            if (count($tahun) === 2) {
                $startYear = $tahun[0];
                $endYear = $tahun[1];

                $startDate = Carbon::create($startYear, 7, 1)->startOfDay();
                $endDate = Carbon::create($endYear, 6, 30)->endOfDay();

                $reports = MdKembali::whereBetween('created_at', [$startDate, $endDate])->get();
            } else {
                return redirect()->back()->with('error', 'Format tahun input tidak valid.');
            }
        } else {
            $reports = MdKembali::with(['sirPinjam', 'Anggota', 'Buku', 'Denda'])->get();
        }

        return view('admin.laporan.prLaporanKembali', [
            'sirPinjam' => $sirPinjam,
            'Anggota' => $Anggota,
            'Buku' => $Buku,
            'reports' => $reports,
            'tahunKembali' => $tahunKembali
        ]);
    }

    #Cetak Pengembalian
    public function cetakKembali(Request $request)
    {
        # code...
        $sirPinjam = MdPinjam::all();
        $Anggota = MdAnggota::all();
        $Buku = MdBuku::all();
        $Denda = MdDenda::all();

        $tahunKembali = $request->input('tahun_kembali');
        \Log::info('viewBuku called with tahun_input: ' . $tahunKembali);

        if ($tahunKembali) {
            $tahun = explode('/', $tahunKembali);
            if (count($tahun) === 2) {
                $startYear = $tahun[0];
                $endYear = $tahun[1];

                $startDate = Carbon::create($startYear, 7, 1)->startOfDay();
                $endDate = Carbon::create($endYear, 6, 30)->endOfDay();

                $reports = MdKembali::whereBetween('created_at', [$startDate, $endDate])->get();
            } else {
                return redirect()->back()->with('error', 'Format tahun input tidak valid.');
            }
        } else {
            $reports = MdKembali::with(['sirPinjam', 'Anggota', 'Buku', 'Denda'])->get();
        }

        // Tentukan nama file PDF
        $filename =  $tahunKembali ? 'laporan-pengembalian-'.$tahunKembali.'.pdf' : 'laporan-pengembalian-keseluruhan.pdf';

        try {
            $options = new Options();
            $options->set('debug', true);
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isPhpEnabled', true);

            $dompdf = new Dompdf($options);
            $dompdf->setPaper('A4', 'landscape');

            $html = view('admin.laporan.prLaporanKembali', compact('reports', 'tahunKembali', 'sirPinjam', 'Anggota', 'Buku'))->render();
            $dompdf->loadHtml($html);
            $dompdf->render();

            return $dompdf->stream($filename);
        } catch (\Exception $e) {
            \Log::error('Error rendering PDF: ' . $e->getMessage());
            return 'Error rendering PDF: ' . $e->getMessage();
        }
    }

    //Laporan Kunjungan
    public function LaporanKunjungan()
    {
        $kunjungan = MdKunjungan::all();
        //filter
        // Ambil semua tahun ajaran yang tersedia
        $tahunAjaran = MdKunjungan::selectRaw("DISTINCT CONCAT(YEAR(created_at), '/', YEAR(created_at) + 1) AS tahun_ajaran")
            ->pluck('tahun_ajaran');

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

        $dataAnggota = DB::table('tb_kunjungan')
            ->select(
                'nama_anggota as nama',
                DB::raw('count(nama_anggota) as total_anggota')
            )->groupBy('nama')->take(10)->get();

        $Anggota = $dataAnggota->mapWithKeys(function ($kunjungan, $key) {
            return [$kunjungan->nama => $kunjungan->total_anggota];
        });

        $dataKelas = DB::table('tb_kunjungan')
            ->select(
                'kelas',
                DB::raw('count(kelas) as total_kelas')
            )->groupBy('kelas')->take(10)->get();

        $Kelas = $dataKelas->mapWithKeys(function ($kunjungan, $key) {
            return [$kunjungan->kelas => $kunjungan->total_kelas];
        });

        return view('admin.laporan.laporankunjungan', compact(
            'kunjungan',
            'Anggota',
            'Kelas',
            'dates',
            'tahunAjaran',
            'totals'
        ));
    }

    // Filter Laporan Kunjungan
    public function filterKun(Request $request)
    {
        $tahunAjaran = $request->input('tahun_ajaran');
        $tahun = explode('/', $tahunAjaran);
        $startYear = $tahun[0];
        $endYear = $tahun[1];

        // Tentukan rentang tanggal dari Juli tahun yang dipilih hingga Juli tahun berikutnya
        $startDate = Carbon::create($startYear, 7, 1)->startOfDay();
        $endDate = Carbon::create($endYear, 6, 30)->endOfDay();

        $reports = MdKunjungan::whereBetween('created_at', [$startDate, $endDate])->get();

        // Ambil semua tahun ajaran yang tersedia
        $tahunAjaranList = MdKunjungan::selectRaw("DISTINCT CONCAT(YEAR(created_at), '/', YEAR(created_at) + 1) AS tahun_ajaran")
            ->pluck('tahun_ajaran');

        // Siapkan data untuk grafik
        $dates = [];
        $totals = [];

        for ($date = $startDate->copy()->startOfMonth(); $date <= $endDate; $date->addDay()) {
            $dates[] = $date->format('Y-m-d');
        }

        $datakunjungan = DB::table('tb_kunjungan')
            ->select(DB::raw('DATE(tgl_kunjungan) as date'), DB::raw('count(*) as total'))
            ->whereBetween('tgl_kunjungan', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $datakunjungan = $datakunjungan->keyBy('date');
        foreach ($dates as $date) {
            $totals[] = isset($datakunjungan[$date]) ? $datakunjungan[$date]->total : 0;
        }

        // Siapkan data anggota dan kelas
        $dataAnggota = DB::table('tb_kunjungan')
            ->select('nama_anggota as nama', DB::raw('count(nama_anggota) as total_anggota'))
            ->whereBetween('tgl_kunjungan', [$startDate, $endDate])
            ->groupBy('nama')
            ->take(10)
            ->get();

        $Anggota = $dataAnggota->mapWithKeys(function ($kunjungan) {
            return [$kunjungan->nama => $kunjungan->total_anggota];
        });

        $dataKelas = DB::table('tb_kunjungan')
            ->select('kelas', DB::raw('count(kelas) as total_kelas'))
            ->whereBetween('tgl_kunjungan', [$startDate, $endDate])
            ->groupBy('kelas')
            ->take(10)
            ->get();

        $Kelas = $dataKelas->mapWithKeys(function ($kunjungan) {
            return [$kunjungan->kelas => $kunjungan->total_kelas];
        });

        return view('admin.laporan.laporankunjungan', [
            'reports' => $reports,
            'selectedTahunAjaran' => $tahunAjaran,
            'tahunAjaran' => $tahunAjaranList,
            'dates' => $dates,
            'totals' => $totals,
            'Anggota' => $Anggota,
            'Kelas' => $Kelas
        ]);
    }

    public function viewKunjungan(Request $request)
    {
        // Ambil parameter tahun ajaran dari request
        $tahunAjaran = $request->input('tahun_ajaran');

        // Log parameter untuk debugging
        \Log::info('viewKunjungan called with tahun_ajaran: ' . $tahunAjaran);

        if ($tahunAjaran) {
            // Jika tahun ajaran dipilih, proses data dengan filter
            $tahun = explode('/', $tahunAjaran);
            if (count($tahun) === 2) {
                $startYear = $tahun[0];
                $endYear = $tahun[1];

                // Tentukan rentang tanggal dari Juli tahun yang dipilih hingga Juli tahun berikutnya
                $startDate = Carbon::create($startYear, 7, 1)->startOfDay();
                $endDate = Carbon::create($endYear, 6, 30)->endOfDay();

                // Ambil laporan berdasarkan rentang tanggal yang difilter
                $reports = MdKunjungan::whereBetween('created_at', [$startDate, $endDate])->get();
            } else {
                // Tangani jika format tahun ajaran tidak valid
                return redirect()->back()->with('error', 'Format tahun ajaran tidak valid.');
            }
        } else {
            // Jika tidak ada filter, ambil semua data
            $reports = MdKunjungan::all();
        }

        return view('admin.laporan.prLaporanKunjungan', [
            'reports' => $reports,
            'tahunAjaran' => $tahunAjaran
        ]);
    }



    #Cetak Laporan Kunjungan
    public function cetakKunjungan(Request $request)
    {
        $tahunAjaran = $request->input('tahun_ajaran');

        \Log::info('Tahun Ajaran: ' . $tahunAjaran);

        if ($tahunAjaran) {
            $tahun = explode('/', $tahunAjaran);
            if (count($tahun) === 2) {
                $startYear = $tahun[0];
                $endYear = $tahun[1];
                $startDate = Carbon::create($startYear, 7, 1)->startOfDay();
                $endDate = Carbon::create($endYear, 6, 30)->endOfDay();
                $reports = MdKunjungan::whereBetween('created_at', [$startDate, $endDate])->get();

                $filename = "laporan-kunjungan-{$tahunAjaran}.pdf";
            } else {
                return redirect()->back()->with('error', 'Format tahun ajaran tidak valid.');
            }
        } else {
            $reports = MdKunjungan::all();

            $filename = "laporan-kunjungan-keseluruhan.pdf";
        }

        // Tentukan nama file PDF
        // $filename = $tahunAjaran ? "laporan-kunjungan-{$tahunAjaran}.pdf" : "laporan-kunjungan-keseluruhan.pdf";

        try {
            $options = new Options();
            $options->set('debug', true);
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isPhpEnabled', true);

            $dompdf = new Dompdf($options);
            $dompdf->setPaper('A4', 'landscape');

            $html = view('admin.laporan.prLaporanKunjungan', compact('reports', 'tahunAjaran'))->render();
            $dompdf->loadHtml($html);
            $dompdf->render();

            return $dompdf->stream($filename);
        } catch (\Exception $e) {
            \Log::error('Error rendering PDF: ' . $e->getMessage());
            return 'Error rendering PDF: ' . $e->getMessage();
        }
    }
}

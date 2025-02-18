<?php

namespace App\Http\Controllers\halindex;

use Illuminate\Support\Facades\Log;
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

        // $Anggota = MdAnggota::all();
        // $kelas = MdKelas::select('id_kelas', 'kelas')->get();
        // $kunjungan = MdKunjungan::whereBetween('tgl_kunjungan', [$startOfWeek, $endOfWeek])->paginate(10);
        // $kunPaginator = MdKunjungan::paginate(10);
        // $kunjungan = $kunPaginator->items();

        // return view('halindex.kunjungan.kunjungan', compact('Anggota', 'kelas', 'kunPaginator', 'kunjungan'));

        $Anggota = MdAnggota::all();
        $kelas = MdKelas::select('id_kelas', 'kelas')->get();
        $kunPaginator = MdKunjungan::paginate(10);
        $kunjungan = $kunPaginator->items();

        return view('halindex.kunjungan.kunjungan', compact('Anggota', 'kelas', 'kunPaginator', 'kunjungan'));
    }


    // public function berkunjung(Request $kunjungan)
    // {
    //     $simpan = new MdKunjungan();
    //     $simpan->insKunjung($kunjungan);

    //     return redirect()->back()->with('toast_success', 'Selamat Datang!');
    // }

    public function saveKunjungan(Request $kunjungan)
    {
        // $data = $request->only(['anggota_id', 'nis', 'nama_anggota', 'kelas']);

        $simpan = new MdKunjungan();
        $simpan->insKunjung($kunjungan);

        return redirect()->route('kunjungan.show')->with('toast_success', "Selamat Datang {$kunjungan->nama_anggota}");
    }

    public function searchAnggota(Request $request)
    {
        $nis = $request->input('nis');
        $anggota = MdAnggota::where('NIS', $nis)->first();
        $kelas = $anggota ? MdKelas::where('id_kelas', $anggota->kelas_id)->first() : null;

        $Anggota = MdAnggota::all();
        $kelasList = MdKelas::select('id_kelas', 'kelas')->get();
        $kunPaginator = MdKunjungan::paginate(10);
        $kunjungan = $kunPaginator->items();

        if (!$anggota) {
            // Jika NIS tidak ditemukan, setel pesan kesalahan dan redirect kembali
            return redirect()->route('kunjungan.show')->with('toast_error', 'NIS tidak ditemukan!');
        }

        return view('halindex.kunjungan.kunjungan', [
            'Anggota' => $Anggota,
            'kelas' => $kelasList,
            'kunPaginator' => $kunPaginator,
            'kunjungan' => $kunjungan,
            'anggota' => $anggota, // Hanya satu anggota, bukan koleksi
            'kelas' => $kelas // Hanya satu kelas, bukan koleksi
        ]);
    }
}

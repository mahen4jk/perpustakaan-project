<?php

namespace App\Http\Controllers\halindex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\MdBuku;
use Carbon\Carbon;
use App\MdPenerbit;
use App\MdKategori;
use App\MdDDC;
use App\MdPinjam;


class katalog extends Controller
{
    //
    public function halkatalog()
    {
        # code...
        $bukuPaginator = MdBuku::paginate(10);
        // $kategori = MdKategori::all();
        $buku = $bukuPaginator->items();


        return view('halindex.katalog.katalog', compact('buku', 'bukuPaginator'));
    }

    public function show($idBuku)
    {
        # code...
        $klasifikasi = MdDDC::all();
        // // $penerbit = MdPenerbit::all();
        // // $kategori = MdKategori::all();

        $buku = DB::table('tb_buku')->where('id_buku', decrypt($idBuku))->get();
        $klasifikasi = MdDDC::select('id_class', 'kode_class', 'ket')->get();

        return view(
            'halindex.katalog.detailbuku',
            compact('buku', 'klasifikasi')
        );

        // $idBuku = decrypt($idBuku);

        // $buku = DB::table('tb_buku')
        //     ->join('tb_ddc', 'tb_buku.class_id', '=', 'tb_ddc.id_class')
        //     ->select('tb_buku.*', 'tb_ddc.kode_class', 'tb_ddc.ket')
        //     ->where('tb_buku.id_buku', $idBuku)
        //     ->first(); // Mengambil data sebagai objek

        // return view(
        //     'halindex.katalog.detailbuku',
        //     compact('buku', 'klasifikasi')
        // );
    }

    public function searchBuku(Request $request)
    {
        $term = $request->input('term');

        $results = MdBuku::select('judul')
            ->where('judul', 'LIKE', '%' . $term . '%')
            ->orWhere('pengarang', 'LIKE', '%' . $term . '%')
            ->limit(5)
            ->pluck('judul');

        return response()->json($results);
    }

    public function search(Request $request)
    {
        $searchQuery = $request->input('search');

        //Lakukan Query
        $bukuPaginator = \App\MdBuku::where('judul', 'LIKE', "%" . $searchQuery . "%")
            ->orWhere('pengarang', 'LIKE', "%" . $searchQuery . "%")
            ->paginate();

        $buku = $bukuPaginator->items();

        if ($bukuPaginator->isEmpty()) {
            return view('halindex.katalog.belum_tersedia');
        } else {
            // Kembalikan hasil pencarian dalam bentuk JSON
            return view('halindex.katalog.katalog', compact('buku', 'bukuPaginator'));
        }
    }
}

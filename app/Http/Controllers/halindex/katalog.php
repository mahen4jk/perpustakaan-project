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


class katalog extends Controller
{
    //
    public function halkatalog()
    {
        # code...
        $bukuPaginator = MdBuku::paginate(10);
        $kategori = MdKategori::all();
        $buku = $bukuPaginator->items();

        foreach ($buku as $item) {
            $item->created_at = Carbon::parse($item->created_at)->format('d-m-Y');
        }

        return view('halindex.katalog.katalog', compact('buku', 'kategori', 'bukuPaginator'));
    }

    public function show($idBuku)
    {
        # code...
        $klasifikasi = MdDDC::all();
        $penerbit = MdPenerbit::all();
        $kategori = MdKategori::all();
        $id_buku = DB::table('tb_buku')->where('id_buku', decrypt($idBuku))->get();
        return view('halindex.katalog.detailbuku', ['kode' => $id_buku], compact('klasifikasi', 'penerbit', 'kategori'));
    }
}

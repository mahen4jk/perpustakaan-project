<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MdBuku;
use App\MdPenerbit;
use App\MdKategori;
use App\MdDDC;

class MstBukuCon extends Controller
{
    //
    public function MasterBuku()
    {
        # code...
        $dtbuku = MdBuku::with('klasifikasi', 'penerbit', 'kategori')->get();
        $klasifikasi = MdDDC::all();
        $penerbit = MdPenerbit::all();
        $kategori = MdKategori::all();

        $klasifikasi = MdDDC::select('id_class', 'ket')->get();
        $penerbit = MdPenerbit::select('id_penerbit', 'nama_penerbit')->get();
        $kategori = MdKategori::select('id_kategori', 'kategori')->get();
        return view('admin.masterbuku.masterbuku', compact('dtbuku', 'klasifikasi', 'penerbit', 'kategori'));
    }

    public function formbuku()
    {
        # code...
        $klasifikasi = MdDDC::all();
        $penerbit = MdPenerbit::all();
        $kategori = MdKategori::all();
        return view('admin.masterbuku.formbuku', compact('klasifikasi', 'penerbit', 'kategori'));
    }
}

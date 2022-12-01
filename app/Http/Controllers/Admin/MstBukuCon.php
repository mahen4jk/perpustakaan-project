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
        $kd_buku = MdBuku::kode();
        $klasifikasi = MdDDC::all();
        $penerbit = MdPenerbit::all();
        $kategori = MdKategori::all();
        return view('admin.masterbuku.formbuku', compact('klasifikasi', 'penerbit', 'kategori'),['id_buku'=>$kd_buku]);
    }

    public function simpanBUKU(Request $BUKU)
    {
        # code...
        $validate_buku = $BUKU->validate([
            'id_buku'=>'required',
            'ISBN'=>'required',
            'judul'=>'required',
            'pengarang'=>'required',
            'penerbit_id'=>'required',
            'class_id'=>'required',
            'kategori_id'=>'required',
            'stok_buku'=>'required'
            ,
        ]);
        $simpan = new MdBuku();
        $simpan->insBuku($BUKU,['id_buku'=>$validate_buku]);
        return redirect('buku/masterbuku')->with('toast_success','Data Berhasil disimpan');
        
    }
}

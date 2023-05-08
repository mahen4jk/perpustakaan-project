<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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
        $buku = MdBuku::all();
        $klasifikasi = MdDDC::all();
        $penerbit = MdPenerbit::all();
        $kategori = MdKategori::all();

        $klasifikasi = MdDDC::select('id_class', 'ket')->get();
        $penerbit = MdPenerbit::select('id_penerbit', 'nama_penerbit')->get();
        $kategori = MdKategori::select('id_kategori', 'kategori')->get();
        return view('admin.masterbuku.masterbuku', compact('buku','klasifikasi', 'penerbit', 'kategori'));
    }

    public function formbuku()
    {
        # code...
        $kode = MdBuku::kode();
        $klasifikasi = MdDDC::all();
        $penerbit = MdPenerbit::all();
        $kategori = MdKategori::all();
        return view('admin.masterbuku.formbuku', compact('klasifikasi', 'penerbit', 'kategori'),['id_buku'=>$kode]);
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

    public function kirimBuku($idBUKU)
    {
        # code...
        $klasifikasi = MdDDC::all();
        $penerbit = MdPenerbit::all();
        $kategori = MdKategori::all();
        $id_buku = DB::table('tb_buku')->where('id_buku',decrypt($idBUKU))->get();
        return view('admin.masterbuku.editbuku',['kode'=> $id_buku],compact('klasifikasi','penerbit','kategori'));
    }

    public function updateBUKU(Request $BUKU)
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

        $update = new MdBuku();
        $update->editBUKU($BUKU,['id_buku'=>$validate_buku]);
        return redirect('buku/masterbuku')->with('toast_success','Data Berhasil diubah');
    }

    public function delBUKU($idBUKU)
    {
        # code...
        $delete = new MdBuku();
        $delete->hpsBUKU($idBUKU);
        return redirect('buku/masterbuku');
    }
}

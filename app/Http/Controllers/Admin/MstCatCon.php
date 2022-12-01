<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MdKategori;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MstCatCon extends Controller
{
    //
    public function MasterKategori()
    {
        # menampilkan data ke dalam tabel...
        $kategori = MdKategori::all();
        return view('admin.masterkategori.masterkategori', ['kategori' => $kategori]);
    }

    // Sistem simpan data kategori
    public function formkategori()
    {
        # menampilkan form pengisian kategori...
        return view('admin.masterkategori.formkategori');
    }

    public function simpanKat(Request $KAT)
    {
        # simpan data kategori...
        $simpan = new MdKategori();
        $simpan->simpanKAT($KAT);
        return redirect('kategori/masterkategori')->with('toast_success', 'Data Berhasil Disimpan!');
    }

    // Sistem Update Data Kategori
    public function kirimKat($kdKAT)
    {
        # tampilan data yang dipilih dan siap di ubah...
        $id_kategori = DB::table('tb_kategori')->where('id_kategori', $kdKAT)->get();
        return view('admin.masterkategori.editKat', ['kode' => $id_kategori]);
    }
    public function updateKAT(Request $KAT)
    {
        # Update data kategori...
        $update = new MdKategori();
        $update->editKAT($KAT);
        return redirect('kategori/masterkategori')->with('toast_success', 'Data Berhasil Diubah!');
    }
    public function deleteKAT($kode)
    {
        # Hapus data kategori...
        $delete = new MdKategori();
        $delete->hapusKAT($kode);
        return redirect('kategori/masterkategori');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MdPenerbit;
use Illuminate\Support\Facades\DB;

class MstPenCon extends Controller
{
    //
    public function mstpenerbit()
    {
        # menampilkan data ke dalam tabel...
        $penerbit = MdPenerbit::all();
        return view('admin.masterpenerbit.masterpenerbit', ['penerbit' => $penerbit]);
    }

    // Sistem simpan data penerbit
    public function formpenerbit()
    {
        # menampilkan form pengisian kategori...
        return view('admin.masterpenerbit.formpenerbit');
    }
    public function simpanPEN(Request $PEN)
    {
        # menyimpan data penerbit...
        $simpan = new MdPenerbit();
        $simpan->simpanPen($PEN);
        return redirect('penerbit/masterpenerbit')->with('toast_success', 'Data Berhasil Disimpan!');
    }
    // Sistem Update Data Kategori
    public function kirimPEN($kdPEN)
    {
        # tampilan data yang dipilih dan siap di ubah...
        $id_penerbit = DB::table('tb_penerbit')->where('id_penerbit', $kdPEN)->get();
        return view('admin.masterpenerbit.editPEN', ['kode' => $id_penerbit]);
    }
    public function updatePEN(Request $PEN)
    {
        # Update data kategori...
        $update = new MdPenerbit();
        $update->editPEN($PEN);
        return redirect('penerbit/masterpenerbit')->with('toast_success', 'Data Berhasil Diubah!');
    }
    public function deletePEN($kdPEN)
    {
        # Hapus data kategori...
        $delete = new MdPenerbit();
        $delete->hapusPEN($kdPEN);
        return redirect('penerbit/masterpenerbit');
    }
}

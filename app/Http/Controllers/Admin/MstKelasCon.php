<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MdKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MstKelasCon extends Controller
{
    //
    public function MasterKelas()
    {
        # menampilkan data ke dalam tabel...
        $kelas = MdKelas::all();
        // return view('admin.masterkategori.masterkategori', ['kategori' => $kategori]);
        return view('admin.masterkelas.masterkelas', ['kelas' => $kelas]);
    }
    public function formKelas()
    {
        # code...
        return view('admin.masterkelas.formkelas');
    }
    public function simpanCLASS(Request $KEL)
    {
        # code...
        /* $validateData = $KEL->validate([
           'id_kelas'=>'required',
           'nama_kelas'=>'required'
        ]); */
        $simpan = new MdKelas();
        $simpan->simpanKEL($KEL);
        return redirect('kelas/masterkelas')->with('toast_success', 'Data Berhasil Disimpan!');
    }
    public function kirimKEL($idKELAS)
    {
        # code...
        # tampilan data yang dipilih dan siap di ubah...
        $id_kelas = DB::table('tb_kelas')->where('id_kelas', $idKELAS)->get();
        return view('admin.masterkelas.editkelas', ['kode' => $id_kelas]);
    }
    public function updateKEL(Request $KEL)
    {
        # code...
        /* $validateData = $KEL->validate([
            'id_kelas'=>'required',
            'nama_kelas'=>'required'
         ]); */
        $update = new MdKelas();
        $update->editKEL($KEL);
        return redirect('kelas/masterkelas')->with('toast_success', 'Data Berhasil Diubah!');
    }

    public function deleteKEL($idKELAS)
    {
        # Hapus data kelas...
        $delete = new MdKelas();
        $delete->hapusKEL($idKELAS);
        return redirect('kelas/masterkelas');
    }
}

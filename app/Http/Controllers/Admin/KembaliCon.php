<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\MdDenda;
use App\MdBuku;
use App\MdAnggota;
use App\MdKembali;
use App\MdPinjam;
use Illuminate\Http\Request;

class KembaliCon extends Controller
{
    //
    public function viewkembali()
    {
        # code...
        $sirPinjam = MdPinjam::all();
        $Anggota = MdAnggota::all();
        $Buku = MdBuku::all();
        $kembali = MdKembali::all();
        $Denda = MdDenda::all();
        return view('admin.sirkulasi.pengembalian',compact('sirPinjam','Anggota','Buku','kembali','Denda'));
    }

    public function formKembali($idPinjam)
    {
        # code...
        $sirPinjam = MdPinjam::all();
        $Anggota = MdAnggota::all();
        $Buku = MdBuku::all();
        $Denda = MdDenda::all();
        $kode_kembali = MdKembali::kode_kembali();


        $pinjam = DB::table('tb_peminjaman')->join(
            'tb_anggota','anggota_id','=','id_anggota')->join(
            'tb_buku','buku_id','=','id_buku')->where('kode_pinjam',decrypt($idPinjam))->get();

        // $pinjam = DB::table('tb_peminjaman')->where('kode_pinjam',decrypt($idPinjam))->get();

        // dd($kode_kembali,$pinjam);

        return view('admin.sirkulasi.formpengembalian',compact('sirPinjam','Denda','kode_kembali','Anggota','Buku'),['kode_pinjam'=>$pinjam]);
    }

    public function pengembalian(Request $IDkembali)
    {
        # code...
        $kembali = new MdKembali();
        $kembali->Kembali($IDkembali);
        return redirect('sirkulasi/pengembalian');
    }


}

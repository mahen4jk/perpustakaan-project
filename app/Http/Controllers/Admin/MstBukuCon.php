<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Dompdf\Options;
use Dompdf\Dompdf;
use PDF;
use App\MdBuku;
use App\MdPenerbit;
use App\MdKategori;
use App\MdDDC;
use App\MdPinjam;

class MstBukuCon extends Controller
{
    //
    public function MasterBuku()
    {
        # code...
        $buku = MdBuku::all();
        $klasifikasi = MdDDC::all();
        // $penerbit = MdPenerbit::all();
        // $kategori = MdKategori::all();

        $klasifikasi = MdDDC::select('id_class', 'ket')->get();
        // $penerbit = MdPenerbit::select('id_penerbit', 'nama_penerbit')->get();
        // $kategori = MdKategori::select('id_kategori', 'kategori')->get();
        $peminjaman = MdPinjam::with('Anggota')->get();

        return view('admin.masterbuku.masterbuku', compact(
            'buku',
            'klasifikasi',
            'peminjaman'
        ));
    }

    public function formbuku()
    {
        # code...
        $kode = MdBuku::kode();
        $klasifikasi = MdDDC::all();
        // $penerbit = MdPenerbit::all();
        // $kategori = MdKategori::all();
        return view('admin.masterbuku.formbuku', compact('klasifikasi'), ['id_buku' => $kode]);
    }

    public function simpanBUKU(Request $BUKU)
    {
        # code...
        // $validate_buku = $BUKU->validate([
        //     'id_buku' => 'required',
        //     'judul' => 'required',
        //     'pengarang' => 'required',
        //     'penerbit_id' => 'required',
        //     'class_id' => 'required',
        //     'kategori_id' => 'required',
        //     'stok_buku' => 'required',
        // ]);

        $simpan = new MdBuku();
        // $simpan->insBuku($BUKU, ['id_buku' => $validate_buku]);
        $simpan->insBuku($BUKU);
        return redirect('buku/masterbuku')->with('toast_success', 'Data Berhasil disimpan');
    }

    public function kirimBuku($idBUKU)
    {
        # code...
        $klasifikasi = MdDDC::all();
        // $penerbit = MdPenerbit::all();
        // $kategori = MdKategori::all();
        $id_buku = DB::table('tb_buku')->where('id_buku', decrypt($idBUKU))->get();
        // return view('admin.masterbuku.editbuku', ['kode' => $id_buku], compact('klasifikasi', 'penerbit', 'kategori'));
        return view('admin.masterbuku.editbuku', ['kode' => $id_buku], compact('klasifikasi'));
    }

    public function updateBUKU(Request $BUKU)
    {
        # code...
        // $validate_buku = $BUKU->validate([
        //     'id_buku' => 'required',
        //     'judul' => 'required',
        //     'pengarang' => 'required',
        //     'penerbit_id' => 'required',
        //     'class_id' => 'required',
        //     'kategori_id' => 'required',
        //     'stok_buku' => 'required',
        // ]);

        $update = new MdBuku();
        // $update->editBUKU($BUKU, ['id_buku' => $validate_buku]);
        $update->editBUKU($BUKU);
        return redirect('buku/masterbuku')->with('toast_success', 'Data Berhasil diubah');
    }

    public function delBUKU($idBUKU)
    {
        # code...
        $delete = new MdBuku();
        $delete->hpsBUKU($idBUKU);
        return redirect('buku/masterbuku');
    }

    public function previewKartuBuku($id_buku)
    {
        $buku = MdBuku::where('id_buku', decrypt($id_buku))->firstOrFail();

        // Kembalikan view preview dengan data buku
        return view('admin.masterbuku.printKtBuku', compact('buku'));
    }

    public function kartuBuku($id_buku)
    {
        $buku = MdBuku::where('id_buku', decrypt($id_buku))->firstOrFail();

        // Buat objek Dompdf
        $dompdf = new Dompdf();

        // Load tampilan Blade ke dalam string HTML
        $html = View::make('admin.masterbuku.printKtBuku', compact('buku'))->render();

        // Set orientasi kertas ke portrait
        $dompdf->setPaper('A4', 'landscape');

        // Render HTML menjadi PDF
        $dompdf->loadHtml($html);
        $dompdf->render();

        // Tampilkan atau unduh file PDF
        return $dompdf->stream('kartu_buku.pdf');
    }

    public function labelBuku($id_buku)
    {
        $Buku = MdBuku::where('id_buku', decrypt($id_buku))->firstOrFail();
        return view('admin.masterbuku.prntLBLBuku', compact('Buku'));
    }

    public function labelBK($id_buku)
    {
        $Buku = MdBuku::where('id_buku', decrypt($id_buku))->firstOrFail();

        // Buat objek Dompdf
        $dompdf = new Dompdf();

        // Load tampilan Blade ke dalam string HTML
        $html = View::make('admin.masterbuku.prntLBLBuku', compact('Buku'))->render();

        // Set orientasi kertas ke portrait
        $dompdf->setPaper('A4', 'potrait');

        // Render HTML menjadi PDF
        $dompdf->loadHtml($html);
        $dompdf->render();

        // Tampilkan atau unduh file PDF
        return $dompdf->stream('label_buku.pdf');
    }
}

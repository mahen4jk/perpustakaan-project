<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MdDenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MstDenda extends Controller
{
    //
    public function viewDenda()
    {
        # code...
        $denda = MdDenda::all();
        return view('admin.masterdenda.masterdenda',['denda'=>$denda]);
    }

    public function tambahDenda()
    {
        # code...
        return view('admin.masterdenda.formdenda');
    }

    public function simpanDDA(Request $denda)
    {
        # code...
        // $validate_Denda = $denda->validate([
        //     'id_denda' => 'required',
        //     'nominal_denda' => 'required',
        //     'status' => 'required'
        // ]);
        $simpan = new MdDenda();
        $simpan->insertDenda($denda);
        return redirect('denda/masterdenda')->with('toast_success', 'Data Berhasil disimpan');
    }

    public function kirimDenda($idDenda)
    {
        # code...
        $denda = DB::table('tb_denda')->where('id_denda', decrypt($idDenda))->get();
        return view('admin.masterdenda.editdenda', ['denda' => $denda]);
    }

    public function ubahDDA(Request $denda)
    {
        # code...
        $update = new MdDenda();
        $update->updateDenda($denda);

        // dd($denda->all());
        return redirect('denda/masterdenda')->with('toast_success', 'Data Berhasil diubah');
    }

    public function hapusDenda($idDenda)
    {
        # code...
        $denda = new MdDenda();
        $denda->deleteDenda($idDenda);
        return redirect('denda/masterdenda');
    }
}

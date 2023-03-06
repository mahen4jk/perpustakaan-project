<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MdDDC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MstDDC extends Controller
{
    //
    public function masterddc()
    {
        # code...
        $ddc = MdDDC::all();
        return view('admin.masterddc.masterddc', ['ddc' => $ddc]);
    }

    public function tambahddc()
    {
        # code...
        return view('admin.masterddc.formddc');
    }

    public function simpanDDC(Request $ddc)
    {
        # code...
        $validate_DDC = $ddc->validate([
            'id_class' => 'required',
            'ket' => 'required'
        ]);
        $simpan = new MdDDC();
        $simpan->insertDDC($ddc, ['id_class' => $validate_DDC]);
        return redirect('ddc/masterddc')->with('toast_success', 'Data Berhasil disimpan');
    }

    public function kirimDDC($idClass)
    {
        # code...
        $ddc = DB::table('tb_ddc')->where('id_class', decrypt($idClass))->get();
        return view('admin.masterddc.editddc', ['ddc' => $ddc]);
    }

    public function ubahDDC(Request $ddc)
    {
        # code...
        $validate_DDC = $ddc->validate([
            'id_class' => 'required',
            'ket' => 'required'
        ]);
        $simpan = new MdDDC();
        $simpan->updateDDC($ddc, ['id_class' => $validate_DDC]);
        return redirect('ddc/masterddc')->with('toast_success', 'Data Berhasil disimpan');
    }

    public function hpsDDC($idClass)
    {
        # code...
        $delDDC = new MdDDC();
        $delDDC->deleteDDC($idClass);
        return redirect ('ddc/masterddc');
    }
}

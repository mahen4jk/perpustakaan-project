<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MsPendik extends Controller
{
    //
    public function msPendik()
    {
        $pendik = \App\MdPendik::all();
        return view('admin.masterpendidik.masterpendik', compact('pendik'));
    }

    public function formPendik()
    {
        return view('admin.masterpendidik.formpendik');
    }

    public function simpanPendik(Request $pendik)
    {

        $simpan = new \App\MdPendik();
        $simpan->insPendik($pendik);
        return redirect('pendik/masterpendik')->with('toast_success', 'Data Berhasil disimpan');
    }

    public function editPNDK($pndk)
    {
        $id_pendik = DB::table('tb_pendik')->where('id_pendik', decrypt($pndk))->get();
        return view('admin.masterpendidik.editpendik', ['pendik' => $id_pendik]);
    }

    public function ubahPendik(Request $pendik)
    {
        $update = new \App\MdPendik();
        $update->uptPendik($pendik);

        return redirect('pendik/masterpendik')->with('toast_success', 'Data Berhasil diubah');

    }
}

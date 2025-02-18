<?php

namespace App\Http\Controllers\Admin;

use App\Exports\AnggotaExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\AnggotaImport;
use App\MdAnggota;
use App\MdKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MstAnggota extends Controller
{
    //
    public function MasterAnggota()
    {
        # code...
        $anggota = MdAnggota::all();
        $kelas = MdKelas::all();

        $kelas = MdKelas::select('id_kelas', 'kelas')->get();
        return view('admin.masteranggota.masteranggota', compact('anggota', 'kelas'));
    }

    public function exportAnggota()
    {
        # code...
        return Excel::download(new AnggotaExport, 'Anggota.xlsx');
    }

    public function importAnggota(Request $anggota)
    {
        # code...

        $import = new AnggotaImport;

        $this->validate($anggota, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $anggota->file('file');
        $namafile = $file->getClientOriginalName();
        $file->move('DataAnggota', $namafile);

        Excel::import($import, public_path('/DataAnggota/' . $namafile));

        if ($import->getRowCount() == 0) {
            return redirect('anggota/masteranggota')->with('error', 'File Excel tidak memiliki data');
        } else {
            return redirect('anggota/masteranggota')->with('toast_success', 'File Excel berhasil di import');
        }
    }

    public function tambahanggota()
    {
        # code...
        $kelas = MdKelas::all();
        return view('admin.masteranggota.formanggota', compact('kelas'));
    }

    public function simpanAnggota(Request $Anggota)
    {
        # code...
        $validate_anggota = $Anggota->validate([
            'nis' => 'required',
            'nama_anggota' => 'required',
            'j_kelamin' => 'required',
            'kelas_id' => 'required',
        ]);
        $simpan = new MdAnggota();
        $simpan->insAnggota($Anggota, ['id_anggota' => $validate_anggota]);

        // dd($Anggota->all());
        return redirect('anggota/masteranggota')->with('toast_success', 'Data Berhasil disimpan');
    }

    public function kirimAnggota($idNIS)
    {
        //dd(decrypt($idNIS));
        # code...
        $kelas = MdKelas::all();
        $anggota = DB::table('tb_anggota')->where('id_anggota', decrypt($idNIS))->get();
        return view('admin.masteranggota.editanggota', ['anggota' => $anggota], compact('kelas'));
    }

    public function ubahAnggota(Request $Anggota)
    {
        # code...
        $validate_anggota = $Anggota->validate([
            'id_anggota' => 'required',
            'kelas_id' => 'required',
            'nis' => 'required',
            'nama_anggota' => 'required',
            'j_kelamin' => 'required',
        ]);
        $simpan = new MdAnggota();
        $simpan->editAnggota($Anggota, ['id_anggota' => $validate_anggota]);
        return redirect('anggota/masteranggota')->with('toast_success', 'Data Berhasil diubah');
    }

    public function hpsAnggota($idNIS)
    {
        # code...
        $delete = new MdAnggota();
        $delete->delAnggota($idNIS);
        return redirect('anggota/masteranggota');
    }
}

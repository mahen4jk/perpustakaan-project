<?php

namespace App\Imports;

use App\Http\Controllers\Admin\MstAnggota;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use App\MdAnggota;
use App\MdKelas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AnggotaImport implements ToModel, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    protected $kelass;

    public $rowCount = 0;

    public function __construct()
    {
        $this->kelass = MdKelas::select('id_kelas', 'kelas')->get();
        // $this->kelas = $kelas;
    }

    // public function startRow(): int
    // {
    //     return 2;
    // }

    public function model(array $row)
    {
        //
        ++$this->rowCount;

        // $kelas_id = $this->kelass->where('kelas', $row['kelas_id'])->where('id_kelas', $row['kelas_id'])->first();
        return new MdAnggota([
            'nis' => $row['nis'],
            'nama_anggota' => $row['nama_anggota'],
            'j_kelamin' => $row['j_kelamin'],
            'kelas_id' => $row['kelas_id'],
            'alamat' => $row['alamat'],
            'hp' => $row['hp'],
            'status' => $row['status'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function getRowCount(): int
    {
        # code...
        return count((array)$this->rowCount);
    }
}

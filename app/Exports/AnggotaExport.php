<?php

namespace App\Exports;

use App\MdAnggota;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AnggotaExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //
        return MdAnggota::all();
    }

    public function headings(): array
    {
        return [
            'id_anggota',
            'nis',
            'nama_anggota',
            'j_kelamin',
            'kelas_id',
            'alamat',
            'hp',
            'status',
            'created_at',
            'updated_at',
        ];
    }
}

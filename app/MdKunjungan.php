<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MdKunjungan extends Model
{
    //
    protected $table = 'tb_kunjungan';
    protected $primarykey = 'id_kunjungan';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'id_kunjungan', 'anggota_id', 'nis', 'nama_anggota', 'kelas', 'tgl_kunjungan'
    ];

    public function anggota()
    {
        # code...
        return $this->belongsTo(MdAnggota::class, 'anggota_id', 'id_anggota')->withDefault([
            'ket' => 'Tidak ada'
        ]);
    }

    public function insKunjung($kunjungan)
    {
        $tgl_sekarang = Carbon::now();

        DB::table('tb_kunjungan')->insert([
            // 'id_kunjungan' => $kunjungan->id_kunjungan,
            'anggota_id' => $kunjungan->anggota_id,
            'nis' => $kunjungan->nis,
            'nama_anggota' => $kunjungan->nama_anggota,
            'kelas' => $kunjungan->kelas,
            'tgl_kunjungan' => $tgl_sekarang
        ]);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MdAnggota extends Model
{
    //
    protected $table = 'tb_anggota';
    protected $primarykey = 'nis';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'nis', 'nama_lengkap', 'j_kelamin', 'kelas_id', 'hp', 'status'
    ];

    public function kelas()
    {
        # code...
        return $this->belongsTo(MdKelas::class, 'kelas_id', 'id_kelas')->withDefault([
            'ket' => 'Tidak ada'
        ]);
    }

    public function insAnggota($anggota)
    {
        # code...
        DB::table('tb_anggota')->insert([
            'nis' => $anggota->nis,
            'nama_lengkap' => $anggota->nama_lengkap,
            'j_kelamin' => $anggota->j_kelamin,
            'kelas_id' => $anggota->kelas_id,
            'hp' => $anggota->hp,
            'status' => $anggota->status,
        ]);
    }

    public function edit($idNIS)
    {
        # memunculkan data kategori ke form untuk di ubah...
        DB::table('tb_anggota')->where('nis', $idNIS)->get();
    }

    public function editAnggota($anggota)
    {
        # code...
        DB::table('tb_anggota')->where('nis', $anggota->nis)->update([
            'nama_lengkap' => $anggota->nama_lengkap,
            'j_kelamin' => $anggota->j_kelamin,
            'kelas_id' => $anggota->kelas_id,
            'hp' => $anggota->hp,
            'status' => $anggota->status,
        ]);
    }
    public function delAnggota($anggota)
    {
        # menghapus kelas...
        DB::table('tb_anggota')->where('nis', $anggota)->delete();
    }
}

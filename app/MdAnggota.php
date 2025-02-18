<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class MdAnggota extends Model
{
    //
    protected $table = 'tb_anggota';
    protected $primarykey = 'id_anggota';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'id_anggota', 'kelas_id', 'nis', 'nama_anggota', 'j_kelamin', 'created_at', 'update_at'
    ];

    public function kelas()
    {
        # code...
        return $this->belongsTo(MdKelas::class, 'kelas_id', 'id_kelas')->withDefault([
            'ket' => 'Tidak ada'
        ]);
    }

    // public function pengembalian()
    // {
    //     return $this->hasMany(MdKembali::class);
    // }

    public function peminjaman()
    {
        return $this->hasMany(MdPinjam::class);
    }

    // public function kunjungan()
    // {
    //     return $this->hasMany(MdKunjungan::class);
    // }

    public function insAnggota($anggota)
    {

        # code...
        DB::table('tb_anggota')->insert([
            'id_anggota' => $anggota->id_anggota,
            'kelas_id' => $anggota->kelas_id,
            'nis' => $anggota->nis,
            'nama_anggota' => $anggota->nama_anggota,
            'j_kelamin' => $anggota->j_kelamin,
            'created_at' => now()
        ]);
    }

    public function edit($idNIS)
    {
        # memunculkan data kategori ke form untuk di ubah...
        DB::table('tb_anggota')->where('id_anggota', $idNIS)->get();
    }

    public function editAnggota($anggota)
    {
        # code...
        DB::table('tb_anggota')->where('id_anggota', $anggota->id_anggota)->update([
            'kelas_id' => $anggota->kelas_id,
            'nis' => $anggota->nis,
            'nama_anggota' => $anggota->nama_anggota,
            'j_kelamin' => $anggota->j_kelamin,
            'updated_at' => now()
        ]);
    }
    public function delAnggota($anggota)
    {
        # menghapus kelas...
        DB::table('tb_anggota')->where('id_anggota', $anggota)->delete();
    }
}

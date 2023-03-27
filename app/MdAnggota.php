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
        'id_anggota', 'nis', 'nama_anggota', 'j_kelamin', 'kelas_id', 'alamat', 'hp', 'status', 'created_at', 'update_at'
    ];

    public function kelas()
    {
        # code...
        return $this->belongsTo(MdKelas::class, 'kelas_id', 'id_kelas')->withDefault([
            'ket' => 'Tidak ada'
        ]);
    }

    public function peminjaman()
    {
        return $this->hasMany(MdPinjam::class);
    }

    public function insAnggota($anggota)
    {

        # code...
        DB::table('tb_anggota')->insert([
            'id_anggota' => $anggota->id_anggota,
            'nis' => $anggota->nis,
            'nama_anggota' => $anggota->nama_anggota,
            'j_kelamin' => $anggota->j_kelamin,
            'kelas_id' => $anggota->kelas_id,
            'alamat' => $anggota->alamat,
            'hp' => $anggota->hp,
            'status' => $anggota->status,
            'created_at' => now(),
            'updated_at' => now()
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
            'nis' => $anggota->nis,
            'nama_anggota' => $anggota->nama_anggota,
            'j_kelamin' => $anggota->j_kelamin,
            'kelas_id' => $anggota->kelas_id,
            'alamat' => $anggota->alamat,
            'hp' => $anggota->hp,
            'status' => $anggota->status,
            'updated_at' => now()
        ]);
    }
    public function delAnggota($anggota)
    {
        # menghapus kelas...
        DB::table('tb_anggota')->where('id_anggota', $anggota)->delete();
    }
}

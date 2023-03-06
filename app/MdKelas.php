<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MdKelas extends Model
{
    //
    //bahan yang diperlukan untuk kategori
    protected $table = 'tb_kelas';
    protected $primarykey = 'null';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['id_kelas', 'kelas','created_at', 'updated_at'];

    public function anggota()
    {
        # code...
        return $this->belongsTo(MdAnggota::class,'kelas_id','id_kelas')->withDefault([
            'ket' => 'Tidak ada'
        ]);
    }

    public function simpanKEL($kelas)
    {
        # code...
        DB::table('tb_kelas')->insert([
            'id_kelas' => $kelas->id_kelas,
            'kelas' => $kelas->kelas,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    public function edit($idKEL)
    {
        # memunculkan data kategori ke form untuk di ubah...
        DB::table('tb_kelas')->where('id_kelas', $idKEL)->get();
    }

    public function editKEL($kelas)
    {
        # code...
        DB::table('tb_kelas')->where('id_kelas', $kelas->id_kelas)->update([
            'kelas' => $kelas->kelas,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
    public function hapusKEL($kelas)
    {
        # menghapus kelas...
        DB::table('tb_kelas')->where('id_kelas', $kelas)->delete();
    }
}

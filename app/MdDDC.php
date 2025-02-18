<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MdDDC extends Model
{
    //
    protected $table = 'tb_ddc';
    protected $primarykey = 'id_class';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = ['id_class', 'kode_class', 'ket','created_at', 'updated_at'];

    public function buku()
    {
        # code...
        // return $this->hasMany('App\MdBuku','class_id','id_class');
        return $this->hasMany(MdBuku::class, 'class_id', 'id_class');
    }

    public function insertDDC($ddc)
    {
        # tambah data kategori...
        DB::table('tb_ddc')->insert([
            'kode_class' => $ddc->kode_class,
            'ket' => $ddc->ket,
            'created_at' => now(),
        ]);
    }

    public function editDDC($ddc)
    {
        # tambah data kategori...
        DB::table('tb_ddc')->where('id_class', $ddc)->get();
    }

    public function updateDDC($ddc)
    {
        # tambah data kategori...
        DB::table('tb_ddc')->where('id_class', $ddc->id_class)->update([
            'kode_class' => $ddc->kode_class,
            'ket' => $ddc->ket,
            'updated_at' => now()
        ]);
    }

    public function deleteDDC($ddc)
    {
        # tambah data kategori...
        DB::table('tb_ddc')->where('id_class', $ddc)->delete();
    }
}

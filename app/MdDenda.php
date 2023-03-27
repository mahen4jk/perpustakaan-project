<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MdDenda extends Model
{
    //
    protected $table = 'tb_denda';
    protected $primarykey = 'id_denda';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['id_denda', 'nominal_denda', 'status', 'created_at', 'updated_at'];

    public function insertDenda($denda)
    {
        # code...
        DB::table('tb_denda')->insert([
            'id_denda' => $denda->id_denda,
            'nominal_denda' => $denda->nominal_denda,
            'status' => $denda->status,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function editDenda($denda)
    {
        # tambah data kategori...
        DB::table('tb_denda')->where('id_denda', $denda)->get();
    }

    public function updateDenda($denda)
    {
        # code...
        DB::table('tb_denda')->where('id_denda', $denda->id_denda)->update([
            'nominal_denda'=>$denda->nominal_denda,
            'status' => $denda->status,
            'updated_at' => now(),
        ]);
    }

    public function deleteDenda($denda)
    {
        # code...
        DB::table('tb_denda')->where('id_denda',$denda)->delete();
    }
}

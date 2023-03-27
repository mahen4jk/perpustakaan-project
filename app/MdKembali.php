<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MdKembali extends Model
{
    //
    protected $table = 'tb_pengembalian';
    protected $primarykey = '';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['id_kembali','pinjam_id'];
}

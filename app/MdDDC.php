<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MdDDC extends Model
{
    //
    protected $table = 'tb_ddc';
    protected $primarykey = 'id_class';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['id_class', 'ket'];

    public function buku()
    {
        # code...
        // return $this->hasMany('App\MdBuku','class_id','id_class');
        return $this->hasMany(MdBuku::class,'class_id','id_class');
    }
}

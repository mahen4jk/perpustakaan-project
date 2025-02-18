<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MdPenerbit extends Model
{
    //
    protected $table = 'tb_penerbit';
    protected $primarykey = 'id_penerbit';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['id_penerbit', 'nama_penerbit', 'alamat', 'pic_hp', 'email', 'created_at', 'updated_at'];

    public function buku()
    {
        # code...
        // return $this->hasMany('App\MdBuku','penerbit_id','id_penerbit');
        return $this->hasMany(MdBuku::class,'penerbit_id','id_penerbit');
    }

    public function simpanPen($penerbit)
    {
        # simpan Penerbit...
        DB::table('tb_penerbit')->insert([
            'nama_penerbit' => $penerbit->nama_penerbit,
            'alamat' => $penerbit->alamat,
            'pic_hp' => $penerbit->pic_hp,
            'email' => $penerbit->email,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    public function edit($kdPEN)
    {
        # code...
        DB::table('tb_penerbit')->where('id_penerbit', $kdPEN)->get();
    }

    public function editPEN($penerbit)
    {
        # menyimpan data penerbit yang diubah...
        DB::table('tb_penerbit')->where('id_penerbit', $penerbit->id_penerbit)->update([
            'nama_penerbit' => $penerbit->nama_penerbit,
            'alamat' => $penerbit->alamat,
            'pic_hp' => $penerbit->pic_hp,
            'email' => $penerbit->email,
            'updated_at' => now()
        ]);
    }

    public function hapusPEN($penerbit)
    {
        # menghapus kategori...
        DB::table('tb_penerbit')->where('id_penerbit', $penerbit)->delete();
    }
}

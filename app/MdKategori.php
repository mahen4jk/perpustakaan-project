<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MdKategori extends Model
{
    //bahan yang diperlukan untuk kategori
    protected $table = 'tb_kategori';
    protected $primarykey = 'id_kategori';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'id_kategori', 'kode_kategori',
        'kategori', 'created_at', 'updated_at'
    ];

    public function kategori()
    {
        # code...
        // return $this->hasMany('App\MdBuku','kategori_id','id_kategori');
        return $this->hasMany(MdBuku::class, 'kategori_id', 'id_kategori');
    }

    public function simpanKAT($kategori)
    {
        # tambah data kategori...
        DB::table('tb_kategori')->insert([
            'kode_kategori' => $kategori->kode_kategori,
            'kategori' => $kategori->kategori,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    public function edit($kdKAT)
    {
        # memunculkan data kategori ke form untuk di ubah...
        DB::table('tb_kategori')->where('id_kategori', $kdKAT)->get();
    }

    public function editKAT($kategori)
    {
        # menyimpan data kategori yang diubah...
        DB::table('tb_kategori')->where('id_kategori', $kategori->id_kategori)->update([
            'kode_kategori' => $kategori->kode_kategori,
            'kategori' => $kategori->kategori,
            'updated_at' => now()
        ]);
    }

    public function hapusKAT($kategori)
    {
        # menghapus kategori...
        DB::table('tb_kategori')->where('id_kategori', $kategori)->delete();
    }
}

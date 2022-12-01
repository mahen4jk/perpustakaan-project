<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MdBuku extends Model
{
    //
    protected $table = 'tb_buku';
    protected $primarykey = 'id_buku';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'id_buku', 'judul', 'isbn', 'pengarang', 'penerbit_id',
        'class_id', 'kategori_id', 'tahun_terbit', 'stok_buku', 'deskripsi',
        'created_at', 'updated_at'
    ];

    public function klasifikasi()
    {
        # code...
        // return $this->belongsTo('App\MdDDC','class_id','id_class')->withDefault([
        //     'about' => 'Tidak Ada',
        // ]);
        return $this->belongsTo(MdDDC::class,'class_id','id_class')->withDefault([
            'ket' => 'Tidak ada'
        ]);
    }
    public function penerbit()
    {
        # code...
        // return $this->belongsTo('App\MdPenerbit','penerbit_id','id_penerbit')
        // ->withDefault([
        //     'nama_penerbit' => 'Tidak Ada',
        // ]);
        return $this->belongsTo(MdPenerbit::class,'penerbit_id','id_penerbit');
    }
    public function kategori()
    {
        # code...
        // return $this->belongsTo('App\MdKategori','kategori_id','id_kategori')->withDefault([
        //     'kategori' => 'Tidak Ada',
        // ]);
        return $this->belongsTo(MdKategori::class,'kategori_id','id_kategori');
    }

    public function insBuku($buku)
    {
        # code...
        DB::table('mst_buku')->insert([
            'id_buku' => $buku->id_buku,
            'judul' => $buku->judul,
            'isbn' => $buku->isbn,
            'pengarang' => $buku->pengarang,
            'id_penerbit' => $buku->id_penerbit,
            'class' => $buku->class,
            'id_kategori' => $buku->id_kategori,
            'tahun_terbit' => $buku->tahun_terbit,
            'stok_buku' => $buku->stok_bukku,
            'deskripsi' => $buku->deskripsi,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

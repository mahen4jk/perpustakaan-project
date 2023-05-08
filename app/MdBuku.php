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

    public function pengembalian()
    {
        return $this->hasMany(MdKembali::class);
    }

    public function peminjaman()
    {
    	return $this->hasMany(MdPinjam::class);
    }

    public static function kode()
    {
        # code...
        $kd_buku = DB::table('tb_buku')->max('id_buku',6);
        $query = DB::table('tb_buku')->get('id_buku');

        if (strlen($query) <> 0) {
            $incrementKode = intval($kd_buku)+1;
        } else {
            $incrementKode = 1;
        }
        $kodebaruMax = str_pad($incrementKode, 6, "0", STR_PAD_LEFT);
        $kodebaru = "".$kodebaruMax;

        return $kodebaru;


        // $stok = DB::table('tb_buku')->max('stok_buku');
        // $kd_buku = str_replace("","",$kd_buku);
        // if ((int)$kd_buku == 0) {
        //     $kd_buku = (int)$kd_buku + 1;
        // } else {
        //     $kd_buku = (int)$kd_buku + (int)$stok;
        // }
        // $incrementKode = $kd_buku;

        // if (strlen($kd_buku) == 1) {
        //     $addNol = "00000";
        // } elseif (strlen($kd_buku) == 2){
        //     $addNol = "0000";
        // } elseif (strlen($kd_buku == 3)) {
        //     $addNol = "000";
        // } elseif (strlen($kd_buku == 4)) {
        //     $addNol = "00";
        // } elseif (strlen($kd_buku == 5)) {
        //     $addNol = "0";
        // }
        // $kodebaru = "".$addNol.$incrementKode;
        // return $kodebaru;
    }

    public function insBuku($buku)
    {
        # code...
        DB::table('tb_buku')->insert([
            'id_buku' => $buku->id_buku,
            'judul' => $buku->judul,
            'isbn' => $buku->ISBN,
            'pengarang' => $buku->pengarang,
            'penerbit_id' => $buku->penerbit_id,
            'class_id' => $buku->class_id,
            'kategori_id' => $buku->kategori_id,
            'tahun_terbit' => $buku->tahun_terbit,
            'stok_buku' => $buku->stok_buku,
            'deskripsi' => $buku->deskripsi,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    public function edit($idBuku)
    {
        # memunculkan data kategori ke form untuk di ubah...
        DB::table('tb_buku')->where('id_buku', $idBuku)->get();
    }

    public function editBUKU($buku)
    {
        # code...
        DB::table('tb_buku')->where('id_buku', $buku->id_buku)->update([
            'judul' => $buku->judul,
            'isbn' => $buku->ISBN,
            'pengarang' => $buku->pengarang,
            'penerbit_id' => $buku->penerbit_id,
            'class_id' => $buku->class_id,
            'kategori_id' => $buku->kategori_id,
            'tahun_terbit' => $buku->tahun_terbit,
            'stok_buku' => $buku->stok_buku,
            'deskripsi' => $buku->deskripsi,
            'updated_at' => now()
        ]);
    }
    public function hpsBUKU($buku)
    {
        # menghapus kelas...
        DB::table('tb_buku')->where('id_buku', $buku)->delete();
    }
}

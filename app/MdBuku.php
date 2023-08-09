<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MdBuku extends Model
{
    //
    protected $table = 'tb_buku';
    protected $primarykey = 'id_buku';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'id_buku', 'judul', 'isbn', 'pengarang', 'penerbit_id',
        'class_id', 'kategori_id', 'tahun_terbit', 'stok_buku', 'deskripsi',
        'created_at', 'updated_at'
    ];

    public function klasifikasi()
    {
        return $this->belongsTo(MdDDC::class, 'class_id', 'id_class')->withDefault([
            'ket' => 'Tidak ada'
        ]);
    }
    public function penerbit()
    {
        return $this->belongsTo(MdPenerbit::class, 'penerbit_id', 'id_penerbit');
    }
    public function kategori()
    {
        return $this->belongsTo(MdKategori::class, 'kategori_id', 'id_kategori');
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
        $kd_buku = DB::table('tb_buku')->max('id_buku', 6);
        $query = DB::table('tb_buku')->get('id_buku');

        if (strlen($query) <> 0) {
            $incrementKode = intval($kd_buku) + 1;
        } else {
            $incrementKode = 1;
        }
        $kodebaruMax = str_pad($incrementKode, 6, "0", STR_PAD_LEFT);
        $kodebaru = "" . $kodebaruMax;

        return $kodebaru;
    }

    public function insBuku($buku)
    {
        # code...

        if ($buku->hasFile('cover')) {
            $file = $buku->file('cover');
            $dt = Carbon::now();
            $acak = $file->getClientOriginalExtension();
            $fileName = rand(11111, 99999) . '-' . $dt->format('Y-m-d-H-i-s') . '.' . $acak;

            // Pindahkan file ke folder yang dituju
            $file->move(public_path('image/buku'), $fileName);
            $cover = $fileName;
        } else {
            $cover = NULL;
        }

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
            'sisa_exemplar' => $buku->stok_buku,
            'deskripsi' => $buku->deskripsi,
            'cover' => $cover,
            'created_at' => now()
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
        if ($buku->hasFile('cover')) {
            // Mendapatkan file cover yang diunggah
            $file = $buku->file('cover');

            // Membuat nama file unik menggunakan timestamp dan ekstensi file asli
            $dt = Carbon::now();
            $acak = $file->getClientOriginalExtension();
            $fileName = rand(11111, 99999) . '-' . $dt->format('Y-m-d-H-i-s') . '.' . $acak;

            // Pindahkan file ke folder yang dituju
            $file->move(public_path('image/buku'), $fileName);
            $cover = $fileName;

            // Hapus gambar lama jika ada
            if ($buku->cover) {
                $oldCoverPath = public_path('image/buku/' . $buku->cover);
                if (file_exists($oldCoverPath)) {
                    unlink($oldCoverPath);
                }
            }
        } else {
            $cover = NULL;
        }

        DB::table('tb_buku')->where('id_buku', $buku->id_buku)->update([
            'judul' => $buku->judul,
            'isbn' => $buku->ISBN,
            'pengarang' => $buku->pengarang,
            'penerbit_id' => $buku->penerbit_id,
            'class_id' => $buku->class_id,
            'kategori_id' => $buku->kategori_id,
            'tahun_terbit' => $buku->tahun_terbit,
            'stok_buku' => $buku->stok_buku,
            'sisa_exemplar' => $buku->stok_buku,
            'deskripsi' => $buku->deskripsi,
            'cover' => $cover,
            'updated_at' => now()
        ]);
    }

    public function hpsBUKU($buku)
    {
        # menghapus kelas...
        DB::table('tb_buku')->where('id_buku', $buku)->delete();
    }
}

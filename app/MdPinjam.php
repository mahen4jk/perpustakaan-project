<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MdPinjam extends Model
{
    //
    protected $table = 'tb_peminjaman';
    protected $primarykey = 'kode_transaksi';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'kode_transaksi', 'tgl_pinjam', 'tgl_kembali', 'nis_anggota', 'buku_id', 'status'
    ];

    public function Anggota()
    {
        # code...
        return $this->belongsTo(MdAnggota::class, 'nis_anggota', 'nis')->withDefault([
            'ket' => 'Tidak ada'
        ]);
    }

    public function Buku()
    {
        # code...
        return $this->belongsTo(MdAnggota::class, 'buku_id', 'id_buku')->withDefault([
            'ket' => 'Tidak ada'
        ]);
    }

    public static function kode_pinjam()
    {
        # code...
        $kd_pinjam = DB::table('tb_peminjaman')->max('kode_transaksi');
        $addNol = '';
        $date = date('Y.m.d');
        $tipepinjam = "OUT";
        $kd_pinjam = str_replace("", "", $kd_pinjam);
        $kd_pinjam = (int)$kd_pinjam + 1;
        $incrementKode = $kd_pinjam;

        if (strlen($kd_pinjam) == 1) {
            $addNol = "000";
        } elseif (strlen($kd_pinjam) == 2) {
            $addNol = "00";
        } elseif (strlen($kd_pinjam == 3)) {
            $addNol = "0";
        }
        $kodebaru = $date . '/' . $tipepinjam . '/' . $addNol . $incrementKode;
        return $kodebaru;
    }

    public function insPinjam($pinjam)
    {

        # code...
        DB::table('tb_anggota')->insert([
            'kode_transaksi' => $pinjam->kode_transaksi,
            'tgl_pinjam' => $pinjam->tgl_pinjam,
            'tgl_kembali' => $pinjam->tgl_kembali,
            'nis_anggota' => $pinjam->nis_anggota,
            'buku_id' => $pinjam->buku_id,
            'status' => 'pinjam'
        ]);
        $pinjam->Buku->where('id_buku', $pinjam->buku_id)
            ->update(['stok_buku' => ($pinjam->Buku->stok_buku - 1)]);
    }
}

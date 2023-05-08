<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MdPinjam extends Model
{
    //
    protected $table = 'tb_peminjaman';
    protected $primarykey = 'kode_pinjam';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'kode_pinjam', 'tgl_pinjam', 'tgl_kembali', 'anggota_id',
        'buku_id', 'status', 'created_at', 'updated_at'
    ];

    public function Anggota()
    {
        # code...
        return $this->belongsTo(MdAnggota::class, 'anggota_id', 'id_anggota')->withDefault([
            'ket' => 'Tidak ada'
        ]);
    }

    public function Buku()
    {
        # code...
        return $this->belongsTo(MdBuku::class, 'buku_id', 'id_buku')->withDefault([
            'ket' => 'Tidak ada'
        ]);
    }

    public function sirPinjam()
    {
        # code...
        return $this->hasMany(MdKembali::class);
    }

    public static function kode_pinjam()
    {
        # code...part2
        $kd_pinjam = DB::table('tb_peminjaman')->select(DB::raw('MAX(RIGHT(kode_pinjam,6)) as kode'));
        $kd = "";
        $pinjaman = "OUT-";
        $tanggal = date('Y-m-d');
        // $query = DB::table('tb_peminjaman')->get('kode_pinjam');

        if ($kd_pinjam->count() <> 0) {
            foreach ($kd_pinjam->get() as $k) {
                $tmp = ((int)$k->kode) + 1;
                $kd = sprintf("%06s", $tmp);
            }
            // $incrementKode = intval($kd_buku)+1;
        } else {
            $kd = "000001";
        }

        return $kd;
        // $kodebaruMax = str_pad($incrementKode, 6, "0", STR_PAD_LEFT);
        // $kodebaru = "".$kodebaruMax;

        // return $kodebaru;

        # code... part1
        // $data = DB::table('tb_peminjaman')->max('kode_pinjam');
        // $kd_pinjam = str_replace("", "", $data);
        // $kd_pinjam = (int)$kd_pinjam + 1;
        // $incrementKode = $kd_pinjam;

        // if (strlen($kd_pinjam) == 1) {
        //     $addNol = "00000";
        // } elseif (strlen($kd_pinjam) == 2) {
        //     $addNol = "0000";
        // } elseif (strlen($kd_pinjam == 3)) {
        //     $addNol = "000";
        // } elseif (strlen($kd_pinjam == 4)) {
        //     $addNol = "00";
        // } elseif (strlen($kd_pinjam == 5)) {
        //     $addNol = "0";
        // }
        // $kodePinjam = "" . $addNol .$incrementKode;
        // return $kodebaru;
    }

    public function insPinjam($pinjam)
    {

        # code...
        DB::table('tb_peminjaman')->insert([
            'kode_pinjam' => $pinjam->kode_pinjam,
            'tgl_pinjam' => $pinjam->tgl_pinjam,
            'tgl_kembali' => $pinjam->tgl_kembali,
            'anggota_id' => $pinjam->anggota_id,
            'buku_id' => $pinjam->buku_id,
            'status' => 'Pinjam',
            'created_at' => now()
        ]);

        $buku = DB::table('tb_buku')->where('id_buku', $pinjam->buku_id)->first();
        $qty_now = $buku->stok_buku;
        $qty_new = $qty_now - 1;

        DB::table('tb_buku')->where('id_buku', $pinjam->buku_id)->update([
            'stok_buku' => $qty_new
        ]);
    }

    public function kembalikan($idPinjam)
    {
        # code...
        DB::table('tb_peminjaman')->where('kode_pinjam',$idPinjam)->get();
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MdKembali extends Model
{
    //
    protected $table = 'tb_pengembalian';
    protected $primarykey = 'kode_kembali';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'kode_kembali', 'pinjam_kode', 'tgl_dikembalikan',
        'total_denda', 'created_at', 'updated_at'
    ];

    public function Anggota()
    {
        # code...
        return $this->belongsTo(MdAnggota::class, 'anggota_id', 'id_anggota');
    }

    public function Buku()
    {
        # code...
        return $this->belongsTo(MdBuku::class, 'buku_id', 'id_buku');
    }

    public function sirPinjam()
    {
        # code...
        return $this->belongsTo(MdPinjam::class, 'pinjam_kode', 'kode_pinjam');
    }

    public function Denda()
    {
        # code...
        return $this->belongsTo(MdDenda::class, 'denda_id', 'id_denda');
    }

    public static function kode_kembali()
    {
        # code...
        $kd_kembali = DB::table('tb_pengembalian')->select(DB::raw('MAX(RIGHT(kode_kembali,6)) as kode'));
        $kd = "";
        $kembalian = "IN-";
        $tanggal = date('Y-m-d');
        // $query = DB::table('tb_peminjaman')->get('kode_pinjam');

        if ($kd_kembali->count() <> 0) {
            foreach ($kd_kembali->get() as $k) {
                $tmp = ((int)$k->kode) + 1;
                $kd = sprintf("%06s", $tmp);
            }
            // $incrementKode = intval($kd_buku)+1;
        } else {
            $kd = "000001";
        }

        return $kd;
    }

    public function Kembali($kembali)
    {

        // Insert Pengembalian
        //Denda dengan status
        $stsDenda = MdDenda::all()->where('status', 'A');
        foreach ($stsDenda as $nom_Denda) {
            # code...
            $id_denda = $nom_Denda->id_denda;
            $denda = $nom_Denda->nominal_denda;
        }
        //Membuat selisih hari
        // $pinjam = MdPinjam::find($kembali);
        $pinjam = MdPinjam::all();
        foreach ($pinjam as $pinjam11) {
            # code...
            $tg_kembali = $pinjam11->tgl_kembali;
        }
        $tg_kembali = Carbon::parse($tg_kembali);
        $tgl_pengembalian = $kembali->input('tgl_dikembalikan');
        $tgl_pengembalian = Carbon::parse($tgl_pengembalian);

        $selisih = $tg_kembali->diffInDays($tgl_pengembalian);
        if ($selisih > 0) {
            $jmldenda = $denda * $selisih;
        } else {
            $selisih = 0;
            $jmldenda = 0;
        }
        $jmldenda;

        DB::table('tb_pengembalian')->insert([
            'kode_kembali' => $kembali->kode_kembali,
            'pinjam_kode' => $kembali->pinjam_kode,
            'tgl_dikembalikan' => $kembali->tgl_dikembalikan,
            'terlambat' => $selisih,
            'denda_id' => $id_denda,
            'total_denda' => $jmldenda,
            'created_at' => now()
        ]);

        //Update Status Peminjaman
        $pinjamID = MdPinjam::all();
        foreach ($pinjamID as $pinjam12) {
            # code...
            $pinjam_id = $pinjam12->kode_pinjam;
            // $pinjam_sts = $pinjam12->status;
        }
        DB::table('tb_peminjaman')->where('kode_pinjam', $pinjam_id)->update([
            'status' => 'Kembali',
            'updated_at' => now()
        ]);

        // Update Stock Buku
        $buku = MdBuku::all();
        foreach ($buku as $bukuID) {
            # code...
            $buku_id = $bukuID->id_buku;
            $qty_now = $bukuID->stok_buku;
        }

        $qty_new = $qty_now + 1;
        DB::table('tb_buku')->where('id_buku', $buku_id)->update([
            'stok_buku' => $qty_new
        ]);
    }
}

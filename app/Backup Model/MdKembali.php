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
        'terlambat', 'status', 'denda_id', 'total_denda',
        'created_at', 'updated_at'
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
        // Denda dengan status 'A'
        // $stsDenda = MdDenda::where('status', 'A')->first();
        // if (!$stsDenda) {
        //     return back()->withErrors('Denda dengan status aktif tidak ditemukan.');
        // }

        // $id_denda = $stsDenda->id_denda;
        // $denda = $stsDenda->nominal_denda;

        // Mengambil semua denda dengan status 'A'
        $activeDendas = MdDenda::where('status', 'A')->get();

        if ($activeDendas->count() == 0) {
            return back()->withErrors('Denda dengan status aktif tidak ditemukan.');
        }

        // Pilih denda tertinggi jika ada lebih dari satu
        $denda = $activeDendas->max('nominal_denda');
        $id_denda = $activeDendas->where('nominal_denda', $denda)->first()->id_denda;

        // Mengambil data pinjam berdasarkan pinjam_kode
        $pinjam = MdPinjam::where('kode_pinjam', $kembali->pinjam_kode)->first();
        if (!$pinjam) {
            return back()->withErrors('Data pinjaman tidak ditemukan.');
        }

        $tg_kembali = Carbon::parse($pinjam->tgl_kembali);
        $tgl_pengembalian = Carbon::parse($kembali->input('tgl_dikembalikan'));

        // Membuat selisih hari
        $selisih = $tg_kembali->diffInDays($tgl_pengembalian, false);
        if ($selisih > 0) {
            $jmldenda = $denda * $selisih;
            $status = 'Terlambat';
        } else {
            $selisih = 0;
            $jmldenda = 0;
            $status = 'Tepat';
        }

        // Insert data pengembalian ke database
        DB::table('tb_pengembalian')->insert([
            'kode_kembali' => $kembali->kode_kembali,
            'pinjam_kode' => $kembali->pinjam_kode,
            'tgl_dikembalikan' => $tgl_pengembalian->toDateString(),
            'terlambat' => $selisih,
            'status' => $status,
            'denda_id' => $id_denda,
            'total_denda' => $jmldenda,
            'created_at' => now()
        ]);

        //Update Status Peminjaman
        DB::table('tb_peminjaman')->where('kode_pinjam', $kembali->pinjam_kode)->update([
            'status' => 'Kembali',
            'updated_at' => now()
        ]);

        $buku = DB::table('tb_peminjaman')->join(
            'tb_buku',
            'buku_id',
            '=',
            'id_buku'
        )->where('kode_pinjam', $kembali->pinjam_kode)
            ->where(
                'id_buku',
                $kembali->buku_id
            )->get();

        if ($buku->isNotEmpty()) {
            // Looping melalui setiap buku yang memenuhi kondisi
            foreach ($buku as $item) {
                $qty_now = $item->sisa_exemplar;
                $qty_new = $qty_now + 1;

                // Memperbarui stok buku
                DB::table('tb_buku')
                    ->where('id_buku', $item->id_buku)
                    ->update([
                        'sisa_exemplar' => $qty_new,
                        'updated_at' => now()
                    ]);
            }
        } else {
            dd($buku);
        }
    }
}

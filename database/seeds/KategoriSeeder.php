<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tb_kategori')->insert([
            'kategori' => 'Buku Fiksi',
            'created_at' => Carbon::now()
        ]);

        DB::table('tb_kategori')->insert([
            'kategori' => 'Buku Non-Fiksi',
            'created_at' => Carbon::now()
        ]);

        DB::table('tb_kategori')->insert([
            'kategori' => 'Buku Referensi',
            'created_at' => Carbon::now()
        ]);

        DB::table('tb_kategori')->insert([
            'kategori' => 'Buku Paket',
            'created_at' => Carbon::now()
        ]);

        DB::table('tb_kategori')->insert([
            'kategori' => 'Koran',
            'created_at' => Carbon::now()
        ]);

        DB::table('tb_kategori')->insert([
            'kategori' => 'Majalah',
            'created_at' => Carbon::now()
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tb_kelas')->insert([
            'kelas' => 'Kelas-7.1',
            'created_at' => Carbon::now()
        ]);

        DB::table('tb_kelas')->insert([
            'kelas' => 'Kelas-7.2',
            'created_at' => Carbon::now()
        ]);

        DB::table('tb_kelas')->insert([
            'kelas' => 'Kelas-7.3',
            'created_at' => Carbon::now()
        ]);

        DB::table('tb_kelas')->insert([
            'kelas' => 'Kelas-7.4',
            'created_at' => Carbon::now()
        ]);

        DB::table('tb_kelas')->insert([
            'kelas' => 'Kelas-7.5',
            'created_at' => Carbon::now()
        ]);

        DB::table('tb_kelas')->insert([
            'kelas' => 'Kelas-7.6',
            'created_at' => Carbon::now()
        ]);

        DB::table('tb_kelas')->insert([
            'kelas' => 'Kelas-7.7',
            'created_at' => Carbon::now()
        ]);

        DB::table('tb_kelas')->insert([
            'kelas' => 'Kelas-7.8',
            'created_at' => Carbon::now()
        ]);

        DB::table('tb_kelas')->insert([
            'kelas' => 'Kelas-8.1',
            'created_at' => Carbon::now()
        ]);

        DB::table('tb_kelas')->insert([
            'kelas' => 'Kelas-8.2',
            'created_at' => Carbon::now()
        ]);

        DB::table('tb_kelas')->insert([
            'kelas' => 'Kelas-8.3',
            'created_at' => Carbon::now()
        ]);

        DB::table('tb_kelas')->insert([
            'kelas' => 'Kelas-8.4',
            'created_at' => Carbon::now()
        ]);

        DB::table('tb_kelas')->insert([
            'kelas' => 'Kelas-8.5',
            'created_at' => Carbon::now()
        ]);

        DB::table('tb_kelas')->insert([
            'kelas' => 'Kelas-8.6',
            'created_at' => Carbon::now()
        ]);

        DB::table('tb_kelas')->insert([
            'kelas' => 'Kelas-8.7',
            'created_at' => Carbon::now()
        ]);

        DB::table('tb_kelas')->insert([
            'kelas' => 'Kelas-8.8',
            'created_at' => Carbon::now()
        ]);

        DB::table('tb_kelas')->insert([
            'kelas' => 'Kelas-9.1',
            'created_at' => Carbon::now()
        ]);

        DB::table('tb_kelas')->insert([
            'kelas' => 'Kelas-9.2',
            'created_at' => Carbon::now()
        ]);

        DB::table('tb_kelas')->insert([
            'kelas' => 'Kelas-9.3',
            'created_at' => Carbon::now()
        ]);

        DB::table('tb_kelas')->insert([
            'kelas' => 'Kelas-9.4',
            'created_at' => Carbon::now()
        ]);

        DB::table('tb_kelas')->insert([
            'kelas' => 'Kelas-9.5',
            'created_at' => Carbon::now()
        ]);

        DB::table('tb_kelas')->insert([
            'kelas' => 'Kelas-9.6',
            'created_at' => Carbon::now()
        ]);

        DB::table('tb_kelas')->insert([
            'kelas' => 'Kelas-9.7',
            'created_at' => Carbon::now()
        ]);

        DB::table('tb_kelas')->insert([
            'kelas' => 'Kelas-9.8',
            'created_at' => Carbon::now()
        ]);
    }
}

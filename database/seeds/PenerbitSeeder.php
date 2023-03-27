<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenerbitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tb_penerbit')->insert([
            [
                'nama_penerbit' => 'Deepublish',
                'alamat' => 'Jl. Rajawali Gg. Elang 6 No.3, Drono, Sardonoharjo, Kec. Ngaglik, Kabupaten Sleman, Daerah Istimewa Yogyakarta',
                'pic_hp' => '(0274) 283-6082',
                'email' => 'adminkonsultan@deepublish.co.id; cs@deepublish.co.id',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'nama_penerbit' => 'Bukunesia',
                'alamat' => 'Jl.Rajawali G. Elang 6 No 3 RT/RW 005/033, Drono, Sardonoharjo, Ngaglik, Sleman, D.I Yogyakarta 55581',
                'pic_hp' => '0811-2831-577',
                'email' => 'admin@bukunesia.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'nama_penerbit' => 'Gramedia Pustaka Utama',
                'alamat' => 'Gedung Kompas Gramedia Lantai 5, Jl. Palmerah Barat 29-37. Jakarta 10270',
                'pic_hp' => NULL,
                'email' => NULL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'nama_penerbit' => 'Grasindo',
                'alamat' => 'Gedung Kompas Gramedia Blok 1/lantai 3 Jalan Palmerah Barat No. 29-37 Jakarta',
                'pic_hp' => NULL,
                'email' => 'redaksi@grasindo.id',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'nama_penerbit' => 'Kata Depan',
                'alamat' => 'Perum Executive Village E9 Jl. Curug Agung No. 36, Tanah Baru, Beji Depok 16426',
                'pic_hp' => NULL,
                'email' => 'katadepan@gmail.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'nama_penerbit' => 'Gradien Mediatama',
                'alamat' => 'Jl. Wora Wari No.A-74, Baciro, Kec. Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55225',
                'pic_hp' => NULL,
                'email' => NULL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'nama_penerbit' => 'Twigora',
                'alamat' => 'Jl. Delima Raya, RT.4/RW.2, Malaka Sari, Kec. Duren Sawit, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13460',
                'pic_hp' => NULL,
                'email' => NULL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'nama_penerbit' => 'Media Kita',
                'alamat' => 'Jl. H. Montong No.57, RT.6/RW.2, Ciganjur, Kec. Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12630',
                'pic_hp' => NULL,
                'email' => NULL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'nama_penerbit' => 'Noura Books',
                'alamat' => 'Jl. Jagakarsa Raya no. 40 Rt 07/04 Jagakarsa, Jakarta Selatan, 12620',
                'pic_hp' => NULL,
                'email' => 'redaksi@noura.mizan.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'nama_penerbit' => 'Haru',
                'alamat' => 'Jl. Sulawesi No.17, Nurmanan, Mangkujayan, Ponorogo, Jawa Timur',
                'pic_hp' => '(0352) 481444',
                'email' => NULL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'nama_penerbit' => 'Bentang Belia',
                'alamat' => 'Jl. Palagan Tentara Pelajar No.101, RT.004/RW.035, Jongkang, Sariharjo, Kec. Ngaglik, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281',
                'pic_hp' => NULL,
                'email' => 'redaksi@bentangpustaka.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'nama_penerbit' => 'Tiga Ananda',
                'alamat' => 'Tiga Ananda',
                'pic_hp' => NULL,
                'email' => NULL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}

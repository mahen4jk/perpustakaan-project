<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MdBuku;
use App\MdDDC;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use Faker\UniqueGenerator;
use Illuminate\Validation\Rules\Unique;

$factory->define(MdBuku::class, function (Faker $faker) {

    return [
        //
        'id_buku' => MdBuku::kode(),
        'judul' => $faker->words(rand(5, 15), true),
        'isbn'=> $faker->numerify('##########', '#############'),
        'pengarang' => $faker->name,
        'penerbit_id' => App\MdPenerbit::all()->random()->id_penerbit,
        'class_id' => App\MdDDC::all()->random()->id_class,
        'kategori_id' => App\MdKategori::all()->random()->id_kategori,
        'tahun_terbit' => $faker->year($min = '2000', $max = 'now'),
        'stok_buku' => $faker->numerify('###'),
        'deskripsi' => $faker->text(),
        'created_at' => Carbon\Carbon::now(),
        'updated_at' => Carbon\Carbon::now(),
    ];
});

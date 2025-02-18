<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MdAnggota;
use App\MdKelas;
use Faker\Generator as Faker;

$factory->define(MdAnggota::class, function (Faker $faker) {
    $kelasIds = MdKelas::pluck('id_kelas')->toArray(); // Mengambil semua ID kelas

    return [
        'nis' => $faker->unique()->numerify('#######'), // Menghasilkan NIS unik
        'nama_anggota' => $faker->name,
        'j_kelamin' => $faker->randomElement(['L', 'P']),
        'kelas_id' => $faker->randomElement($kelasIds), // Menggunakan ID kelas yang sudah ada
        'alamat' => $faker->address,
        'hp' => $faker->phoneNumber,
        'status' => $faker->randomElement(['Aktif', 'Tdk_Aktif']),
    ];
});

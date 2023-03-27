<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MdAnggota;
use App\Model;
use Faker\Generator as Faker;

$factory->define(MdAnggota::class, function (Faker $faker) {
    $gender = $faker->randomElement(['L','P']);
    $status = $faker->randomElement(['Aktif','Tdk_Aktif']);
    return [
        //
        'nis' => $faker->numerify('######'),
        'nama_anggota' => $faker->name($gender),
        'j_kelamin'=> $gender,
        'kelas_id'=>App\MdKelas::all()->random()->id_kelas,
        'alamat'=>$faker->address,
        'hp'=>$faker->e164PhoneNumber,
        'status'=>$status,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});

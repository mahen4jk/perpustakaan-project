<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_anggota', function (Blueprint $table) {
            $table->increments('id_anggota');
            $table->char('nis',25);
            $table->string('nama_anggota',150);
            $table->enum('j_kelamin',['L','P']);
            $table->unsignedInteger('kelas_id');
            $table->foreign('kelas_id')->references('id_kelas')->on('tb_kelas')->onDelete('cascade')->onUpdate('cascade');
            $table->longText('alamat');
            $table->char('hp',25);
            $table->unique('hp');
            $table->enum('status',['Aktif','Tdk_Aktif']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_anggota');
    }
}

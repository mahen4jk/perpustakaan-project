<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbAnggota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tb_anggota', function (Blueprint $table) {
            $table->increments('id_anggota');
            $table->char('nis',25);
            $table->unsignedInteger('kelas_id');
            $table->foreign('kelas_id')->references('id_kelas')->on('tb_kelas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama_anggota',200);
            $table->enum('j_kelamin',['L','P']);
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
        //
        Schema::dropIfExists('tb_anggota');
    }
}

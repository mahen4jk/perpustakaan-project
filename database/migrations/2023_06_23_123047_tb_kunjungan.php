<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbKunjungan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tb_kunjungan', function (Blueprint $table) {
            $table->increments('id_kunjungan');
            $table->unsignedInteger('anggota_id');
            $table->string('nis')->nullable();
            $table->string('nama_anggota')->nullable();
            $table->string('kelas')->nullable();
            $table->date('tgl_kunjungan');

            $table->foreign('anggota_id')
                ->references('id_anggota')
                ->on('tb_anggota')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('tb_kunjungan');
    }
}

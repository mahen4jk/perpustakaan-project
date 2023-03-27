<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_peminjaman', function (Blueprint $table) {
            $table->char('kode_pinjam',50)->primary();
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali');
            $table->unsignedInteger('anggota_id');
            $table->foreign('anggota_id')->references('id_anggota')->on('tb_anggota')->onDelete('cascade')->onUpdate('cascade');
            $table->char('buku_id',20);
            $table->foreign('buku_id')->references('id_buku')->on('tb_buku')->onDelete('cascade')->onUpdate('cascade');
            $table->char('status',20);
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
        Schema::dropIfExists('tb_peminjaman');
    }
}

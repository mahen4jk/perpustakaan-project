<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPengembalianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pengembalian', function (Blueprint $table) {
            $table->char('kode_kembali')->primary();
            $table->char('pinjam_kode', 50);
            $table->foreign('pinjam_kode')->references('kode_pinjam')->on('tb_peminjaman')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tgl_dikembalikan');
            $table->integer('terlambat');
            $table->unsignedInteger('denda_id');
            $table->foreign('denda_id')->references('id_denda')->on('tb_denda')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('total_denda');
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
        Schema::dropIfExists('tb_pengembalian');
    }
}

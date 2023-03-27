<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_buku', function (Blueprint $table) {
            $table->char('id_buku',20);
            $table->primary('id_buku');
            $table->char('judul',200);
            $table->char('isbn',25);
            $table->char('pengarang',225);
            $table->unsignedInteger('penerbit_id');
            $table->foreign('penerbit_id')->references('id_penerbit')->on('tb_penerbit')->onDelete('cascade')->onUpdate('cascade');
            $table->char('class_id',25);
            $table->foreign('class_id')->references('id_class')->on('tb_ddc')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('kategori_id');
            $table->foreign('kategori_id')->references('id_kategori')->on('tb_kategori')->onDelete('cascade')->onUpdate('cascade');
            $table->year('tahun_terbit');
            $table->integer('stok_buku');
            $table->longText('deskripsi');
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
        Schema::dropIfExists('tb_buku');
    }
}

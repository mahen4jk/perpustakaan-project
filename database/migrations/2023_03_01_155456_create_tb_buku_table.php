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
            $table->char('jilid',25)->nullable();
            $table->char('isbn',25)->nullable();
            $table->char('pengarang',225);
            $table->unsignedInteger('class_id');
            $table->foreign('class_id')->references('id_class')->on('tb_ddc')->onDelete('cascade')->onUpdate('cascade');
            $table->char('tempat_terbit',150);
            $table->char('penerbit',150);
            $table->year('tahun_terbit');
            $table->integer('stok_buku');
            $table->integer('sisa_exemplar');
            $table->longText('deskripsi')->nullable();
            $table->string('cover')->nullable();
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

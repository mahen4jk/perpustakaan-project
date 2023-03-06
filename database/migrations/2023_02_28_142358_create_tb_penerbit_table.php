<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPenerbitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_penerbit', function (Blueprint $table) {
            $table->increments('id_penerbit');
            $table->string('nama_penerbit',100);
            $table->string('alamat',225);
            $table->char('pic_hp',25);
            $table->char('email',100);
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
        Schema::dropIfExists('tb_penerbit');
    }
}

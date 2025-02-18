<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbPendik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        //
        Schema::create('tb_pendik', function (Blueprint $table) {
            $table->increments('id_pendik');
            $table->char('nip',25)->nullable();
            $table->string('nama_pendik',200);
            $table->enum('j_kelamin',['L','P']);
            $table->char('roles',40);
            $table->string('username')->nullable();
            $table->string('password')->nullable();
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
        //
        Schema::dropIfExists('tb_pendik');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->char('username')->after('name')->unique();
            $table->string('avatar')->after('username')->nullable();
            $table->string('phone')->after('gender')->nullable();
            $table->char('roles', 40)->after('phone');
            $table->enum("status", ["ACTIVE", "INACTIVE"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn("username");
            $table->dropColumn("level");
            $table->dropColumn("number");
            $table->dropColumn("avatar");
            $table->dropColumn("status");
        });
    }
}

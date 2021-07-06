<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PenyesuaianTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar')->nullable();
            $table->longText('alamat')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('status_pekerjaan')->nullable();
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
            $table->dropColumn('avatar')->nullable();
            $table->dropColumn('alamat')->nullable();
            $table->dropColumn('no_hp',13)->nullable();
            $table->dropColumn('jenis_kelamin')->nullable();
            $table->dropColumn('status_pekerjaan')->nullable();
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PenyesuaianTableGambarKamar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gambar_kamars', function (Blueprint $table) {
            $table->dropColumn('keterangan');
            $table->dropColumn('kos_id');
            $table->integer('kamar_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gambar_kamars', function (Blueprint $table) {
            $table->string('keterangan');
            $table->integer('kos_id');
            $table->droopColumn('kamar_id');
        });
    }
}

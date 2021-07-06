<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kos', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('nama_kos');
            $table->string('slug');
            $table->string('latitude');
            $table->string('longitude');
            $table->longText('alamat');
            $table->string('type_kos'); //wanita //pria //campur
            $table->longText('aturan_kos');
            $table->longText('deskripsi_kos');
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
        Schema::dropIfExists('kos');
    }
}

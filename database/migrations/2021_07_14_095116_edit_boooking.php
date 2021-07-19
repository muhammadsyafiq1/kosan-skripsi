<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditBoooking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('masa_kos');
            $table->date('mulai_sewa');
            $table->date('habis_sewa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('masa_kos');
            $table->dropColumn('mulai_sewa');
            $table->dropColumn('habis_sewa');
        });
    }
}

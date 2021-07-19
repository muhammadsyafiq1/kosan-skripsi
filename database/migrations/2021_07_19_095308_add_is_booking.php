<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsBooking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kos', function (Blueprint $table) {
            $table->boolean('is_booking');
            $table->string('biaya_booking');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kos', function (Blueprint $table) {
            $table->dropColumn('is_booking');
            $table->dropColumn('biaya_booking');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('kode_booking');
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_jadwal')->unsigned();
            $table->dateTime('tgl_waktu');
            $table->enum('status', ['booking', 'in', 'out']);
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_jadwal')->references('id')->on('jadwals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_bookings');
    }
};

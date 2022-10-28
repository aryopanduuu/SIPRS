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
        Schema::create('jadwal_users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_jadwal')->unsigned();
            $table->bigInteger('id_dokter')->unsigned();
            $table->timestamps();
            $table->foreign('id_jadwal')->references('id')->on('jadwals');
            $table->foreign('id_dokter')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_users');
    }
};

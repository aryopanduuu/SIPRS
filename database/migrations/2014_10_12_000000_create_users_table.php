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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->char('nik_nip_user', 16)->unique();
            $table->string('nomor_rekam_medis', 8)->unique()->nullable();
            $table->string('nama_user');
            $table->enum('jk', ['laki-laki', 'perempuan']);
            $table->date('tgl_lahir')->nullable();
            $table->text('alamat');
            $table->string('email')->nullable();
            $table->string('no_hp', 15);
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
        Schema::dropIfExists('users');
    }
};

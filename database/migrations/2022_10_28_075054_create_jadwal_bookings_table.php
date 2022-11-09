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
			$table->string('kode_booking');
			$table->uuid('user_id');
			$table->uuid('jadwal_id');
			$table->dateTime('tgl_waktu');
			$table->enum('status', ['booking', 'in', 'out']);
			$table->timestamps();
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('jadwal_id')->references('id')->on('jadwals');
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

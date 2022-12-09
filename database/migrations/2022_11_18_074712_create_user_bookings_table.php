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
		Schema::create('user_bookings', function (Blueprint $table) {
			$table->uuid('id');
			$table->char('kode_antrian', 12)->unique();
			$table->char('snap_token', 36);
			$table->char('nomor_antrian', 4);
			$table->uuid('user_id');
			$table->uuid('dokter_id');
			$table->uuid('poli_id');
			$table->date('tgl_periksa');
			$table->time('perkiraan_jam');
			$table->tinyInteger('payment_status')->default(0);
			$table->timestamps();
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('poli_id')->references('id')->on('polis');
			$table->foreign('dokter_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('user_bookings');
	}
};

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
		Schema::create('poli_jadwals', function (Blueprint $table) {
			$table->uuid('poli_id');
			$table->enum('hari', ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu']);
			$table->time('jam_kerja_buka');
			$table->time('jam_kerja_tutup');
			$table->timestamps();
			$table->foreign('poli_id')->references('id')->on('polis');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('poli_jadwals');
	}
};

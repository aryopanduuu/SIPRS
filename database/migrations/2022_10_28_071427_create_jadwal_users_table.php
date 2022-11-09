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
			$table->uuid('jadwal_id');
			$table->uuid('dokter_id');
			$table->timestamps();
			$table->foreign('jadwal_id')->references('id')->on('jadwals');
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
		Schema::dropIfExists('jadwal_users');
	}
};

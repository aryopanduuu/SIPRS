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
		Schema::create('user_dokter_spesialis', function (Blueprint $table) {
			$table->uuid('user_id');
			$table->uuid('spesialis_id');
			$table->timestamps();
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('spesialis_id')->references('id')->on('spesialis');
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('user_dokter_spesialis');
	}
};

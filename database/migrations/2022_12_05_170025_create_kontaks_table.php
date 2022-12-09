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
		Schema::create('kontaks', function (Blueprint $table) {
			$table->uuid('id')->primary();
			$table->string('keterangan');
			$table->string('slug');
			$table->string('konten');
			$table->enum('tipe', ['seo', 'kontak']);
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
		Schema::dropIfExists('kontaks');
	}
};

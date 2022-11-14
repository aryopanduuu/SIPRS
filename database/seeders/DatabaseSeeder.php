<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Poli;
use App\Models\PoliJadwal;
use App\Models\Spesialis;
use App\Models\UserDokter;
use App\Models\UserPasien;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$poli = Poli::factory(10)->create();
		$this->call([
			PoliJadwalSeeder::class
		]);
		$spesialis = Spesialis::factory(46)->create();
		$pasien = UserPasien::factory(100)->create();
		$dokter = UserDokter::factory(50)->create();
	}
}

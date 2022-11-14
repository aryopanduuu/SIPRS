<?php

namespace Database\Seeders;

use App\Models\Poli;
use App\Models\PoliJadwal;
use Illuminate\Database\Seeder;

class PoliJadwalSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$reset = false;
		$poli = Poli::all();
		foreach ($poli as $index => $item) {
			for ($i = 0; $i < rand(5, 7); $i++) {
				PoliJadwal::factory(1)->state([
					'hari' => fake()->unique($reset)->randomElement(['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu']),
					'poli_id' => $item->id
				])
					->create();
				$reset = false;
			}
			$reset = true;
		}
	}
}

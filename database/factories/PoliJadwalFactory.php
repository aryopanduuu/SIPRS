<?php

namespace Database\Factories;

use App\Models\Poli;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PoliJadwal>
 */
class PoliJadwalFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		return [
			'jam_kerja_buka'  => mt_rand(8, 10) . ":" . fake()->randomElement([10, 15, 20, 25, 30, 35, 45, 00]),
			'jam_kerja_tutup' => mt_rand(16, 23) . ":" . fake()->randomElement([10, 15, 20, 25, 30, 35, 45, 00]),
		];
	}
}

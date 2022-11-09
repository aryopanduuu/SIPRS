<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Poli>
 */
class PoliFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		return [
			'nama_poli' => ucwords(strtolower(fake()->unique()->randomElement([
				'POLI ANAK & TUMBUH KEMBANG',
				'POLI PENYAKIT DALAM & GERIATRI',
				'POLI OBSTETRI & GINEKOLOGI',
				'POLI BEDAH',
				'POLI GIGI',
				'POLI MATA',
				'POLI THT',
				'POLI SYARAF',
				'POLI PARU',
				'POLI JANTUNG DAN PEMBULUH DARAH'
			]))),
			'jam_buka'  => mt_rand(8, 10) . ":" . fake()->randomElement([10, 15, 20, 25, 30, 35, 45, 00]),
			'jam_tutup' => mt_rand(16, 23) . ":" . fake()->randomElement([10, 15, 20, 25, 30, 35, 45, 00]),
		];
	}
}

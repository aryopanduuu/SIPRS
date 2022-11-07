<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		return [
			'nik'       => fake('id_ID')->nik(),
			'nama'      => fake()->unique()->name(),
			'jk'        => fake()->randomElement(['laki-laki', 'perempuan']),
			'tgl_lahir' => fake()->dateTimeBetween('-80 years', '-12 years'),
			'alamat'    => fake()->unique()->address(),
			'email'     => fake()->unique()->freeEmail(),
			'no_hp'     => fake()->unique()->e164PhoneNumber(),
		];
	}
}

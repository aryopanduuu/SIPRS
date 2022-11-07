<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserDokter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserDokter>
 */
class UserDokterFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		return [
			'nip' => fake()->unique()->numerify('##################'),
			'user_id' => User::factory()
		];
	}
}

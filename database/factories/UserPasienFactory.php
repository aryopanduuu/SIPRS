<?php

namespace Database\Factories;

use App\Models\Spesialis;
use App\Models\User;
use App\Models\UserDokterSpesialis;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserPasien>
 */
class UserPasienFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		return [
			'nomor_rekam_medis' => fake()->unique()->numerify('###-##-####'),
			'user_id' => User::factory()
				->has(UserDokterSpesialis::factory()->count(2)
					->state(
						new Sequence(
							fn ($sequence) => ['spesialis_id' => Spesialis::all()->random()],
						)
					), 'spesialis')
		];
	}
}

<?php

namespace Database\Factories;

use App\Models\Poli;
use App\Models\Spesialis;
use App\Models\User;
use App\Models\UserDokter;
use App\Models\UserDokterPoli;
use App\Models\UserDokterSpesialis;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

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
		$nip = fake()->unique()->numerify('##################');
		return [
			'nip' => $nip,
			'foto' => 'avatar.png',
			'user_id' => User::factory()
				->has(UserDokterPoli::factory()->count(1)
					->state(
						new Sequence(
							fn ($sequence) => ['poli_id' => Poli::all()->random()],
						)
					), 'poli')
				->has(UserDokterSpesialis::factory()->count(rand(1, 3))
					->state(
						new Sequence(
							fn ($sequence) => ['spesialis_id' => Spesialis::all()->random()],
						)
					), 'spesialis')
		];
	}
}

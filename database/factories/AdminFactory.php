<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		return [
			'id' => fake()->uuid(),
			'username' => fake()->userName(),
			'password' => password_hash(123, PASSWORD_BCRYPT),
			'role' => fake()->randomElement(['super_admin', 'admin'])
		];
	}
}

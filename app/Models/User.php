<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model
{
	use HasFactory;

	public function jk(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => ucfirst($value)
		);
	}

	/**
	 * Get the dokter associated with the User
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function dokter(): HasOne
	{
		return $this->hasOne(UserDokter::class);
	}

	/**
	 * Get the user associated with the User
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function pasien(): HasOne
	{
		return $this->hasOne(UserPasien::class);
	}
}

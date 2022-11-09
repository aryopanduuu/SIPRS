<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class User extends Model
{
	use HasFactory, HasUuids;

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

	/**
	 * Get all of the spesialis for the User
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function spesialis(): HasMany
	{
		return $this->hasMany(UserDokterSpesialis::class);
	}

	/**
	 * Get the spesialis associated with the UserDokterSpesialis
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOneThrough
	 */
	public function spesialisDetail(): HasOneThrough
	{
		return $this->HasOneThrough(UserDokterSpesialis::class, Spesialis::class);
	}
}

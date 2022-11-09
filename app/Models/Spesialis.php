<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Spesialis extends Model
{
	use HasFactory, HasUuids;

	/**
	 * Get all of the user for the Spesialis
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function user(): HasMany
	{
		return $this->hasMany(UserDokterSpesialis::class);
	}

	/**
	 * Get the user associated with the UserDokterSpesialis
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOneThrough
	 */
	public function userDetail(): HasOneThrough
	{
		return $this->HasOneThrough(UserDokterSpesialis::class, User::class);
	}
}

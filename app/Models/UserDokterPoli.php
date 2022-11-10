<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserDokterPoli extends Model
{
	use HasFactory;

	/**
	 * Get the poli that owns the UserDokterPoli
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function poliDetail(): BelongsTo
	{
		return $this->belongsTo(Poli::class);
	}

	/**
	 * Get the user that owns the UserDokterPoli
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function userDetail(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}
}

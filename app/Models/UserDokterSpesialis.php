<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserDokterSpesialis extends Model
{
	use HasFactory;

	/**
	 * Get the user that owns the UserDokterSpesialis
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	/**
	 * Get the spesialis that owns the UserDokterSpesialis
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function spesialis(): BelongsTo
	{
		return $this->belongsTo(Spesialis::class);
	}
}

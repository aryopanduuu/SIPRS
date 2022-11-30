<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDokterSpesialis extends Model
{
	use HasFactory, SoftDeletes;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['spesialis_id'];

	/**
	 * Get the user that owns the UserDokterSpesialis
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function userDetail(): BelongsTo
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	}

	/**
	 * Get the spesialis that owns the UserDokterSpesialis
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function spesialisDetail(): BelongsTo
	{
		return $this->belongsTo(Spesialis::class, 'spesialis_id', 'id');
	}
}

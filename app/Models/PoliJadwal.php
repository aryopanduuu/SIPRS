<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PoliJadwal extends Model
{
	use HasFactory;

	/**
	 * Get the poli that owns the PoliJadwal
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function poli(): BelongsTo
	{
		return $this->belongsTo(Poli::class);
	}
}

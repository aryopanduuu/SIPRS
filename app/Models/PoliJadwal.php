<?php

namespace App\Models;

use DateTimeImmutable;
use Illuminate\Database\Eloquent\Casts\Attribute;
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

	public function jamKerjaBuka(): Attribute
	{
		return new Attribute(
			get: fn ($value) => $this->timeWithoutSec($value)
		);
	}

	public function jamKerjaTutup(): Attribute
	{
		return new Attribute(
			get: fn ($value) => $this->timeWithoutSec($value)
		);
	}

	private function timeWithoutSec($time): String
	{
		return date('H:i', strtotime($time));
	}
}

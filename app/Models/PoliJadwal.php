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

	// protected $primaryKey = 'poli_id';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['jam_kerja_buka', 'jam_kerja_tutup', 'hari'];

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
			get: fn ($value) => $value ? $this->timeWithoutSec($value) : null
		);
	}

	public function jamKerjaTutup(): Attribute
	{
		return new Attribute(
			get: fn ($value) => $value ? $this->timeWithoutSec($value) : null
		);
	}

	public function jamKerja(): Attribute
	{
		return new Attribute(
			get: fn ($value, $attributes) => $attributes['jam_kerja_buka'] && $attributes['jam_kerja_tutup'] ? $this->timeWithoutSec($attributes['jam_kerja_buka']) . ' - ' . $this->timeWithoutSec($attributes['jam_kerja_tutup']) : null,
		);
	}

	private function timeWithoutSec($time): String
	{
		return date('H:i', strtotime($time));
	}
}

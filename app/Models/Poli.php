<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Poli extends Model
{
	use HasFactory, HasUuids;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['nama_poli'];



	/**
	 * Get all of the jadwal for the Poli
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function poliJadwal(): HasMany
	{
		return $this->hasMany(PoliJadwal::class, 'poli_id', 'id');
	}
}

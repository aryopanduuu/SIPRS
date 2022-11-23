<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use sirajcse\UniqueIdGenerator\UniqueIdGenerator;

class UserBooking extends Model
{
	use HasFactory, HasUuids;

	protected $guarded = [];

	public function perkiraanJam(): Attribute
	{
		return new Attribute(
			get: fn ($value) => date('H:i', strtotime($value)),
		);
	}

	public function TglPeriksa(): Attribute
	{
		return new Attribute(
			get: fn ($value) => Carbon::parse($value)->locale('id-ID')->translatedFormat('l, d F Y'),
		);
	}

	/**
	 * Get the user dokter that owns the UserBooking
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function userDokter(): BelongsTo
	{
		return $this->belongsTo(User::class, 'dokter_id', 'id')->has('dokter');
	}

	/**
	 * Get the user pasien that owns the UserBooking
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function userPasien(): BelongsTo
	{
		return $this->belongsTo(User::class, 'user_id', 'id')->has('pasien');
	}

	/**
	 * Get the poli that owns the UserBooking
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function poli(): BelongsTo
	{
		return $this->belongsTo(Poli::class, 'poli_id', 'id');
	}

	public static function bookingLatestAntrianByDay($poli, $dokter, $tgl_periksa)
	{
		$data = parent::where('poli_id', $poli)
			->where('dokter_id', $dokter)
			->whereDate('tgl_periksa', $tgl_periksa)
			->latest()->first('nomor_antrian');

		if ($data) {
			$nomor_antrian = $data->nomor_antrian;
			$nomor_antrian++;
			$nomor_antrian = chr(rand(65, 90)) . explode($nomor_antrian[0], $nomor_antrian)[1];
		} else {
			$nomor_antrian = chr(rand(65, 90)) . '001';
		}
		return $nomor_antrian;
	}

	public static function getPerkiraanJam($poli, $dokter, $tgl_periksa)
	{
		$data = parent::where('poli_id', $poli)
			->where('dokter_id', $dokter)
			->whereDate('tgl_periksa', $tgl_periksa)
			->latest()->first('perkiraan_jam');

		if ($data) {
			$perkiraan_jam = date('h:i', strtotime('+30 minutes', strtotime($data->perkiraan_jam)));
		} else {
			$day = self::getDay(Str::lower(date('D', strtotime($tgl_periksa))));
			$perkiraan_jam = PoliJadwal::where('poli_id', $poli)
				->where('hari', $day)
				->first('jam_kerja_buka')->jam_kerja_buka;
		}

		return $perkiraan_jam;
	}

	private static function getDay($day)
	{
		$listDay = [
			'mon' => 'senin',
			'tue' => 'selasa',
			'wed' => 'rabu',
			'thu' => 'kamis',
			'fri' => 'jumat',
			'sat' => 'sabtu',
			'sun' => 'minggu',
		];
		return $listDay[$day];
	}

	public static function boot()
	{
		parent::boot();
		self::creating(function ($model) {
			$model->kode_antrian = UniqueIdGenerator::generate([
				'table'  => 'user_bookings',
				'length' => 12,
				'prefix' => rand(100, 999) . date('ymd')
			]);
		});
	}
}

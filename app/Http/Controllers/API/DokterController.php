<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PoliJadwal;
use App\Models\User;
use App\Models\UserBooking;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class DokterController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$data = User::has('dokter')
			->whereHas('poli', function (Builder $query) use ($request) {
				$query->where('poli_id', $request->poli);
			})
			->has('spesialis')
			->select(['id', 'nama'])
			->paginate();

		$data->each(function ($e, $keyE) use ($data, $request) {
			$e->spesialis->each(function ($v, $keyV) use ($data, $keyE) {
				$data[$keyE]->spesialis[$keyV] = 'Spesialis ' . $v->spesialisDetail->gelar;
			});

			$latest = UserBooking::where('poli_id', $request->poli)
				->where('dokter_id', $e->id)
				->whereDate('tgl_periksa', $request->tgl_periksa)
				->latest()->first('perkiraan_jam');

			if ($latest) {
				$perkiraan_jam = date('h:i', strtotime('+30 minutes', strtotime($latest->perkiraan_jam)));
			} else {
				$day = $this->getDay(Str::lower(date('D', strtotime($request->tgl_periksa))));
				$perkiraan_jam = PoliJadwal::where('poli_id', $request->poli)
					->where('hari', $day)
					->first('jam_kerja_buka')->jam_kerja_buka;
			}
			$data[$keyE]->perkiraan_jam = $perkiraan_jam;

			$data[$keyE]->foto = $e->dokter->foto;
			unset($data[$keyE]->dokter);
		});

		$response = [
			'data' => $data,
			'status' => 200
		];
		return response()->json($response, 200);
	}

	private function getDay($day)
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

	public function checkDokterExists(Request $request)
	{
		$validated = $request->validate([
			'poli' => 'required|exists:polis,id',
			'dokter' => 'required|exists:user_dokters,user_id'
		]);

		$poli = $validated['poli'];
		$dokter = User::has('dokter')
			->whereHas('poli', function (Builder $query) use ($poli) {
				$query->where('poli_id', $poli);
			})
			->find($validated['dokter']);

		if ($dokter) {
			$response = ['status' => 200];
		} else {
			$response = ['status' => 500];
		}
		return response()->json($response, $response['status']);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}

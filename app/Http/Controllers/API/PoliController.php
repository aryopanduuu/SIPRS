<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Poli;
use App\Models\PoliJadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PoliController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$data = Poli::get(['id', 'nama_poli AS key']);
		$response = ['data' => $data, 'status' => 200];

		return response()->json($response, 200);
	}

	public function jamKerja(Request $request)
	{
		$day = Str::lower(date('D', strtotime($request->hari)));
		$day = $this->getDay($day);

		$jamKerja = PoliJadwal::where('hari', $day)->where('poli_id', $request->poli)->first();

		if ($jamKerja->jam_kerja_buka && $jamKerja->jam_kerja_tutup) {
			$data = ['data' => $jamKerja->jam_kerja_buka . ' - ' . $jamKerja->jam_kerja_tutup, 'status' => 200];
		} else {
			$data = ['errors'    => ['jam_kerja' => ['Tidak ditemukan jadwal pada hari yang dipilih (libur).']], 'status' => 500];
		}
		return response()->json($data, $data['status']);
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
	 * @param  \App\Models\Poli  $poli
	 * @return \Illuminate\Http\Response
	 */
	public function show(Poli $poli)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Poli  $poli
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Poli $poli)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Poli  $poli
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Poli $poli)
	{
		//
	}
}

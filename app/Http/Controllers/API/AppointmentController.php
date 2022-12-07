<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\NomorRekamMedisRequest;
use App\Http\Requests\sendEmailTicketRequest;
use App\Http\Requests\TglPemeriksaanRequest;
use App\Mail\TiketAntrian;
use App\Models\User;
use App\Models\UserBooking;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}

	public function checkNomorRekamMedis(NomorRekamMedisRequest $request)
	{
		$validated = $request->validated();

		$user = User::whereTglLahir($validated['tgl_lahir'])->whereHas('pasien', function (Builder $query) use ($validated) {
			$query->where('nomor_rekam_medis', $validated['nomor_rekam_medis']);
		})->first();

		if (!$user) {
			$response = [
				'errors' => ['nomor_rekam_medis' => ['Data pasien tidak ditemukan.']],
				'status' => 500
			];
		} else {
			$response = [
				'data'  => $user->first(['id', 'nama', 'tgl_lahir', 'jk', 'alamat', 'no_hp']),
				'status' => 200
			];
		}
		return response()->json($response, $response['status']);
	}

	public function checkTglPemeriksaan(TglPemeriksaanRequest $request)
	{
		$response = [
			'status' => 200
		];
		return response()->json($response, 200);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$user = User::has('pasien')->find($request->user);
		$dokter = User::has('dokter')
			->whereHas('poli', function (Builder $query) use ($request) {
				$query->where('poli_id', $request->poli);
			})
			->find($request->dokter);

		if (!$user || !$dokter) {
			return response()->json(['msg' => 'Data gagal diproses.'], 500);
		} else {

			$nomor_antrian = UserBooking::bookingLatestAntrianByDay($request->poli, $request->dokter, $request->tgl_periksa);
			$perkiraan_jam = UserBooking::getPerkiraanJam($request->poli, $request->dokter, $request->tgl_periksa);


			$create = UserBooking::create([
				'nomor_antrian' => $nomor_antrian,
				'user_id' => $request->user,
				'dokter_id' => $request->dokter,
				'poli_id' => $request->poli,
				'tgl_periksa' => $request->tgl_periksa,
				'perkiraan_jam' => $perkiraan_jam
			]);
			$response = [
				'data' => $create,
				'url' => route('appointment.show', $create->id),
				'status' => 200
			];
			return response()->json($response, 200);
		}
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

	public function sendEmailTicket(sendEmailTicketRequest $request)
	{
		$validated = $request->validated();
		$data = UserBooking::where('kode_antrian', $validated['kode_antrian'])->first();
		Mail::to($validated['email'])
			->send(new TiketAntrian($data));
		return response()->json([], 200);
	}
}

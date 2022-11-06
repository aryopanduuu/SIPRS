<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('pages.appointment');
	}

	public function checkNomorRekamMedis(AppointmentRequest $request)
	{
		if ($request->has('step') && in_array($request->step, [1, 2, 3])) {
			$validated = $request->validated();
			if ($request->step == 1) {
				$response = $this->validateStep1($validated);
			} else if ($request->step == 2) {
				$response = [
					'status' => 200
				];
			}
			return response()->json($response, 200);
		}
		$response = [
			'message' => 'Terjadi Kesalahan.',
			'status' => 400
		];
		return response()->json($response, 400);
	}

	private function validateStep1($validated)
	{
		$user = User::whereNomorRekamMedis($validated['nomor_rekam_medis'])->whereTglLahir($validated['tgl_lahir']);
		if (!$user->count()) {
			$response = [
				'errors' => [
					'nomor_rekam_medis' => ['Data nomor rekam medis tidak ditemukan.']
				],
				'status' => 404
			];
		} else {
			$response = [
				'data'  => $user->first([
					'nama_user',
					'tgl_lahir',
					'jk',
					'alamat',
					'no_hp'
				]),
				'status' => 200
			];
		}
		return $response;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
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
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
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

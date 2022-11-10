<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DokterController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$dokter = User::has('dokter')
			->whereHas('poli', function (Builder $query) use ($request) {
				$query->where('poli_id', $request->poli);
			})
			// ->with('spesialis.spesialisDetail')
			->select(['id', 'nama'])
			->paginate(2);

		$data = $dokter;

		$dokter->load('spesialis.spesialisDetail');
		$dokter->each(function ($e, $keyE) use ($data) {
			$e->spesialis->each(function ($v, $keyV) use ($data, $keyE) {
				$data[$keyE]->spesialis[$keyV] = $v->spesialisDetail->gelar;
			});
		});
		// $data = $data->paginate();
		$response = [
			'data' => $data,
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

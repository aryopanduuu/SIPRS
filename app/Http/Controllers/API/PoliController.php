<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$data = Poli::get(['id', 'nama_poli']);
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

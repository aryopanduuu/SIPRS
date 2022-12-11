<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use App\Models\Spesialis;
use App\Models\User;
use Illuminate\Http\Request;

class DokterController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$data = User::join('user_dokters', 'id', '=', 'user_dokters.user_id')
			->join('user_dokter_polis', 'user_dokter_polis.user_id', '=', 'users.id')
			->join('polis', 'user_dokter_polis.poli_id', '=', 'polis.id')
			->select('users.id', 'users.nama', 'user_dokters.foto', 'polis.nama_poli as poli')
			->orderBy('nama', 'ASC')
			->paginate(8);
		$poli = Poli::pluck('nama_poli', 'id');
		$spesialis = Spesialis::pluck('gelar', 'id');
		return view('pages.dokter.index', compact('data', 'poli', 'spesialis'));
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
		$data = User::join('user_dokters', 'id', '=', 'user_dokters.user_id')
			->join('user_dokter_polis', 'user_dokter_polis.user_id', '=', 'users.id')
			->join('polis', 'user_dokter_polis.poli_id', '=', 'polis.id')
			->select('users.id', 'users.nama', 'user_dokters.foto', 'polis.nama_poli as poli')
			->firstOrFail();;
		return view('pages.dokter.show', compact('data'));
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

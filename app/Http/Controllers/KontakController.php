<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$data = [];
		$kontak = Kontak::where('tipe', 'kontak')
			->whereIn('slug', ['email', 'nomor_telepon', 'map', 'alamat', 'fax'])
			->get(['konten', 'slug']);

		foreach ($kontak as $index => $item) {
			$data[$item->slug] = $item->konten;
		};
		$data = (object) $data;
		return view('pages.kontak', compact('data'));
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
	 * @param  \App\Models\Kontak  $kontak
	 * @return \Illuminate\Http\Response
	 */
	public function show(Kontak $kontak)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Kontak  $kontak
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Kontak $kontak)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Kontak  $kontak
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Kontak $kontak)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Kontak  $kontak
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Kontak $kontak)
	{
		//
	}
}

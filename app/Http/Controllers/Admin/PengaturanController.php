<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$data = Pengaturan::get()
			->map(function ($item) {
				if ($item->slug == 'harga-pendaftaran-online') {
					$item->konten = "Rp " . number_format($item->konten, 0, '', '.');
				} else if ($item->slug == 'jarak-perkiraan-periksa') {
					$item->konten = $item->konten . ' Menit';
				}
				return $item;
			});
		return view('pages.admin.pengaturan.index', compact('data'));
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
	public function edit()
	{
		$data = Pengaturan::get();
		return view('pages.admin.pengaturan.edit', compact('data'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request)
	{
		$request->validate([
			'harga_pendaftaran_online' => 'required|numeric|min:1000',
			'jarak_perkiraan_periksa' => 'required|numeric|min:10'
		]);

		$price = Pengaturan::where('slug', 'harga-pendaftaran-online')->first();
		$price->konten = $request->harga_pendaftaran_online;
		$price->save();

		$jarak = Pengaturan::where('slug', 'jarak-perkiraan-periksa')->first();
		$jarak->konten = $request->jarak_perkiraan_periksa;
		$jarak->save();

		alert('Sukses', 'Data berhasil diubah', 'success');
		return redirect()->back();
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

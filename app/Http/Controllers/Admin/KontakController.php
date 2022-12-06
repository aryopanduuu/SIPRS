<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormKontakRequest;
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
		$data = Kontak::where('tipe', 'kontak')->get();
		return view('pages.admin.kontak.index', compact('data'));
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
		$data = Kontak::where('tipe', 'kontak')
			->where('id', $id)
			->firstOrFail();

		if ($data->slug == 'map') {
			$lt = explode(',', $data->konten);
			$data->longitude = $lt[0];
			$data->latitude = $lt[1];
		}

		$page = [
			'title' => 'Ubah',
			'currentRoute' => route('admin.kontak.edit', $id),
			'formMethod' => 'PATCH',
			'formRoute' => route('admin.kontak.update', $id)
		];
		return view('pages.admin.kontak.edit', compact('data', 'page'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(FormKontakRequest $request, $id)
	{
		$data = Kontak::where('tipe', 'kontak')
			->where('id', $id)
			->firstOrFail();

		$validated = $request->validated();
		if ($request->has('email')) {
			$param = $validated['email'];
		} else if ($request->has('alamat')) {
			$param = $validated['alamat'];
		} else if ($request->has('nomor_telepon')) {
			$param = $validated['nomor_telepon'];
		} else if ($request->has(['longitude', 'latitude'])) {
			$param = $validated['longitude'] . ',' . $validated['latitude'];
		}
		$data->update(['konten' => $param]);

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

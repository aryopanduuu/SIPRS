<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DokterDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormDokterRequest;
use App\Models\User;
use App\Models\UserDokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(DokterDataTable $dataTable)
	{
		return $dataTable->render('pages.admin.dokter.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$page = [
			'title' => 'Tambah',
			'currentRoute' => route('admin.dokter.create'),
			'formMethod' => 'POST',
			'formRoute' => route('admin.dokter.store')
		];
		return view('pages.admin.dokter.form', compact('page'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(FormDokterRequest $request)
	{
		$validated = $request->validated();

		$user = User::create([
			'nik' => $validated['nik'],
			'nama' => $validated['nama'],
			'jk' => $validated['jenis_kelamin'],
			'tgl_lahir' => $validated['tanggal_lahir'],
			'alamat' => $validated['alamat'],
			'email' => $validated['email'],
			'no_hp' => $validated['no_hp'],
		]);
		$user->dokter()->create([
			'nip' => $validated['nip']
		]);

		alert('Sukses', 'Data berhasil ditambahkan', 'success');
		return redirect()->back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Dokter  $dokter
	 * @return \Illuminate\Http\Response
	 */
	public function show(UserDokter $dokter)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Dokter  $dokter
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$data = User::where('id', $id)->has('dokter')->firstOrFail();
		$data->nip = $data->dokter->nip;

		$page = [
			'title' => 'Ubah',
			'currentRoute' => route('admin.dokter.edit', $id),
			'formMethod' => 'PATCH',
			'formRoute' => route('admin.dokter.update', $id)
		];
		return view('pages.admin.dokter.form', compact('data', 'page'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Dokter  $dokter
	 * @return \Illuminate\Http\Response
	 */
	public function update(FormDokterRequest $request, $id)
	{
		$data = User::where('id', $id)->has('dokter')->firstOrFail();
		$validated = $request->validated();

		$data->update([
			'nik' => $validated['nik'],
			'nama' => $validated['nama'],
			'jk' => $validated['jenis_kelamin'],
			'tgl_lahir' => $validated['tanggal_lahir'],
			'alamat' => $validated['alamat'],
			'email' => $validated['email'],
			'no_hp' => $validated['no_hp'],
		]);
		$data->dokter->update([
			'nip' => $validated['nip']
		]);

		alert('Sukses', 'Data berhasil diubah', 'success');
		return redirect()->back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Dokter  $dokter
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(UserDokter $dokter)
	{
		//
	}
}

<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DokterBySpesialisDataTable;
use App\DataTables\SpesialisDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FormSpesialisRequest;
use App\Models\Spesialis;
use Illuminate\Http\Request;

class SpesialisController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(SpesialisDataTable $dataTable)
	{
		return $dataTable->render('pages.admin.spesialis.index');
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
			'currentRoute' => route('admin.spesialis.create'),
			'formMethod' => 'POST',
			'formRoute' => route('admin.spesialis.store')
		];
		return view('pages.admin.spesialis.form', compact('page'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(FormSpesialisRequest $request)
	{
		$validated = $request->validated();
		$spesialis = Spesialis::create(['gelar' => $validated['gelar'], 'gelar_singkatan' => $validated['gelar_singkatan']]);

		alert('Sukses', 'Data berhasil ditambahkan', 'success');
		return redirect()->back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(DokterBySpesialisDataTable $dataTable, $id)
	{
		$data = Spesialis::where('id', $id)->firstOrFail();
		return $dataTable->with('id', $id)
			->render('pages.admin.spesialis.show', ['data' => $data]);
		// return view('')
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$data = Spesialis::where('id', $id)->firstOrFail();
		$page = [
			'title' => 'Ubah',
			'currentRoute' => route('admin.spesialis.edit', $id),
			'formMethod' => 'PATCH',
			'formRoute' => route('admin.spesialis.update', $id)
		];
		return view('pages.admin.spesialis.form', compact('data', 'page'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(FormSpesialisRequest $request, $id)
	{
		$data = Spesialis::where('id', $id)->firstOrFail();
		$validated = $request->validated();

		$data->update(['gelar' => $validated['gelar'], 'gelar_singkatan' => $validated['gelar_singkatan']]);

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

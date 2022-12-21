<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PoliDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FormPoliRequest;
use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request, PoliDataTable $dataTable)
	{
		return $dataTable->render('pages.admin.poli.index');
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
			'currentRoute' => route('admin.poli.create'),
			'formMethod' => 'POST',
			'formRoute' => route('admin.poli.store')
		];
		return view('pages.admin.poli.form', compact('page'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(FormPoliRequest $request)
	{
		$validated = $request->validated();
		$poli = Poli::create(['nama_poli' => $validated['nama_poli']]);

		alert('Sukses', 'Data berhasil ditambahkan', 'success');
		return redirect()->back();
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
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Poli  $poli
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$data = Poli::where('id', $id)->firstOrFail();
		$page = [
			'title' => 'Ubah',
			'currentRoute' => route('admin.poli.edit', $id),
			'formMethod' => 'PATCH',
			'formRoute' => route('admin.poli.update', $id)
		];
		return view('pages.admin.poli.form', compact('data', 'page'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Poli  $poli
	 * @return \Illuminate\Http\Response
	 */
	public function update(FormPoliRequest $request, $id)
	{
		$data = Poli::where('id', $id)->firstOrFail();
		$validated = $request->validated();

		$data->update(['nama_poli' => $validated['nama_poli']]);

		alert('Sukses', 'Data berhasil diubah', 'success');
		return redirect()->back();
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

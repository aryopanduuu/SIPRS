<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SpesialisOfDokterDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormDokterSpesialisRequest;
use App\Models\Spesialis;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class DokterSpesialisController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(SpesialisOfDokterDataTable $dataTable, $id)
	{
		$data = User::where('id', $id)->has('dokter')->firstOrFail();
		return $dataTable->with('id', $id)
			->render('pages.admin.dokter.spesialis.index', ['data' => $data]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create($id)
	{
		$data = User::where('id', $id)->has('dokter')->firstOrFail();
		$listGelar = Spesialis::select(DB::raw('CONCAT(gelar, " - ", gelar_singkatan) AS gelar'), 'id')
			->orderBy('gelar', 'ASC')
			->pluck('gelar', 'id');
		$page = [
			'title' => 'Tambah',
			'currentRoute' => route('admin.dokter.spesialis.create', $id),
			'formMethod' => 'POST',
			'formRoute' => route('admin.dokter.spesialis.store', $id)
		];
		return view('pages.admin.dokter.spesialis.form', compact('data', 'page', 'listGelar'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(FormDokterSpesialisRequest $request, $id)
	{
		$data = User::where('id', $id)->has('dokter')->firstOrFail();
		$validated = $request->validated();

		$data->spesialis()->create(['spesialis_id' => $validated['gelar']]);

		alert('Sukses', 'Data berhasil ditambahkan', 'success');
		return redirect()->back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id, $spesialis)
	{
		$data = User::where('id', $id)
			->has('dokter')
			->whereHas('spesialis', function (Builder $query) use ($spesialis) {
				$query->where('spesialis_id', $spesialis);
			})
			->firstOrFail();

		$data->spesialis()->where('spesialis_id', $spesialis)->delete();

		alert('Sukses', 'Data berhasil dihapus', 'success');
		return redirect()->back();
	}
}

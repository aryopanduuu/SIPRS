<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\JadwalHarianDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormJadwalHarianRequest;
use App\Models\Poli;
use Illuminate\Support\Str;

class JadwalHarianController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(JadwalHarianDataTable $dataTables)
	{
		return $dataTables->render('pages.admin.jadwal-harian.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$poli = Poli::where('id', $id)->firstOrFail();
		$jadwal = $poli->poliJadwal()
			->orderByRaw("FIELD(hari, 'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu')")
			->get(['hari', 'jam_kerja_buka', 'jam_kerja_tutup']);

		$hari = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];

		$data = [];
		foreach ($hari as $index => $item) {
			$data[$index]['hari'] = Str::ucfirst($item);
			$data[$index]['jam_kerja_buka'] = '<i class="fas fa-xmark text-danger"></i>';
			$data[$index]['jam_kerja_tutup'] = '<i class="fas fa-xmark text-danger"></i>';

			foreach ($jadwal as $e) {
				if ($item == $e->hari) {
					if ($e->jam_kerja_buka) {
						$data[$index]['jam_kerja_buka'] = $e->jam_kerja_buka;
					}
					if ($e->jam_kerja_tutup) {
						$data[$index]['jam_kerja_tutup'] = $e->jam_kerja_tutup;
					}
					break;
				}
			}
		}
		return view('pages.admin.jadwal-harian.show', compact('data', 'poli'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$data = Poli::where('id', $id)->firstOrFail();

		$page = [
			'title' => 'Ubah',
			'currentRoute' => route('admin.jadwal-harian.edit', $id),
			'formMethod' => 'PATCH',
			'formRoute' => route('admin.jadwal-harian.update', $id)
		];
		return view('pages.admin.jadwal-harian.edit', compact('data', 'page'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(FormJadwalHarianRequest $request, $id)
	{
		$data = Poli::where('id', $id)->firstOrFail();
		$validated = $request->validated();

		if ($request->has('senin_jam_buka') && $request->has('senin_jam_tutup')) {
			$param = [
				'hari' => 'senin',
				'jam_kerja_buka'  => $validated['senin_jam_buka'],
				'jam_kerja_tutup' => $validated['senin_jam_tutup'],
			];
			$sql = $data->poliJadwal()->where('hari', 'senin');
			if ($sql->exists()) {
				$sql->update($param);
			} else {
				$sql->create($param);
			}
		}

		if ($request->has('selasa_jam_buka') && $request->has('selasa_jam_tutup')) {
			$param = [
				'hari' => 'selasa',
				'jam_kerja_buka'  => $validated['selasa_jam_buka'],
				'jam_kerja_tutup' => $validated['selasa_jam_tutup'],
			];
			$sql = $data->poliJadwal()->where('hari', 'selasa');
			if ($sql->exists()) {
				$sql->update($param);
			} else {
				$sql->create($param);
			}
		}

		if ($request->has('rabu_jam_buka') && $request->has('rabu_jam_tutup')) {
			$param = [
				'hari' => 'rabu',
				'jam_kerja_buka'  => $validated['rabu_jam_buka'],
				'jam_kerja_tutup' => $validated['rabu_jam_tutup'],
			];
			$sql = $data->poliJadwal()->where('hari', 'rabu');
			if ($sql->exists()) {
				$sql->update($param);
			} else {
				$sql->create($param);
			}
		}

		if ($request->has('kamis_jam_buka') && $request->has('kamis_jam_tutup')) {
			$param = [
				'hari' => 'kamis',
				'jam_kerja_buka'  => $validated['kamis_jam_buka'],
				'jam_kerja_tutup' => $validated['kamis_jam_tutup'],
			];
			$sql = $data->poliJadwal()->where('hari', 'kamis');
			if ($sql->exists()) {
				$sql->update($param);
			} else {
				$sql->create($param);
			}
		}

		if ($request->has('jumat_jam_buka') && $request->has('jumat_jam_tutup')) {
			$param = [
				'hari' => 'jumat',
				'jam_kerja_buka'  => $validated['jumat_jam_buka'],
				'jam_kerja_tutup' => $validated['jumat_jam_tutup'],
			];
			$sql = $data->poliJadwal()->where('hari', 'jumat');
			if ($sql->exists()) {
				$sql->update($param);
			} else {
				$sql->create($param);
			}
		}

		if ($request->has('sabtu_jam_buka') && $request->has('sabtu_jam_tutup')) {
			$param = [
				'hari' => 'sabtu',
				'jam_kerja_buka'  => $validated['sabtu_jam_buka'],
				'jam_kerja_tutup' => $validated['sabtu_jam_tutup'],
			];
			$sql = $data->poliJadwal()->where('hari', 'sabtu');
			if ($sql->exists()) {
				$sql->update($param);
			} else {
				$sql->create($param);
			}
		}

		if ($request->has('minggu_jam_buka') && $request->has('minggu_jam_tutup')) {
			$param = [
				'hari' => 'minggu',
				'jam_kerja_buka'  => $validated['minggu_jam_buka'],
				'jam_kerja_tutup' => $validated['minggu_jam_tutup'],
			];
			$sql = $data->poliJadwal()->where('hari', 'minggu');
			if ($sql->exists()) {
				$sql->update($param);
			} else {
				$sql->create($param);
			}
		}

		alert('Sukses', 'Data berhasil diubah', 'success');
		return redirect()->back();
	}
}

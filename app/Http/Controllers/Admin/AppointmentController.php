<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AppointmentDataTable;
use App\Http\Controllers\Controller;
use App\Models\UserBooking;
use App\Services\Midtrans\GetTransactionStatus;
use Illuminate\Http\Request;
use Midtrans\Transaction;

class AppointmentController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(AppointmentDataTable $dataTable)
	{
		return $dataTable->render('pages.admin.pendaftaran-online.index');
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
		$data = UserBooking::where('kode_antrian', $id)->firstOrFail();

		if ($data->payment_status) {
			$status = new GetTransactionStatus($data->kode_antrian);
			$status = (object) $status->getStatus();
			$data->metode_pembayaran = $status->issuer;
		}

		return view('pages.admin.pendaftaran-online.show', compact('data'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$data = UserBooking::where('id', $id)->firstOrFail();

		$page = [
			'title' => 'Ubah',
			'currentRoute' => route('admin.pendaftaran-online.edit', $id),
			'formMethod' => 'PATCH',
			'formRoute' => route('admin.pendaftaran-online.update', $id)
		];
		return view('pages.admin.pendaftaran-online.edit', compact('data', 'page'));
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
		$data = UserBooking::where('id', $id)->firstOrFail();

		$request->validate([
			'tgl_periksa' => 'required|date|after_or_equal:' . date('Y-m-d')
		]);

		$data->tgl_periksa = $request->tgl_periksa;
		$data->save();

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

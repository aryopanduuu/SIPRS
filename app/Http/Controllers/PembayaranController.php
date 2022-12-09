<?php

namespace App\Http\Controllers;

use App\Models\UserBooking;
use App\Services\Midtrans\CreateSnapTokenService;
use App\Services\Midtrans\GetTransactionStatus;
use Illuminate\Http\Request;
use Sawirricardo\Midtrans\Dto\TransactionDto;
use Sawirricardo\Midtrans\Laravel\Facades\Midtrans;

class PembayaranController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index($kode)
	{
		$data = UserBooking::where('kode_antrian', $kode)->firstOrFail();
		if (!$data->snap_token) {
			$this->update($data);
		} else {
			$status = new GetTransactionStatus($data->kode_antrian);
			$status = (object) $status->getStatus();

			if (!in_array($status->fraud_status, ['accept', 'pending'])) {
				$this->update($data);
			}
		}
		return view('pages.pembayaran', compact('data'));
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update($data)
	{
		$midtrans = new CreateSnapTokenService($data);
		$snapToken = $midtrans->getSnapToken();

		$data->snap_token = $snapToken;
		return $data->save();
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

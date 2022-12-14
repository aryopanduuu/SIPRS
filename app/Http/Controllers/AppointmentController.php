<?php

namespace App\Http\Controllers;

use App\Models\UserBooking;
use App\Services\Midtrans\CreateSnapTokenService;
use App\Services\Midtrans\GetTransactionStatus;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Milon\Barcode\Facades\DNS2DFacade;
use Intervention\Image\ImageManagerStatic as Image;
use Midtrans\Notification;

class AppointmentController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('pages.pendaftaran-online.index');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function pasienLama()
	{
		return view('pages.pendaftaran-online.appointment');
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
		$notif = new Notification();
		$data = UserBooking::where('id', $notif->order_id)->first();
		$fraud = $notif->fraud_status;

		if ($data && $fraud == 'accept') {
			$data->payment_status = 1;
			$data->save();
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($kode)
	{
		$data = UserBooking::where('kode_antrian', $kode)->firstOrFail();

		// if (!$data->payment_status) {
		// 	$status = new GetTransactionStatus($data->kode_antrian);
		// 	$status = (object) $status->getStatus();

		// 	if (isset($status->fraud_status) && $status->fraud_status == 'accept') {
		// 		$data->update(['payment_status' => 1]);
		// 	}
		// }
		return view('pages.pendaftaran-online.show', compact('data'));
	}

	public function print($kode)
	{
		$data = UserBooking::where('kode_antrian', $kode)->firstOrFail();
		$needTemplate = true;
		return view('pages.pendaftaran-online.export', compact('data', 'needTemplate'));
	}

	public function pdf($kode)
	{
		$data = UserBooking::where('kode_antrian', $kode)->firstOrFail();
		$needTemplate = true;
		$pdf = Pdf::loadView('pages.pendaftaran-online.export', ['data' => $data, 'needTemplate' => $needTemplate]);
		return $pdf->download('Tiket Antrian-' . $data->kode_antrian . '.pdf');
	}

	public function qrcode($kode)
	{
		$data = UserBooking::where('kode_antrian', $kode)->firstOrFail();
		$qr = Image::canvas(300, 320, "#fff")
			->insert(DNS2DFacade::getBarcodePNG(route('appointment.show', $kode), 'QRCODE', 9, 9), 'center')
			->response('png', 100);
		return $qr;
	}

	public function whatsapp($kode)
	{
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
	public function update(Request $request, $id)
	{
		//
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

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CetakUlangRequest;
use App\Models\UserBooking;
use Illuminate\Http\Request;

class CetakUlangController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('pages.cetak-ulang');
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
	public function show(CetakUlangRequest $request)
	{
		$validated = $request->validated();
		$data = UserBooking::join('users', 'user_bookings.user_id', '=', 'users.id')
			->join('user_pasiens', 'user_pasiens.user_id', '=', 'users.id')
			->where(function ($query) use ($validated) {
				$query
					->where('user_bookings.kode_antrian', $validated['kode_antrian'])
					->orWhere('user_pasiens.nomor_rekam_medis', $validated['kode_antrian']);
			})
			->where('user_bookings.tgl_periksa', $validated['tgl_periksa'])
			->select('user_bookings.*')
			->first();

		if (!$data) {
			return redirect()->back()->withErrors(['kode_antrian' => 'Kode antrian tidak ditemukan'])->withInput();
		}
		return redirect(route('appointment.show', $data->kode_antrian));
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

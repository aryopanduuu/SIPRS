<?php

namespace App\Http\Requests;

use Dive\DryRequests\DryRunnable;
use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		if (request()->step == 1) {
			$rules = [
				'nomor_rekam_medis' => ['required'],
				'tgl_lahir' => ['required', 'date'],
				// 'recaptcha' => 'recaptcha'
			];
		} else if (request()->step == 2) {
			$rules = [
				'poli' => ['required', 'exists:polis,id'],
				'tgl_periksa' => ['required', 'date', 'after_or_equal:' . date('Y-m-d')]
			];
		} else if (request()->step == 3) {
			$rules = [
				'dokter' => ['required', 'exists:user_dokters,user_id']
			];
		}

		return $rules;
	}

	/**
	 * Get custom attributes for validator errors.
	 *
	 * @return array
	 */
	public function attributes()
	{
		return [
			'tgl_lahir' => 'Tanggal lahir',
			'tgl_periksa' => 'Tanggal periksa'
		];
	}
}

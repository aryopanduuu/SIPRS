<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class NomorRekamMedisRequest extends FormRequest
{

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		return [
			'nomor_rekam_medis' => ['required'],
			'tgl_lahir' => ['required', 'date'],
			'recaptcha' => 'recaptcha'
		];
	}

	/**
	 * Get custom attributes for validator errors.
	 *
	 * @return array
	 */
	public function attributes()
	{
		return [
			'tgl_lahir' => 'Tanggal lahir'
		];
	}
}

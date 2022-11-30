<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TglPemeriksaanRequest extends FormRequest
{

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		return [
			'poli' => ['required', 'exists:polis,id'],
			'tgl_periksa' => ['required', 'date', 'after_or_equal:' . date('Y-m-d')]
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
			'tgl_periksa' => 'Tanggal periksa'
		];
	}
}

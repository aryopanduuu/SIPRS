<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CetakUlangRequest extends FormRequest
{

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		return [
			'kode_antrian' => 'required|numeric|digits:12',
			'tgl_periksa' => 'required|date'
		];
	}
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FormDokterSpesialisRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	// public function authorize()
	// {
	//     return false;
	// }

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		return [
			'gelar' => [
				'required', 'exists:spesialis,id',
				Rule::unique('user_dokter_spesialis', 'spesialis_id')
					->where(fn ($query) => $query->where('user_id', request()->id))
			]
		];
	}
}

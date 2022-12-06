<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormKontakRequest extends FormRequest
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
			'email' => 'sometimes|email',
			'alamat' => 'sometimes',
			'nomor_telepon' => 'sometimes|regex:/^08[1-9][0-9]{6,9}$/',
			'longitude' => ['required_with:latitude', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
			'latitude' => ['required_with:longitude', 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/']
		];
	}
}

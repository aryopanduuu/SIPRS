<?php

namespace App\Http\Requests\Admin;

use Dive\DryRequests\DryRunnable;
use Illuminate\Foundation\Http\FormRequest;

class FormPoliRequest extends FormRequest
{
	use DryRunnable;
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
			'nama_poli' => 'required'
		];
	}
}

<?php

namespace App\Http\Requests;

use Dive\DryRequests\DryRunnable;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FormDokterRequest extends FormRequest
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
		if (request()->routeIs('admin.dokter.store')) {
			$rule = [
				'nip' => 'required|numeric|digits:18|unique:user_dokters,nip',
				'nik' => ['required', 'regex:/^(1[1-9]|21|[37][1-6]|5[1-3]|6[1-5]|[89][12])\d{2}\d{2}([04][1-9]|[1256][0-9]|[37][01])(0[1-9]|1[0-2])\d{2}\d{4}$/', 'unique:users,nik'],
			];
		} else if (request()->routeIs('admin.dokter.update')) {
			$rule = [
				'nip' => ['required', 'numeric', 'digits:18', Rule::unique('user_dokters', 'nip')->ignore($this->nip, 'nip')],
				'nik' => ['required', 'regex:/^(1[1-9]|21|[37][1-6]|5[1-3]|6[1-5]|[89][12])\d{2}\d{2}([04][1-9]|[1256][0-9]|[37][01])(0[1-9]|1[0-2])\d{2}\d{4}$/', Rule::unique('users', 'nik')->ignore($this->nik, 'nik')],
			];
		}
		return $rule + [
			'nama' => ['required', "regex:/^[\p{L} ,.'-]+$/iu"],
			'jenis_kelamin' => 'required|in:laki-laki,perempuan',
			'tanggal_lahir' => 'required|date|before:' . date('d-m-Y'),
			'alamat' => 'required',
			'email' => 'nullable|email',
			'no_hp' => ['required', 'regex:/^08[1-9][0-9]{6,9}$/'],
			'foto' => 'nullable|file|mimes:jpeg,jpg,png|max:2048'
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
			'nip' => 'NIP',
			'nik' => 'NIK',
			'no_hp' => 'No HP',
		];
	}
}

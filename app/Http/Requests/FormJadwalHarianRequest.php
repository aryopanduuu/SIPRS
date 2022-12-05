<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormJadwalHarianRequest extends FormRequest
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
			'senin_jam_buka' => 'nullable|required_with:senin_jam_tutup|date_format:H:i',
			'senin_jam_tutup' => 'nullable|required_with:senin_jam_buka|date_format:H:i|after:senin_jam_kerja_buka',

			'selasa_jam_buka' => 'nullable|required_with:selasa_jam_tutup|date_format:H:i',
			'selasa_jam_tutup' => 'nullable|required_with:selasa_jam_buka|date_format:H:i|after:selasa_jam_buka',

			'rabu_jam_buka' => 'nullable|required_with:rabu_jam_tutup|date_format:H:i',
			'rabu_jam_tutup' => 'nullable|required_with:rabu_jam_buka|date_format:H:i|after:rabu_jam_buka',

			'kamis_jam_buka' => 'nullable|required_with:kamis_jam_tutup|date_format:H:i',
			'kamis_jam_tutup' => 'nullable|required_with:kamis_jam_buka|date_format:H:i|after:kamis_jam_buka',

			'jumat_jam_buka' => 'nullable|required_with:jumat_jam_tutup|date_format:H:i',
			'jumat_jam_tutup' => 'nullable|required_with:jumat_jam_buka|date_format:H:i|after:jumat_jam_buka',

			'sabtu_jam_buka' => 'nullable|required_with:sabtu_jam_tutup|date_format:H:i',
			'sabtu_jam_tutup' => 'nullable|required_with:sabtu_jam_buka|date_format:H:i|after:sabtu_jam_buka',

			'minggu_jam_buka' => 'nullable|required_with:minggu_jam_tutup|date_format:H:i',
			'minggu_jam_tutup' => 'nullable|required_with:minggu_jam_buka|date_format:H:i|after:minggu_jam_buka',
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
			'senin_jam_buka' => 'Jam buka',
			'senin_jam_tutup' => 'Jam tutup',
			'selasa_jam_buka' => 'Jam buka',
			'selasa_jam_tutup' => 'Jam tutup',
			'rabu_jam_buka' => 'Jam buka',
			'rabu_jam_tutup' => 'Jam tutup',
			'kamis_jam_buka' => 'Jam buka',
			'kamis_jam_tutup' => 'Jam tutup',
			'jumat_jam_buka' => 'Jam buka',
			'jumat_jam_tutup' => 'Jam tutup',
			'sabtu_jam_buka' => 'Jam buka',
			'sabtu_jam_tutup' => 'Jam tutup',
			'minggu_jam_buka' => 'Jam buka',
			'minggu_jam_tutup' => 'Jam tutup',
		];
	}
	/**
	 * Get the error messages for the defined validation rules.
	 *
	 * @return array
	 */
	public function messages()
	{
		return [
			'after' => ':Attribute harus berisi waktu setelah :date.',
		];
	}
}

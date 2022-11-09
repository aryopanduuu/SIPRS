<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Spesialis>
 */
class SpesialisFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		$gelar = [
			['Anak', 'Sp.A'],
			['Andrologi', 'Sp.And'],
			['Anestesiologi dan Terapi Intensif', 'Sp.An'],
			['Akupunktur Medik', 'Sp.Ak'],
			['Bedah', 'Sp.B'],
			['Bedah Anak', 'Sp.BA'],
			['Bedah Plastik, Rekonstruksi, dan Estetik', 'Sp.BP-RE'],
			['Bedah Saraf', 'Sp.BS'],
			['Bedah Toraks, Kardiak, dan Vaskular', 'Sp.BTKV'],
			['Dermatologi dan Venereologi', 'Sp.DV'],
			['Emergency Medicine (Kegawatdaruratan Medik)', 'Sp.EM'],
			['Farmakologi Klinik', 'Sp.FK'],
			['Forensik dan Medikolegal', 'Sp.FM'],
			['Gizi Klinik', 'Sp.GK'],
			['Jantung dan Pembuluh Darah', 'Sp.JP'],
			['Kedokteran Fisik dan Rehabilitasi', 'Sp.KFR'],
			['Kedokteran Jiwa', 'Sp.KJ'],
			['Kedokteran Kelautan', 'Sp.KL'],
			['Kedokteran Keluarga Layanan Primer', 'Sp.KKLP'],
			['Kedokteran Nuklir dan Teranostik Molekuler', 'Sp.KN'],
			['Kedokteran Okupasi', 'Sp.Ok'],
			['Kedokteran Olahraga', 'Sp.KO'],
			['Kedokteran Penerbangan', 'Sp.KP'],
			['Mikrobiologi Klinik', 'Sp.MK'],
			['Neurologi', 'Sp.N'],
			['Obstetri dan Ginekologi', 'Sp.OG'],
			['Oftalmologi', 'Sp.M'],
			['Onkologi Radiasi', 'Sp.Onk.Rad'],
			['Orthopaedi dan Traumatologi', 'Sp.OT'],
			['Parasitologi Klinik', 'Sp.ParK'],
			['Patologi Anatomi', 'Sp.PA'],
			['Patologi Klinik', 'Sp.PK'],
			['Penyakit Dalam', 'Sp.PD'],
			['Pulmonologi dan Kedokteran Respirasi', 'Sp.P'],
			['Radiologi', 'Sp.Rad'],
			['Telinga Hidung Tenggorok Bedah Kepala Leher', 'Sp.THT-KL'],
			['Urologi', 'Sp.U'],
			['Bedah Mulut dan Maksilofasial (Dokter Gigi)', 'Sp.BMMF'],
			['Kedokteran Gigi Anak (Dokter Gigi)', 'Sp.KGA'],
			['Konservasi Gigi (Dokter Gigi)', 'Sp.KG'],
			['Ortodonsia (Dokter Gigi)', 'Sp.Ort'],
			['Odontologi Forensik (Dokter Gigi)', 'Sp.OF'],
			['Penyakit Mulut (Dokter Gigi)', 'Sp.PM'],
			['Periodonsia (Dokter Gigi)', 'Sp.Perio'],
			['Prostodonsia (Dokter Gigi)', 'Sp.Pros'],
			['Radiologi Kedokteran Gigi (Dokter Gigi)', 'Sp.RKG,'],
		];
		$rand = fake()->unique()->randomElement($gelar);
		return [
			'gelar'           => $rand[0],
			'gelar_singkatan' => $rand[1],
		];
	}
}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tiket &mdash; Antrian #{{ $data->kode_antrian }}</title>
</head>

<body>

    <table border="0">
        <thead>
            <tr>
                <th colspan="3">Tiket &mdash; Kode Antrian #{{ $data->kode_antrian }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th align="left">Nomor Antrian</th>
                <th align="right">:</th>
                <td>{{ $data->nomor_antrian }}</td>
            </tr>
            <tr>
                <th align="left">Nomor Rekam Medis</th>
                <th align="right">:</th>
                <td>{{ $data->userPasien->pasien->nomor_rekam_medis }}</td>
            </tr>
            <tr>
                <th align="left">Nama Pasien</th>
                <th align="right">:</th>
                <td>{{ $data->userPasien->nama }}</td>
            </tr>
            <tr>
                <th align="left">Poli</th>
                <th align="right">:</th>
                <td>{{ $data->poli->nama_poli }}</td>
            </tr>
            <tr>
                <th align="left">Dokter</th>
                <th align="right">:</th>
                <td>{{ $data->userDokter->nama }}</td>
            </tr>
            <tr>
                <th align="left">Tanggal Periksa</th>
                <th align="right">:</th>
                <td>{{ $data->tgl_periksa }}</td>
            </tr>
            <tr>
                <th align="left">Perkiraan Jam Periksa</th>
                <th align="right">:</th>
                <td>{{ $data->perkiraan_jam }}</td>
            </tr>
        </tbody>
    </table>
    <img style="margin-top: 1.5rem;"
        src="data:image/png;base64,{!! DNS2D::getBarcodePNG(route('appointment.show', $data->kode_antrian), 'QRCODE') !!}" />
</body>

</html>

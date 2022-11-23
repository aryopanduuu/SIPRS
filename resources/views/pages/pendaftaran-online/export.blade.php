<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>RS - Lorem Ipsum</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <!--[if lt IE 9]>
  <script src="assets/js/html5shiv.min.js"></script>
  <script src="assets/js/respond.min.js"></script>
  <![endif]-->
</head>

<body>
    <div class="row">
        <div class="col-12">
            <table class="table table-borderless">
                <thead class="border-top border-bottom">
                    <tr align="center" class="text-center">
                        <th colspan="3">Tiket &mdash; Kode Antrian #{{ $data->kode_antrian }}</th>
                    </tr>
                </thead>
                <tbody class="border-bottom">
                    <tr>
                        <th>Nomor Antrian</th>
                        <th class="text-right">:</th>
                        <td>{{ $data->nomor_antrian }}</td>
                    </tr>
                    <tr>
                        <th>Nomor Rekam Medis</th>
                        <th class="text-right">:</th>
                        <td>{{ $data->userPasien->pasien->nomor_rekam_medis }}</td>
                    </tr>
                    <tr>
                        <th>Nama Pasien</th>
                        <th class="text-right">:</th>
                        <td>{{ $data->userPasien->nama }}</td>
                    </tr>
                    <tr>
                        <th>Poli</th>
                        <th class="text-right">:</th>
                        <td>{{ $data->poli->nama_poli }}</td>
                    </tr>
                    <tr>
                        <th>Dokter</th>
                        <th class="text-right">:</th>
                        <td>{{ $data->userDokter->nama }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Periksa</th>
                        <th class="text-right">:</th>
                        <td>{{ $data->tgl_periksa }}</td>
                    </tr>
                    <tr>
                        <th>Perkiraan Jam Periksa</th>
                        <th class="text-right">:</th>
                        <td>{{ $data->perkiraan_jam }}</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr align="center">
                        <td colspan="3" class="text-center">
                            <img
                                src="data:image/png;base64,{!! DNS2D::getBarcodePNG(route('appointment.show', $data->kode_antrian), 'QRCODE') !!}" />
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <script>
        window.onafterprint = window.close;
        window.print();

    </script>
</body>

</html>

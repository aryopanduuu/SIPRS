@extends('layouts.app')

@section('content')
<section class="section account-content">
    <div class="row justify-content-md-center">
        <div class="col-md-8 col-12">
            <div class="row">
                <div class="col-12 d-flex justify-content-between align-items-end">
                    <a href="{{ route('appointment.index') }}">
                        <span class="font-weight-bold"><i class="fa fa-arrow-left"></i> Kembali</span>
                    </a>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <i class="fa-duotone fa-share-all"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item"
                                {{-- href="data:image/png;base64,{{ DNS2D::getBarcodePNG(route('appointment.show', $data->kode_antrian), 'QRCODE') }}"
                                --}} href="{{ route('appointment.qrcode', $data->kode_antrian) }}"
                                download="Tiket Antrian-{{ $data->kode_antrian }}.png">
                                <i class="fa-duotone fa-file-download"></i> Unduh QR Code
                            </a>
                            <button class="dropdown-item"
                                onclick="window.open(`{{ route('appointment.print', $data->kode_antrian) }}`)">
                                <i class="fa-duotone fa-print"></i> Print
                            </button>
                            {!! Form::open(['route' => ['appointment.pdf', $data->kode_antrian]]) !!}
                            <button class="dropdown-item">
                                <i class="fa-duotone fa-file-pdf"></i> PDF
                            </button>
                            {!! Form::close() !!}
                            <a class="dropdown-item" href="{{ route('appointment.whatsapp', $data->kode_antrian) }}">
                                <i class="fa-brands fa-whatsapp"></i> Whatsapp
                            </a>
                            <button class="dropdown-item" id="showEmailForm">
                                <i class="fa-duotone fa-envelope"></i> Email
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-3 mb-3 mb-lg-0">
                    <div class="account-box w-100">
                        <table class="table table-borderless">
                            <thead>
                                <tr align="center">
                                    <th colspan="3">Tiket &mdash; Kode Antrian #{{ $data->kode_antrian }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Nomor Antrian</th>
                                    <th>:</th>
                                    <td>{{ $data->nomor_antrian }}</td>
                                </tr>
                                <tr>
                                    <th>Nomor Rekam Medis</th>
                                    <th>:</th>
                                    <td>{{ $data->userPasien->pasien->nomor_rekam_medis }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Pasien</th>
                                    <th>:</th>
                                    <td>{{ $data->userPasien->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Poli</th>
                                    <th>:</th>
                                    <td>{{ $data->poli->nama_poli }}</td>
                                </tr>
                                <tr>
                                    <th>Dokter</th>
                                    <th>:</th>
                                    <td>{{ $data->userDokter->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Periksa</th>
                                    <th>:</th>
                                    <td>{{ $data->tgl_periksa }}</td>
                                </tr>
                                <tr>
                                    <th>Perkiraan Jam Periksa</th>
                                    <th>:</th>
                                    <td>{{ $data->perkiraan_jam }}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr align="center">
                                    <td colspan="3" class="pb-0">
                                        {!! DNS2D::getBarcodeHTML(route('appointment.show', $data->kode_antrian),
                                        'QRCODE', 4, 4) !!}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection

@push('custom-js')
<script src="{{ asset('assets/js/axios.min.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
<script>
    $('#showEmailForm').on('click', function () {
        Swal.fire({
                title: 'Masukkan Email Anda',
                input: 'text',
                showCancelButton: true,
                confirmButtonText: 'Kirim',
                reverseButtons: true,
                showLoaderOnConfirm: true,
                preConfirm: (email) => {
                    return axios({
                            method: 'POST',
                            url: `{{ route('appointment.sendEmailTicket') }}`,
                            data: {
                                kode_antrian: `{{ $data->kode_antrian }}`,
                                email: email
                            },
                            headers: {
                                'X-Dry-Run': true,
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        })
                        .then((res) => {
                            console.log(res.data);
                            return res.data
                        })
                        .catch((err) => {
                            let error = ''
                            if (err.response.data.errors.email) {
                                error = err.response.data.errors.email[0]
                            } else {
                                error = 'Terjadi kesalahan ketika memproses data'
                            }
                            Swal.showValidationMessage(
                                `Gagal : ${error}`
                            )
                        })
                },
                allowOutsideClick: () => !Swal.isLoading()
            })
            .then((res) => {
                if (res.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses!',
                        text: 'Tiket antrian berhasil dikirim ke alamat email'
                    })
                }
            })
    })

</script>
@endpush

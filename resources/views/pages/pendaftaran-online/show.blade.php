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
						<div class="d-inline-block">
							@if (!$data->payment_status)
								<button class="btn btn-primary" id="pay-button">
									<i class="far fa-money-bill-transfer"></i> Bayar
								</button>
							@endif
							<div class="btn-group" role="group">
								<button class="btn btn-info dropdown-toggle" data-toggle="dropdown" type="button">
									<i class="fa-duotone fa-share-all"></i>
								</button>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="{{ route('appointment.qrcode', $data->kode_antrian) }}"
										download="Tiket Antrian-{{ $data->kode_antrian }}.png">
										<i class="fa-duotone fa-file-download"></i> Unduh QR Code
									</a>
									<button class="dropdown-item" onclick="window.open(`{{ route('appointment.print', $data->kode_antrian) }}`)">
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
									<tr>
										<th>Status Pembayaran</th>
										<th>:</th>
										<td>
											{!! $data->payment_status
											    ? '<span class="text-success">Sudah Dibayar</span>'
											    : '<span class="text-danger">Belum Dibayar</span>' !!}
										</td>
									</tr>
								</tbody>
								<tfoot>
									<tr align="center">
										<td class="pb-0" colspan="3">
											{!! DNS2D::getBarcodeHTML(route('appointment.show', $data->kode_antrian), 'QRCODE', 4, 4) !!}
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
		$('#showEmailForm').on('click', function() {
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
								url: `{{ route('api.appointment.sendEmailTicket') }}`,
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
	@if (!$data->payment_status)
		<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
		</script>
		<script>
			const payButton = document.querySelector('#pay-button');
			payButton.addEventListener('click', function(e) {
				e.preventDefault();

				snap.pay('{{ $data->snap_token }}', {
					// Optional
					onSuccess: function(result) {
						/* You may add your own js here, this is just example */
						// document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
						window.location.reload()
					},
					// Optional
					onPending: function(result) {
						/* You may add your own js here, this is just example */
						// document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
						console.log(result)
					},
					// Optional
					onError: function(result) {
						/* You may add your own js here, this is just example */
						// document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
						console.log(result)
					}
				});
			});
		</script>
	@endif
@endpush

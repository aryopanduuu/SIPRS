@extends('layouts.app-admin')

@section('page-title', 'Pendaftaran Online')

@section('breadcrumb')
	<div class="section-header-breadcrumb">
		<div class="breadcrumb-item active">
			<a href="{{ route('admin.poli.index') }}">Pendaftaran Online</a>
		</div>
	</div>
@endsection

@section('content')
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<a class="btn btn-primary note-btn mr-3" href="{{ route('admin.pendaftaran-online.index') }}">
						<i class="far fa-arrow-left"></i>
					</a>
					<h4>Tiket #{{ $data->kode_antrian }}</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">Detil Pasien</div>
							<div class="table-responsive">
								<table class="table table-striped table-hover table-md">
									<tbody>
										<tr>
											<th data-width="200">Nama</th>
											<td class="text-left">{{ $data->userPasien->nama }}</td>
										</tr>
										<tr>
											<th>Tanggal Lahir</th>
											<td class="text-left">{{ $data->userPasien->tgl_lahir }}</td>
										</tr>
										<tr>
											<th>Jenis Kelamin</th>
											<td class="text-left">{{ $data->userPasien->jk }}</td>
										</tr>
										<tr>
											<th>Alamat</th>
											<td class="text-left">{{ $data->userPasien->alamat }}</td>
										</tr>
										<tr>
											<th>Nomor HP</th>
											<td class="text-left">{{ $data->userPasien->no_hp }}</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-md-12">
							<div class="section-title">Detil Booking</div>
							<div class="table-responsive">
								<table class="table table-striped table-hover table-md">
									<tbody>
										<tr>
											<th data-width="200">Nomor Antrian</th>
											<td class="text-left">{{ $data->nomor_antrian }}</td>
										</tr>
										<tr>
											<th data-width="200">Poli</th>
											<td class="text-left">{{ $data->poli->nama_poli }}</td>
										</tr>
										<tr>
											<th>Tanggal Periksa</th>
											<td class="text-left">{{ $data->tgl_periksa }}</td>
										</tr>
										<tr>
											<th>Jam Perkiraan</th>
											<td class="text-left">{{ $data->perkiraan_jam }}</td>
										</tr>
										<tr>
											<th>Dokter</th>
											<td class="text-left">{{ $data->userDokter->nama }}</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-md-12">
							<div class="section-title">Pembayaran</div>
							<div class="table-responsive">
								<table class="table table-striped table-hover table-md">
									<tbody>
										<tr>
											<th data-width="200">Status Pembayaran</th>
											<td class="text-left">
												{!! $data->payment_status
												    ? '<i class="far fa-check text-success"></i>'
												    : '<i class="far fa-xmark text-danger"></i>' !!}
											</td>
										</tr>
										@if ($data->payment_status)
											<tr>
												<th>Metode Pembayaran</th>
												<td class="text-left">{{ $data->metode_pembayaran }}</td>
											</tr>
										@endif
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('custom-css')
@endpush

@push('custom-js')
@endpush

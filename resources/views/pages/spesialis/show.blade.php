@extends('layouts.app')
@section('content')
	<div class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="page-title">
						<span> {{ $data->gelar }} ({{ $data->gelar_singkatan }})</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="content">
		<div class="container">
			<div class="row doctors-list">
				<div class="col-12">
					<a class="btn btn-primary radius-0" href="{{ route('spesialis.index') }}">
						<i class="far fa-arrow-left"></i> Kembali
					</a>
				</div>
				@forelse ($data->user as $item)
					<div class="col-12 col-md-4 col-lg-3 col-xl-3 py-3">
						<div class="doctor-list">
							<div class="doctor-inner">
								<img class="img-fluid" src="{{ asset('storage/foto-dokter/' . $item->userDetail->dokter->foto) }}" alt=""
									style="object-fit: cover!important;height: 200px !important; width: 100%;">
								<div class="doctor-details">
									<div class="doctor-info">
										<h4 class="doctor-name">
											<a href="{{ route('dokter.show', $item->user_id) }}">{{ $item->userDetail->nama }}</a>
										</h4>
										<p>
											<span class="depart" data-toggle="tooltip" title="{{ $item->userDetail->poli->poliDetail->nama_poli }}">
												{{ Str::limit($item->userDetail->poli->poliDetail->nama_poli, 20, '...') }}
											</span>
										</p>
									</div>
									<div class="view-profie">
										<a href="{{ route('dokter.show', $item->user_id) }}">Lihat Profile</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				@empty
					<div class="col-12 mt-5">
						<h6>Tidak ada untuk ditampilkan</h6>
					</div>
				@endforelse
			</div>
		</div>
	</div>
@endsection

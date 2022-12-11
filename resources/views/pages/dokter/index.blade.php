@extends('layouts.app')

@section('content')
	<div class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="page-title">
						<span>Dokter</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="content">
		<div class="container">
			<div class="row doctors-list">
				<div class="col-12 row justify-content-end px-0">
					<div class="col-12 col-sm-2 px-0 appointment">
						{!! Form::select('filter_poli', $poli, null, [
						    'placeholder' => 'Cari Poli',
						    'class' => 'select2 form-control',
						]) !!}
					</div>
					<div class="col-12 col-sm-2 px-0 appointment ml-1">
						{!! Form::select('filter_poli', $spesialis, null, [
						    'placeholder' => 'Cari Spesialis',
						    'class' => 'select2 form-control',
						]) !!}
					</div>
					<div class="col-12 col-sm-2 px-0 account-box ml-1"
						style="background-color: unset;border: unset;margin: unset;padding: unset;width: auto;">
						{!! Form::text('dokter', null, ['class' => 'form-control']) !!}
					</div>
				</div>
				@foreach ($data as $item)
					<div class="col-12 col-md-4 col-lg-3 col-xl-3 py-3">
						<div class="doctor-list">
							<div class="doctor-inner">
								<img class="img-fluid" src="{{ asset('storage/foto-dokter/' . $item->foto) }}" alt=""
									style="object-fit: cover!important;height: 200px !important; width: 100%;">
								<div class="doctor-details">
									<div class="doctor-info">
										<h4 class="doctor-name">
											<a href="{{ route('dokter.show', $item->id) }}">{{ $item->nama }}</a>
										</h4>
										<p>
											<span class="depart" data-toggle="tooltip"
												title="{{ $item->poli }}">{{ Str::limit($item->poli, 20, '...') }}</span>
										</p>
									</div>
									<div class="view-profie">
										<a href="{{ route('dokter.show', $item->id) }}">Lihat Profile</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
				<div class="mx-auto">
					{{ $data->links('pagination::bootstrap-4') }}
				</div>
			</div>
		</div>
	</div>
@endsection

@push('custom-css')
	<link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/fontawesome/css/fontawesome.min.css') }}" rel="stylesheet">
@endpush

@push('custom-js')
	<script src="{{ asset('assets/js/select2.min.js') }}"></script>
	<script>
		$('[data-toggle="tooltip"]').tooltip()
		$('.select2').select2()
	</script>
@endpush

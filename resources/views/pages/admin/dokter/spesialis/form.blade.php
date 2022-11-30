@extends('layouts.app-admin')

@section('page-title', 'Spesialis Dokter')

@section('breadcrumb')
	<div class="section-header-breadcrumb">
		<div class="breadcrumb-item">
			<a href="{{ route('admin.dokter.index') }}">Dokter</a>
		</div>
		<div class="breadcrumb-item">
			<a href="{{ route('admin.dokter.spesialis.index', $data->id) }}">{{ $data->nama }}</a>
		</div>
		<div class="breadcrumb-item active">
			<a href="{{ $page['currentRoute'] }}">{{ $page['title'] }} Spesialis</a>
		</div>
	</div>
@endsection

@section('content')
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<a class="btn btn-primary note-btn mr-3" href="{{ route('admin.dokter.spesialis.index', $data->id) }}">
						<i class="far fa-arrow-left"></i>
					</a>
					<h4>{{ $page['title'] }} Spesialis &mdash; Dokter {{ $data->nama }}</h4>
				</div>
				<div class="card-body">
					{!! Form::open(['method' => $page['formMethod'], 'url' => $page['formRoute']]) !!}
					<div class="form-group row mb-4">
						{!! Form::label('gelar', 'Gelar', [
						    'class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3',
						]) !!}
						<div class="col-sm-12 col-md-7">
							{!! Form::select('gelar', $listGelar, old('gelar') ?? null, [
							    'placeholder' => 'Pilih',
							    'class' => 'form-control select2' . $errors->first('gelar', ' is-invalid'),
							    'required',
							]) !!}
							@error('gelar')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>
					</div>
					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
						<div class="col-sm-12 col-md-7">
							{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
						</div>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection

@push('custom-css')
	<link href="{{ asset('assets/admin/modules/select2/dist/css/select2.min.css') }}" rel="stylesheet">
@endpush

@push('custom-js')
	<script src="{{ asset('assets/admin/modules/select2/dist/js/select2.full.min.js') }}"></script>
	<script src="{{ asset('assets/js/cleave.min.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/addons/cleave-phone.id.js"></script>
	<script>
		new Cleave('#no_hp', {
			phone: true,
			phoneRegionCode: 'ID',
			delimiter: ''
		});
	</script>
@endpush

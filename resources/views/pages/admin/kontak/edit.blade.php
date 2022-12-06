@extends('layouts.app-admin')

@section('page-title', 'Kontak')

@section('breadcrumb')
	<div class="section-header-breadcrumb">
		<div class="breadcrumb-item">
			<a href="{{ route('admin.kontak.index') }}">Kontak</a>
		</div>
		<div class="breadcrumb-item active">
			<a href="{{ $page['currentRoute'] }}">{{ $page['title'] }}</a>
		</div>
	</div>
@endsection

@section('content')
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<a class="btn btn-primary note-btn mr-3" href="{{ route('admin.kontak.index') }}">
						<i class="far fa-arrow-left"></i>
					</a>
					<h4>{{ $page['title'] }} Kontak</h4>
				</div>
				<div class="card-body">
					{!! Form::open(['method' => $page['formMethod'], 'url' => $page['formRoute']]) !!}
					@if ($data->slug == 'email')
						<div class="form-group row mb-4">
							{!! Form::label('email', 'Email', ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
							<div class="col-sm-12 col-md-7">
								{!! Form::email('email', old('email') ?? ($data->konten ?? null), [
								    'class' => 'form-control' . $errors->first('email', ' is-invalid'),
								    'required',
								]) !!}
								@error('email')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>
					@elseif ($data->slug == 'alamat')
						<div class="form-group row mb-4">
							{!! Form::label('alamat', 'Alamat', ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
							<div class="col-sm-12 col-md-7">
								{!! Form::textarea('alamat', old('alamat') ?? ($data->konten ?? null), [
								    'class' => 'form-control' . $errors->first('alamat', ' is-invalid'),
								    'style' => 'height:auto !important;resize: none!important;',
								    'rows' => 3,
								    'required',
								]) !!}
								@error('alamat')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>
					@elseif ($data->slug == 'nomor_telepon')
						<div class="form-group row mb-4">
							{!! Form::label('nomor_telepon', 'Nomor Telepon', [
							    'class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3',
							]) !!}
							<div class="col-sm-12 col-md-7">
								{!! Form::text('nomor_telepon', old('nomor_telepon') ?? ($data->konten ?? null), [
								    'placeholder' => '0xxxxx',
								    'class' => 'form-control' . $errors->first('nomor_telepon', ' is-invalid'),
								    'required',
								]) !!}
								@error('nomor_telepon')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>
					@elseif ($data->slug == 'map')
						<div class="form-group row mb-4">
							{!! Form::label('longitude', 'Longitude', [
							    'class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3',
							]) !!}
							<div class="col-sm-12 col-md-7">
								{!! Form::text('longitude', old('longitude') ?? ($data->longitude ?? null), [
								    'class' => 'form-control' . $errors->first('longitude', ' is-invalid'),
								    'required',
								]) !!}
								@error('longitude')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>
						<div class="form-group row mb-4">
							{!! Form::label('latitude', 'Latitude', [
							    'class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3',
							]) !!}
							<div class="col-sm-12 col-md-7">
								{!! Form::text('latitude', old('latitude') ?? ($data->latitude ?? null), [
								    'class' => 'form-control' . $errors->first('latitude', ' is-invalid'),
								    'required',
								]) !!}
								@error('latitude')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>
					@endif
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

@push('custom-js')
	<script src="{{ asset('assets/js/cleave.min.js') }}"></script>
	<script src="{{ asset('assets/js/cleave-phone.id.js') }}"></script>
	<script>
		new Cleave('#nomor_telepon', {
			phone: true,
			phoneRegionCode: 'ID',
			delimiter: ''
		});
	</script>
@endpush

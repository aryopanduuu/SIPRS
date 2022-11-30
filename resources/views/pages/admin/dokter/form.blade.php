@extends('layouts.app-admin')

@section('page-title', 'Dokter')

@section('breadcrumb')
	<div class="section-header-breadcrumb">
		<div class="breadcrumb-item">
			<a href="{{ route('admin.dokter.index') }}">Dokter</a>
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
					<a class="btn btn-primary note-btn mr-3" href="{{ route('admin.dokter.index') }}">
						<i class="far fa-arrow-left"></i>
					</a>
					<h4>{{ $page['title'] }} Dokter</h4>
				</div>
				<div class="card-body">
					{!! Form::open(['method' => $page['formMethod'], 'url' => $page['formRoute']]) !!}
					<div class="form-group row mb-4">
						{!! Form::label('nip', 'NIP', [
						    'class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3',
						]) !!}
						<div class="col-sm-12 col-md-7">
							{!! Form::text('nip', old('nip') ?? ($data->nip ?? null), [
							    'class' => 'form-control' . $errors->first('nip', ' is-invalid'),
							    'required',
							]) !!}
							@error('nip')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>
					</div>
					<div class="form-group row mb-4">
						{!! Form::label('nik', 'NIK', [
						    'class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3',
						]) !!}
						<div class="col-sm-12 col-md-7">
							{!! Form::text('nik', old('nik') ?? ($data->nik ?? null), [
							    'class' => 'form-control' . $errors->first('nik', ' is-invalid'),
							    'pattern' =>
							        '^(1[1-9]|21|[37][1-6]|5[1-3]|6[1-5]|[89][12])\d{2}\d{2}([04][1-9]|[1256][0-9]|[37][01])(0[1-9]|1[0-2])\d{2}\d{4}$',
							    'required',
							]) !!}
							@error('nik')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>
					</div>
					<div class="form-group row mb-4">
						{!! Form::label('nama', 'Nama Dokter', [
						    'class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3',
						]) !!}
						<div class="col-sm-12 col-md-7">
							{!! Form::text('nama', old('nama') ?? ($data->nama ?? null), [
							    'class' => 'form-control' . $errors->first('nama', ' is-invalid'),
							    'required',
							]) !!}
							@error('nama')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>
					</div>
					<div class="form-group row mb-4">
						{!! Form::label('jenis_kelamin', 'Jenis Kelamin', [
						    'class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3',
						]) !!}
						<div class="col-sm-12 col-md-7">
							{!! Form::select(
							    'jenis_kelamin',
							    ['laki-laki' => 'Laki-laki', 'perempuan' => 'Perempuan'],
							    old('jenis_kelamin') ?? ($data->jkInput ?? null),
							    [
							        'placeholder' => 'Pilih',
							        'class' => 'form-control' . $errors->first('jenis_kelamin', ' is-invalid'),
							        'required',
							    ],
							) !!}
							@error('jenis_kelamin')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>
					</div>
					<div class="form-group row mb-4">
						{!! Form::label('tanggal_lahir', 'Tanggal Lahir', [
						    'class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3',
						]) !!}
						<div class="col-sm-12 col-md-7">
							{!! Form::date('tanggal_lahir', old('tanggal_lahir') ?? ($data->tgl_lahir ?? null), [
							    'class' => 'form-control' . $errors->first('tanggal_lahir', ' is-invalid'),
							    'required',
							]) !!}
							@error('tanggal_lahir')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>
					</div>
					<div class="form-group row mb-4">
						{!! Form::label('alamat', 'Alamat', [
						    'class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3',
						]) !!}
						<div class="col-sm-12 col-md-7">
							{!! Form::textarea('alamat', old('alamat') ?? ($data->alamat ?? null), [
							    'class' => 'form-control' . $errors->first('alamat', ' is-invalid'),
							    'required',
							]) !!}
							@error('alamat')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>
					</div>
					<div class="form-group row mb-4">
						{!! Form::label('email', 'Email', [
						    'class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3',
						]) !!}
						<div class="col-sm-12 col-md-7">
							{!! Form::email('email', old('email') ?? ($data->email ?? null), [
							    'class' => 'form-control' . $errors->first('email', ' is-invalid'),
							    'placeholder' => 'dokter@email.id',
							]) !!}
							@error('email')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>
					</div>
					<div class="form-group row mb-4">
						{!! Form::label('no_hp', 'No HP', [
						    'class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3',
						]) !!}
						<div class="col-sm-12 col-md-7">
							{!! Form::text('no_hp', old('no_hp') ?? ($data->no_hp ?? null), [
							    'class' => 'form-control' . $errors->first('no_hp', ' is-invalid'),
							    'placeholder' => '08xxxx',
							    'required',
							]) !!}
							@error('no_hp')
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

@push('custom-js')
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

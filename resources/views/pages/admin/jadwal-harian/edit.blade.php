@extends('layouts.app-admin')

@section('page-title', 'Ubah Jadwal Harian')

@section('breadcrumb')
	<div class="section-header-breadcrumb">
		<div class="breadcrumb-item">
			<a href="{{ route('admin.jadwal-harian.index') }}">Jadwal</a>
		</div>
		<div class="breadcrumb-item">
			<a href="{{ $page['currentRoute'] }}">{{ $data->nama_poli }}</a>
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
					<a class="btn btn-primary note-btn mr-3" href="{{ route('admin.jadwal-harian.index') }}">
						<i class="far fa-arrow-left"></i>
					</a>
					<h4>{{ $data->nama_poli }}</h4>
				</div>
				<div class="card-body">
					{!! Form::open(['method' => $page['formMethod'], 'url' => $page['formRoute']]) !!}
					<div class="form-group row mb-4">
						{!! Form::label('senin', 'Senin', [
						    'class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3',
						]) !!}
						<div class="col-sm-12 col-md-7">
							<div class="row">
								<div class="col-sm-6">
									{!! Form::time(
									    'senin_jam_buka',
									    old('senin_jam_buka') ??
									        ($data->poliJadwal()->where('hari', 'senin')->first()->jam_kerja_buka ??
									            null),
									    [
									        'class' => 'form-control' . $errors->first('senin_jam_buka', ' is-invalid'),
									    ],
									) !!}
									@error('senin_jam_buka')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
								<div class="col-sm-6">
									{!! Form::time(
									    'senin_jam_tutup',
									    old('senin_jam_tutup') ??
									        ($data->poliJadwal()->where('hari', 'senin')->first()->jam_kerja_tutup ??
									            null),
									    [
									        'class' => 'form-control' . $errors->first('senin_jam_tutup', ' is-invalid'),
									    ],
									) !!}
									@error('senin_jam_tutup')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row mb-4">
						{!! Form::label('selasa', 'Selasa', [
						    'class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3',
						]) !!}
						<div class="col-sm-12 col-md-7">
							<div class="row">
								<div class="col-sm-6">
									{!! Form::time(
									    'selasa_jam_buka',
									    old('selasa_jam_buka') ??
									        ($data->poliJadwal()->where('hari', 'selasa')->first()->jam_kerja_buka ??
									            null),
									    [
									        'class' => 'form-control' . $errors->first('selasa_jam_buka', ' is-invalid'),
									    ],
									) !!}
									@error('selasa_jam_buka')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
								<div class="col-sm-6">
									{!! Form::time(
									    'selasa_jam_tutup',
									    old('selasa_jam_tutup') ??
									        ($data->poliJadwal()->where('hari', 'selasa')->first()->jam_kerja_tutup ??
									            null),
									    [
									        'class' => 'form-control' . $errors->first('selasa_jam_tutup', ' is-invalid'),
									    ],
									) !!}
									@error('selasa_jam_tutup')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row mb-4">
						{!! Form::label('rabu', 'Rabu', [
						    'class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3',
						]) !!}
						<div class="col-sm-12 col-md-7">
							<div class="row">
								<div class="col-sm-6">
									{!! Form::time(
									    'rabu_jam_buka',
									    old('rabu_jam_buka') ??
									        ($data->poliJadwal()->where('hari', 'rabu')->first()->jam_kerja_buka ??
									            null),
									    [
									        'class' => 'form-control' . $errors->first('rabu_jam_buka', ' is-invalid'),
									    ],
									) !!}
									@error('rabu_jam_buka')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
								<div class="col-sm-6">
									{!! Form::time(
									    'rabu_jam_tutup',
									    old('rabu_jam_tutup') ??
									        ($data->poliJadwal()->where('hari', 'rabu')->first()->jam_kerja_tutup ??
									            null),
									    [
									        'class' => 'form-control' . $errors->first('rabu_jam_tutup', ' is-invalid'),
									    ],
									) !!}
									@error('rabu_jam_tutup')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row mb-4">
						{!! Form::label('kamis', 'Kamis', [
						    'class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3',
						]) !!}
						<div class="col-sm-12 col-md-7">
							<div class="row">
								<div class="col-sm-6">
									{!! Form::time(
									    'kamis_jam_buka',
									    old('kamis_jam_buka') ??
									        ($data->poliJadwal()->where('hari', 'kamis')->first()->jam_kerja_buka ??
									            null),
									    [
									        'class' => 'form-control' . $errors->first('kamis_jam_buka', ' is-invalid'),
									    ],
									) !!}
									@error('kamis_jam_buka')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
								<div class="col-sm-6">
									{!! Form::time(
									    'kamis_jam_tutup',
									    old('kamis_jam_tutup') ??
									        ($data->poliJadwal()->where('hari', 'kamis')->first()->jam_kerja_tutup ??
									            null),
									    [
									        'class' => 'form-control' . $errors->first('kamis_jam_tutup', ' is-invalid'),
									    ],
									) !!}
									@error('kamis_jam_tutup')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row mb-4">
						{!! Form::label('jumat', 'Jumat', [
						    'class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3',
						]) !!}
						<div class="col-sm-12 col-md-7">
							<div class="row">
								<div class="col-sm-6">
									{!! Form::time(
									    'jumat_jam_buka',
									    old('jumat_jam_buka') ??
									        ($data->poliJadwal()->where('hari', 'jumat')->first()->jam_kerja_buka ??
									            null),
									    [
									        'class' => 'form-control' . $errors->first('jumat_jam_buka', ' is-invalid'),
									    ],
									) !!}
									@error('jumat_jam_buka')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
								<div class="col-sm-6">
									{!! Form::time(
									    'jumat_jam_tutup',
									    old('jumat_jam_tutup') ??
									        ($data->poliJadwal()->where('hari', 'jumat')->first()->jam_kerja_tutup ??
									            null),
									    [
									        'class' => 'form-control' . $errors->first('jumat_jam_tutup', ' is-invalid'),
									    ],
									) !!}
									@error('jumat_jam_tutup')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row mb-4">
						{!! Form::label('sabtu', 'Sabtu', [
						    'class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3',
						]) !!}
						<div class="col-sm-12 col-md-7">
							<div class="row">
								<div class="col-sm-6">
									{!! Form::time(
									    'sabtu_jam_buka',
									    old('sabtu_jam_buka') ??
									        ($data->poliJadwal()->where('hari', 'sabtu')->first()->jam_kerja_buka ??
									            null),
									    [
									        'class' => 'form-control' . $errors->first('sabtu_jam_buka', ' is-invalid'),
									    ],
									) !!}
									@error('sabtu_jam_buka')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
								<div class="col-sm-6">
									{!! Form::time(
									    'sabtu_jam_tutup',
									    old('sabtu_jam_tutup') ??
									        ($data->poliJadwal()->where('hari', 'sabtu')->first()->jam_kerja_tutup ??
									            null),
									    [
									        'class' => 'form-control' . $errors->first('sabtu_jam_tutup', ' is-invalid'),
									    ],
									) !!}
									@error('sabtu_jam_tutup')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row mb-4">
						{!! Form::label('minggu', 'Minggu', [
						    'class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3',
						]) !!}
						<div class="col-sm-12 col-md-7">
							<div class="row">
								<div class="col-sm-6">
									{!! Form::time(
									    'minggu_jam_buka',
									    old('minggu_jam_buka') ??
									        ($data->poliJadwal()->where('hari', 'minggu')->first()->jam_kerja_buka ??
									            null),
									    [
									        'class' => 'form-control' . $errors->first('minggu_jam_buka', ' is-invalid'),
									    ],
									) !!}
									@error('minggu_jam_buka')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
								<div class="col-sm-6">
									{!! Form::time(
									    'minggu_jam_tutup',
									    old('minggu_jam_tutup') ??
									        ($data->poliJadwal()->where('hari', 'minggu')->first()->jam_kerja_tutup ??
									            null),
									    [
									        'class' => 'form-control' . $errors->first('minggu_jam_tutup', ' is-invalid'),
									    ],
									) !!}
									@error('minggu_jam_tutup')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
							</div>
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

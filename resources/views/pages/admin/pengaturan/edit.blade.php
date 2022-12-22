@extends('layouts.app-admin')

@section('page-title', 'Pengaturan')

@section('breadcrumb')
	<div class="section-header-breadcrumb">
		<div class="breadcrumb-item">
			<a href="{{ route('admin.pengaturan.index') }}">Pengaturan</a>
		</div>
		<div class="breadcrumb-item active">
			<a href="{{ route('admin.pengaturan.edit') }}">Ubah</a>
		</div>
	</div>
@endsection

@section('content')
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<a class="btn btn-primary note-btn mr-3" href="{{ route('admin.pengaturan.index') }}">
						<i class="far fa-arrow-left"></i>
					</a>
					<h4>Ubah Pengaturan</h4>
				</div>
				<div class="card-body">
					{!! Form::open(['method' => 'PATCH', 'url' => route('admin.pengaturan.update')]) !!}
					<div class="form-group row mb-4">
						{!! Form::label('harga_pendaftaran_online', 'Harga Pendaftaran Online (Rupiah)', [
						    'class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3',
						]) !!}
						<div class="col-sm-12 col-md-7">
							{!! Form::number(
							    'harga_pendaftaran_online',
							    old('harga_pendaftaran_online') ?? ($data->where('slug', 'harga-pendaftaran-online')->first()->konten ?? null),
							    [
							        'class' => 'form-control' . $errors->first('harga_pendaftaran_online', ' is-invalid'),
							        'required',
							    ],
							) !!}
							@error('harga_pendaftaran_online')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>
					</div>
					<div class="form-group row mb-4">
						{!! Form::label('jarak_perkiraan_periksa', 'Jarak Perkiraan Periksa (Menit)', [
						    'class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3',
						]) !!}
						<div class="col-sm-12 col-md-7">
							{!! Form::number(
							    'jarak_perkiraan_periksa',
							    old('jarak_perkiraan_periksa') ?? ($data->where('slug', 'jarak-perkiraan-periksa')->first()->konten ?? null),
							    [
							        'class' => 'form-control' . $errors->first('jarak_perkiraan_periksa', ' is-invalid'),
							        'required',
							    ],
							) !!}
							@error('jarak_perkiraan_periksa')
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

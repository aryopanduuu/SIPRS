@extends('layouts.app-admin')

@section('page-title', 'Pendaftaran Online')

@section('breadcrumb')
	<div class="section-header-breadcrumb">
		<div class="breadcrumb-item">
			<a href="{{ route('admin.pendaftaran-online.index') }}">Pendaftaran Online</a>
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
					<a class="btn btn-primary note-btn mr-3" href="{{ route('admin.pendaftaran-online.index') }}">
						<i class="far fa-arrow-left"></i>
					</a>
					<h4>{{ $page['title'] }} Pendaftaran Online</h4>
				</div>
				<div class="card-body">
					{!! Form::open([
					    'method' => $page['formMethod'],
					    'url' => $page['formRoute'],
					    'enctype' => 'multipart/form-data',
					]) !!}
					<div class="form-group row mb-4">
						{!! Form::label('kode_antrian', 'Kode Antrian', [
						    'class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3',
						]) !!}
						<div class="col-sm-12 col-md-7">
							{!! Form::text('kode_antrian', $data->kode_antrian, [
							    'class' => 'form-control',
							    'disabled',
							]) !!}
						</div>
					</div>
					<div class="form-group row mb-4">
						{!! Form::label(
						    'tgl_periksa',
						    'Tanggal Periksa<span class="text-danger">*</span>',
						    [
						        'class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3',
						    ],
						    false,
						) !!}
						<div class="col-sm-12 col-md-7">
							{!! Form::date('tgl_periksa', old('tgl_periksa') ?? ($data->getRawOriginal('tgl_periksa') ?? null), [
							    'min' => date('Y-m-d'),
							    'class' => 'form-control' . $errors->first('tgl_periksa', ' is-invalid'),
							    'required',
							]) !!}
							@error('tgl_periksa')
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
				<div class="card-footer">
					(<span class="text-danger">*</span>) = Wajib diisi atau dipilih.
				</div>
			</div>
		</div>
	</div>
@endsection

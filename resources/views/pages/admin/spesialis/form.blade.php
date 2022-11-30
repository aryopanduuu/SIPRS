@extends('layouts.app-admin')

@section('page-title', 'Spesialis')

@section('breadcrumb')
	<div class="section-header-breadcrumb">
		<div class="breadcrumb-item">
			<a href="{{ route('admin.spesialis.index') }}">Spesialis</a>
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
					<a class="btn btn-primary note-btn mr-3" href="{{ route('admin.spesialis.index') }}">
						<i class="far fa-arrow-left"></i>
					</a>
					<h4>{{ $page['title'] }} Spesialis</h4>
				</div>
				<div class="card-body">
					{!! Form::open(['method' => $page['formMethod'], 'url' => $page['formRoute']]) !!}
					<div class="form-group row mb-4">
						{!! Form::label('gelar', 'Gelar', [
						    'class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3',
						]) !!}
						<div class="col-sm-12 col-md-7">
							{!! Form::text('gelar', old('gelar') ?? ($data->gelar ?? null), [
							    'class' => 'form-control' . $errors->first('gelar', ' is-invalid'),
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
						{!! Form::label('gelar_singkatan', 'Gelar Singkatan', [
						    'class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3',
						]) !!}
						<div class="col-sm-12 col-md-7">
							{!! Form::text('gelar_singkatan', old('gelar_singkatan') ?? ($data->gelar_singkatan ?? null), [
							    'class' => 'form-control' . $errors->first('gelar_singkatan', ' is-invalid'),
							    'required',
							]) !!}
							@error('gelar_singkatan')
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

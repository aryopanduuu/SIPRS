@extends('layouts.app-admin')

@section('page-title', 'Poli')

@section('breadcrumb')
	<div class="section-header-breadcrumb">
		<div class="breadcrumb-item">
			<a href="{{ route('admin.poli.index') }}">Poli</a>
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
					<a class="btn btn-primary note-btn mr-3" href="{{ route('admin.poli.index') }}">
						<i class="far fa-arrow-left"></i>
					</a>
					<h4>{{ $page['title'] }} Poli</h4>
				</div>
				<div class="card-body">
					{!! Form::open(['method' => $page['formMethod'], 'url' => $page['formRoute']]) !!}
					<div class="form-group row mb-4">
						{!! Form::label('nama_poli', 'Nama Poli', ['class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3']) !!}
						<div class="col-sm-12 col-md-7">
							{!! Form::text('nama_poli', old('nama_poli') ?? ($data->nama_poli ?? null), [
							    'class' => 'form-control' . $errors->first('nama_poli', ' is-invalid'),
							    'required',
							]) !!}
							@error('nama_poli')
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

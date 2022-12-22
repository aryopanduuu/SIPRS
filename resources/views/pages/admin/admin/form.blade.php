@extends('layouts.app-admin')

@section('page-title', 'Admin')

@section('breadcrumb')
	<div class="section-header-breadcrumb">
		<div class="breadcrumb-item">
			<a href="{{ route('admin.admin.index') }}">Admin</a>
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
					<a class="btn btn-primary note-btn mr-3" href="{{ route('admin.admin.index') }}">
						<i class="far fa-arrow-left"></i>
					</a>
					<h4>{{ $page['title'] }} Admin</h4>
				</div>
				<div class="card-body">
					{!! Form::open([
					    'method' => $page['formMethod'],
					    'url' => $page['formRoute'],
					]) !!}
					<div class="form-group row mb-4">
						{!! Form::label(
						    'username',
						    'Username<span class="text-danger">*</span>',
						    [
						        'class' => 'col-form-label text-md-right col-12 col-md-3 col-lg-3',
						    ],
						    false,
						) !!}
						<div class="col-sm-12 col-md-7">
							{!! Form::text('username', old('username') ?? ($data->username ?? null), [
							    'class' => 'form-control' . $errors->first('username', ' is-invalid'),
							    'required',
							]) !!}
							@error('username')
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

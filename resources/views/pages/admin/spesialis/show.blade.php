@extends('layouts.app-admin')

@section('page-title', 'Spesialis ' . $data->gelar)

@section('breadcrumb')
	<div class="section-header-breadcrumb">
		<div class="breadcrumb-item">
			<a href="{{ route('admin.spesialis.index') }}">Spesialis</a>
		</div>
		<div class="breadcrumb-item active">
			<a href="{{ route('admin.spesialis.show', $data->id) }}"> {{ $data->gelar }}</a>
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
					<h4>Daftar Dokter Spesialis {{ $data->gelar }}</h4>
				</div>
				<div class="card-body">
					{{ $dataTable->table() }}
				</div>
			</div>
		</div>
	</div>
@endsection

@push('custom-css')
	<link href="{{ asset('assets/admin/modules/datatables/datatables.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/admin/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}"
		rel="stylesheet">
@endpush

@push('custom-js')
	<script src="{{ asset('assets/admin/modules/datatables/datatables.min.js') }}"></script>
	<script src="{{ asset('assets/admin/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
	</script>
	{{ $dataTable->scripts() }}
@endpush

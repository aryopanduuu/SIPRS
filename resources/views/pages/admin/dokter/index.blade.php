@extends('layouts.app-admin')

@section('page-title', 'Dokter')

@section('breadcrumb')
	<div class="section-header-breadcrumb">
		<div class="breadcrumb-item active">
			<a href="{{ route('admin.dokter.index') }}">Dokter</a>
		</div>
	</div>
@endsection

@section('content')
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4>Daftar Dokter</h4>
					<a class="btn btn-primary note-btn ml-auto" href="{{ route('admin.dokter.create') }}">
						<i class="far fa-plus-circle"></i> Tambah Dokter
					</a>
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

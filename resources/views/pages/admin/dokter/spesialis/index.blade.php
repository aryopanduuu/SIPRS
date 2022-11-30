@extends('layouts.app-admin')

@section('page-title', 'Spesialis Dokter')

@section('breadcrumb')
	<div class="section-header-breadcrumb">
		<div class="breadcrumb-item">
			<a href="{{ route('admin.dokter.index') }}">Dokter</a>
		</div>
		<div class="breadcrumb-item active">
			<a href="{{ route('admin.dokter.spesialis.index', $data->id) }}">{{ $data->nama }}</a>
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
					<h4>Daftar Spesialis &mdash; Dokter {{ $data->nama }}</h4>
					<a class="btn btn-primary note-btn ml-auto" href="{{ route('admin.dokter.spesialis.create', $data->id) }}">
						<i class="far fa-plus-circle"></i> Tambah Spesialis
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
	<script src="{{ asset('assets/admin/modules/sweetalert/sweetalert.min.js') }}"></script>
	{{ $dataTable->scripts() }}
	<script>
		$("table").on('draw.dt', function() {
			$('[data-toggle=tooltip]').tooltip({
				container: 'body'
			});
			deleteData()
		})
		const deleteData = () => {
			$('.delete').click(function(e) {
				e.preventDefault()
				let $this = $(this);
				swal({
						title: 'Apa anda yakin?',
						text: 'Data tidak dapat dikembalikan.',
						icon: 'warning',
						buttons: true,
						dangerMode: true,
					})
					.then((willDelete) => {
						if (willDelete) {
							$this.parent().submit();
						}
					});
			})
		}
	</script>
@endpush

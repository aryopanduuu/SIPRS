@extends('layouts.app-admin')

@section('page-title', 'Pengaturan')

@section('breadcrumb')
	<div class="section-header-breadcrumb">
		<div class="breadcrumb-item active">
			<a href="{{ route('admin.pengaturan.index') }}">Pengaturan</a>
		</div>
	</div>
@endsection

@section('content')
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4>Pengaturan</h4>
					<a class="btn btn-primary note-btn ml-auto" href="{{ route('admin.pengaturan.edit') }}">
						<i class="far fa-pencil-alt"></i> Ubah Pengaturan
					</a>
				</div>
				<div class="card-body">
					<table class="table table-hover table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Tipe</th>
								<th>Konten</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $item)
								<tr>
									<td>{{ $loop->iteration }}.</td>
									<td>{{ $item->keterangan }}</td>
									<td>{{ $item->konten }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection

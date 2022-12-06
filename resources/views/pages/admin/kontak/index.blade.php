@extends('layouts.app-admin')

@section('page-title', 'Kontak')

@section('breadcrumb')
	<div class="section-header-breadcrumb">
		<div class="breadcrumb-item active">
			<a href="{{ route('admin.kontak.index') }}">Kontak</a>
		</div>
	</div>
@endsection

@section('content')
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4>Daftar Kontak</h4>
				</div>
				<div class="card-body">
					<table class="table table-hover table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Keterangan</th>
								<th>Konten</th>
								<th class="text-center">#</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $item)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $item->keterangan }}</td>
									<td>{{ $item->konten }}</td>
									<td class="text-center">
										<a class="btn btn-primary" href="{{ route('admin.kontak.edit', $item->id) }}">
											<i class="fas fa-pencil-alt"></i>
										</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection

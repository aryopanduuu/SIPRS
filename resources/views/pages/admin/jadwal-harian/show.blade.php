@extends('layouts.app-admin')

@section('page-title', 'Jadwal Harian')

@section('breadcrumb')
	<div class="section-header-breadcrumb">
		<div class="breadcrumb-item">
			<a href="{{ route('admin.jadwal-harian.index') }}">Jadwal Harian</a>
		</div>
		<div class="breadcrumb-item active">
			<a href="{{ route('admin.jadwal-harian.show', $poli->id) }}">{{ $poli->nama_poli }}</a>
		</div>
	</div>
@endsection

@section('content')
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<a class="btn btn-primary note-btn mr-3" href="{{ route('admin.jadwal-harian.index') }}">
						<i class="far fa-arrow-left"></i>
					</a>
					<h4>{{ $poli->nama_poli }}</h4>
				</div>
				<div class="card-body">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Hari</th>
								<th class="text-center">Jam Buka</th>
								<th class="text-center">Jam Tutup</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $item)
								<tr>
									<td>{{ $item['hari'] }}</td>
									<td class="text-center">{!! $item['jam_kerja_buka'] !!}</td>
									<td class="text-center">{!! $item['jam_kerja_tutup'] !!}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection

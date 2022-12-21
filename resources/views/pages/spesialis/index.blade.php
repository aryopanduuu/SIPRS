@extends('layouts.app')
@section('content')
	<div class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="page-title">
						<span>Spesialis</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<section class="section departments">
		<div class="container">
			<div class="row">
				@forelse ($data as $item)
					<div class="col-12 col-sm-6 col-md-4 p-2">
						<div class="card h-100 p-3">
							<div class="card-body text-center">
								<div class="d-flex flex-column">
									<h5 class="font-weight-bolder" data-toggle="tooltip" title="{{ $item->gelar }}">
										{{ Str::limit($item->gelar, 25, '...') }}</h5>
									<h6 class="text-muted">{{ $item->gelar_singkatan }}</h6>
								</div>
								<a class="btn btn-primary rounded-0" href="{{ route('spesialis.show', $item->id) }}">
									Lihat Dokter
								</a>
							</div>
						</div>
					</div>
				@empty
					<div class="col-12">
						<span>Tidak ada untuk ditampilkan</span>
					</div>
				@endforelse
				<div class="d-flex justify-content-center mt-3 col-12">
					{{ $data->links('pagination::bootstrap-4') }}
				</div>
			</div>
		</div>
	</section>
@endsection

@push('custom-js')
	<script>
		$('[data-toggle="tooltip"]').tooltip()
	</script>
@endpush

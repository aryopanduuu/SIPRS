@extends('layouts.app')
@section('content')
	<div class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="page-title">
						<span>Poli</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<section class="section departments">
		<div class="container">
			<div class="row">
				@foreach ($data as $item)
					<div class="col-12 col-sm-6 col-md-4 p-2">
						<div class="card p-3 rounded-0">
							<div class="card-body text-center">
								<h5 class="font-weight-bolder" data-toggle="tooltip" title="{{ $item->nama_poli }}">
									{{ Str::limit($item->nama_poli, 20, '...') }}
								</h5>
								<button class="btn btn-primary btn-sm mt-3 rounded-0 showJadwal" data-id="{{ $item->id }}">Lihat
									Jadwal</button>
							</div>
						</div>
					</div>
				@endforeach
				<div class="d-flex justify-content-center mt-3 col-12">
					{{ $data->links('pagination::bootstrap-4') }}
				</div>
			</div>
		</div>
	</section>
	<div class="modal fade" id="modalJadwal" tabindex="-1">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-body">
					<table class="table">
						<thead>
							<tr class="text-center">
								<th>Senin</th>
								<th>Selasa</th>
								<th>Rabu</th>
								<th>Kamis</th>
								<th>Jumat</th>
								<th>Sabtu</th>
								<th>Minggu</th>
							</tr>
						</thead>
						<tbody id="tableModalBody"></tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" data-dismiss="modal" type="button">Tutup</button>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('custom-js')
	<script src="{{ asset('assets/js/axios.min.js') }}"></script>
	<script>
		$('[data-toggle="tooltip"]').tooltip()
		$('.showJadwal').on('click', function(e) {
			$('#tableModalBody').html('')
			let id = $(this).data('id');
			axios({
					method: 'POST',
					url: `{{ route('api.jadwal-poli') }}`,
					data: {
						id: id,
					},
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				})
				.then((res) => {
					let dataJadwal = '<tr>'
					Object.values(res.data.data).forEach((item, val) => {
						dataJadwal += `<td class="text-center">${item}</td>`
					})
					dataJadwal += '</tr>'
					$('#tableModalBody').append(dataJadwal)
					$('#modalJadwal').modal()
				})
				.catch((err) => {})
		})
	</script>
@endpush

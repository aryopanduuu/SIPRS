@extends('layouts.app')

@section('content')
	<section class="section home-banner row-middle">
		<div class="inner-bg"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-sm-12">
					<div class="banner-content d-flex d-sm-block flex-column">
						<h1>Pendaftaran Online</h1>
						<p>Layanan pra-pendaftaran online kami memungkinkan penyimpanan informasi pribadi ke dalam sistem
							rumah sakit kami sebelum kunjungan Anda—menghemat waktu yang berharga saat hari kunjungan Anda.
						</p>
						<button class="btn btn-primary pasien-type consult-btn px-3" target="_blank">
							<i class="fa-duotone fa-check-to-slot"></i> Pasien Lama
						</button>
						<a class="btn btn-success consult-btn px-3 mt-1 mt-sm-0" href="{{ route('appointment.cetak-ulang') }}">
							<i class="fa-duotone fa-print"></i> Cetak Ulang Tiket
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@push('custom-js')
	<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
	<script>
		$('.pasien-type').on('click', function() {
			Swal.fire({
					icon: 'question',
					title: 'Tipe Pasien',
					text: 'Silahkan pilih tipe pasien.',
					confirmButtonText: `<i class="fa-duotone fa-users"></i> Umum`,
					denyButtonText: `<i class="fa-duotone fa-user-check"></i> Asuransi`,
					showDenyButton: true,
					denyButtonColor: '#138496'
				})
				.then((result) => {
					if (result.isConfirmed) {
						window.open("{{ route('appointment.pasien-lama.index') }}")
					} else if (result.isDenied) {
						window.open('/')
					}
				})
		})
	</script>
@endpush

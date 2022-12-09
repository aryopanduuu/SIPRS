@extends('layouts.app')
@section('content')
	@if ($data->payment_status == 0)
		<button class="btn btn-primary" id="pay-button">Bayar Sekarang</button>
	@else
		Pembayaran berhasil
	@endif
@endsection

@push('custom-js')
@endpush

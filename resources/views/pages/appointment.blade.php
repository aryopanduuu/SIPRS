@extends('layouts.app')

@section('content')
<div id="app">
    <Appointment-Page />
</div>
@endsection

@push('custom-css')
<link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
@endpush

@push('custom-js')
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/notiflix@3.2.5/dist/notiflix-block-aio-3.2.5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
@vite('resources/js/app.js')
@endpush

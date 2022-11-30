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
<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/js/notiflix-block-aio-3.2.5.min.js') }}"></script>
<script src="{{ asset('assets/js/cleave.min.js') }}"></script>
@vite('resources/js/app.js')
@endpush

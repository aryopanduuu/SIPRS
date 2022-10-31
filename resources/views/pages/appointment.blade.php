@extends('layouts.app')

@section('content')
<div id="app">
    <Appointment />
</div>
@endsection

@push('custom-js')
@vite('resources/js/app.js')
<script src="https://cdn.jsdelivr.net/npm/notiflix@3.2.5/dist/notiflix-block-aio-3.2.5.min.js"></script>
<script>
    $('#search').click(function () {})

</script>
@endpush

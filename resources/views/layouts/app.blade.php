<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name') }}</title>
	<link type="image/x-icon" href="assets/img/favicon.png" rel="shortcut icon">
	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/fontawesome/css/all.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
	@stack('custom-css')
	<link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
	<!--[if lt IE 9]>
		<blade ___scripts_0___/>
		<blade ___scripts_1___/>
		<![endif]-->
</head>

<body>
	<x-menu.navbar />
	<x-menu.sidebar />
	<div class="main-content">
		@yield('content')
	</div>
	@include('partials.footer')
	<div class="sidebar-overlay" data-reff="#side_menu"></div>
	<script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/theme.js') }}"></script>
	@stack('custom-js')
</body>

</html>

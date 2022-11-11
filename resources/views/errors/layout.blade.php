<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>@yield('code') &mdash; @yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <x-menu.navbar />
    <x-menu.sidebar />
    <div class="main-content error-wrapper">
        <div class="content">
            <div class="container">
                <div class="error-box">
                    <h1>@yield('code')</h1>
                    <h3><i class="fas fa-exclamation-triangle"></i> Oops! @yield('message')!</h3>
                    <div class="error-btn mt-5">
                        <a class="btn btn-primary" href="/">Kembali ke halaman utama</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
    <div class="sidebar-overlay" data-reff="#side_menu"></div>
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
</body>

</html>

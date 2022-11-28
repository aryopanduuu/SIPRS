<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<title>Admin &mdash; RS Lorem</title>

	<link href="{{ asset('assets/admin/modules/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/fontawesome/css/all.min.css') }}" rel="stylesheet">
	@stack('custom-css')
	<link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/admin/css/components.css') }}" rel="stylesheet">
</head>

<body>

	<div id="app">
		<div class="main-wrapper main-wrapper-1">
			<div class="navbar-bg"></div>
			<nav class="navbar navbar-expand-lg main-navbar">
				<ul class="navbar-nav mr-auto">
					<li>
						<a class="nav-link nav-link-lg" data-toggle="sidebar" href="javascript:;">
							<i class="fas fa-bars"></i>
						</a>
					</li>
				</ul>
				<ul class="navbar-nav navbar-right">
					<li class="dropdown">
						<a class="nav-link dropdown-toggle nav-link-lg nav-link-user" data-toggle="dropdown" href="javascript:;">
							<img class="rounded-circle mr-1" src="{{ asset('assets/img/doctor-01.jpg') }}" alt="image">
							<div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<div class="dropdown-title">Logged in 5 min ago</div>
							<a class="dropdown-item has-icon" href="features-profile.html">
								<i class="far fa-user"></i> Profile
							</a>
							<a class="dropdown-item has-icon" href="features-activities.html">
								<i class="fas fa-bolt"></i> Activities
							</a>
							<a class="dropdown-item has-icon" href="features-settings.html">
								<i class="fas fa-cog"></i> Settings
							</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item has-icon text-danger" href="#">
								<i class="fas fa-sign-out-alt"></i> Logout
							</a>
						</div>
					</li>
				</ul>
			</nav>
			<x-menu.admin.sidebar />
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>@yield('page-title')</h1>
						@yield('breadcrumb')
					</div>
					<div class="section-body">
						@yield('content')
					</div>
				</section>
			</div>

			<footer class="main-footer">
				<div class="footer-left">
					Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad
						Nauval Azhar</a>
				</div>
				<div class="footer-right">

				</div>
			</footer>
		</div>
	</div>
	<!-- General JS Scripts -->
	<script src="{{ asset('assets/admin/modules/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/admin/modules/popper.js') }}"></script>
	<script src="{{ asset('assets/admin/modules/tooltip.js') }}"></script>
	<script src="{{ asset('assets/admin/modules/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/admin/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
	<script src="{{ asset('assets/admin/modules/moment.min.js') }}"></script>
	<script src="{{ asset('assets/admin/js/stisla.js') }}"></script>
	@stack('custom-js')
	<script src="{{ asset('assets/admin/js/scripts.js') }}"></script>
	@include('sweetalert::alert')
</body>

</html>

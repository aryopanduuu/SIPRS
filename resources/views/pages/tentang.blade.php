@extends('layouts.app')
@section('content')
	<div class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="page-title">
						<span>Tentang Kami</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<section class="content">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-header text-center">
						<h3 class="header-title">{{ config('app.name') }}</h3>
						<div class="line"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 about-desc">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In porta luctus
						est interdum pretium. Fusce id tortor fringilla, suscipit turpis ac, varius
						ex. Cras vel metus ligula. Nam enim ligula, bibendum a iaculis ut, cursus
						id augue. Proin vitae purus id tortor vehicula scelerisque non in libero.</p>
					<p>Nulla non turpis sit amet purus pharetra sollicitudin. Proin rutrum urna
						ut suscipit ullamcorper. Proin sapien felis, dignissim non finibus eget,
						luctus vel purus. Pellentesque efficitur congue orci ornare accumsan. Nullam
						ultrices libero vel imperdiet scelerisque. Donec vel mauris eros.</p>
				</div>
			</div>
			<div class="about-content">
				<div class="text-center my-3">
					<img class="img-fluid" src="{{ asset('assets/img/about-img.png') }}" alt="">
				</div>
				<div class="our-mission">
					<div class="row">
						<div class="col-md-6">
							<div class="about-det">
								<h4>Visi Kami</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In porta luctus
									est interdum pretium. Fusce id tortor fringilla.</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="about-det">
								<h4>Misi Kami</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In porta luctus
									est interdum pretium. Fusce id tortor fringilla.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

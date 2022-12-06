@extends('layouts.app')

@section('content')
	<div class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="page-title">
						<span>Hubungi Kami</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="content">
		<div class="container">
			<div class="row">
				<aside class="col-md-4">
					<div class="contact-left">
						<div class="contact-address">
							<h3 class="company-name">{{ config('app.name') }}</h3>
							<p>{!! nl2br($data->alamat) !!}</p>
							<p class="m-b-0">
								<strong>Nomor Telepon</strong>: <a href="tel:{{ $data->nomor_telepon }}">{{ $data->nomor_telepon }}</a>
								<br> <strong>Email</strong>: <a href="mailto:{{ $data->email }}">{{ $data->email }}</a>
							</p>
						</div>
					</div>
				</aside>
				<div class="col-md-8 map-frame">
					<iframe src="https://maps.google.com/maps?q={{ $data->map }}&hl=es;z=14&amp;output=embed"
						height="450"></iframe>
					<p class="contact-cont">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In porta luctus
						est interdum pretium. Fusce id tortor fringilla, suscipit turpis ac, varius
						ex. Cras vel metus ligula. Nam enim ligula, bibendum a iaculis ut, cursus
						id augue. Proin vitae purus id tortor vehicula scelerisque non in libero.
						Nulla non turpis sit amet purus pharetra sollicitudin. Proin rutrum urna
						ut suscipit ullamcorper.
					</p>
				</div>
			</div>
		</div>
	</div>
@endsection

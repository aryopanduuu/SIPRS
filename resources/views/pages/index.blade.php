@extends('layouts.app')
@section('content')
	<div class="main-content">
		<section class="section home-banner row-middle">
			<div class="inner-bg"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-md-9">
						<div class="banner-content">
							<h1>{{ config('app.name') }}</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection

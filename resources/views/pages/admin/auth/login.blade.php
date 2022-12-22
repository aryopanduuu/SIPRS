<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<title>Admin &mdash; RS Lorem</title>

	<link href="{{ asset('assets/admin/modules/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/fontawesome/css/all.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/admin/css/components.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/admin/css/custom.css') }}" rel="stylesheet">
</head>

<body>

	<div id="app">
		<section class="section">
			<div class="container mt-5">
				<div class="row">
					<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
						<div class="card card-primary">
							<div class="card-header">
								<h4>Login</h4>
							</div>
							<div class="card-body">
								{!! Form::open(['route' => 'admin.login']) !!}
								<div class="form-group">
									{!! Form::label('username', 'Username', ['class' => 'control-label']) !!}
									{!! Form::text('username', null, [
									    'class' => 'form-control' . $errors->first('username', ' is-invalid'),
									    'required',
									]) !!}
									@error('username')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>

								<div class="form-group">
									{!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
									{!! Form::password('password', [
									    'class' => 'form-control' . $errors->first('password', 'is-invalid'),
									    'required',
									]) !!}
									@error('password')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
								<div class="form-group">
									<button class="btn btn-primary btn-lg btn-block" type="submit">
										Login
									</button>
								</div>
								{!! Form::close() !!}
							</div>
						</div>
						<div class="simple-footer">
							Copyright &copy; Stisla {{ date('Y') }}
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<script src="{{ asset('assets/admin/modules/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/admin/modules/popper.js') }}"></script>
	<script src="{{ asset('assets/admin/modules/tooltip.js') }}"></script>
	<script src="{{ asset('assets/admin/modules/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/admin/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
	<script src="{{ asset('assets/admin/modules/moment.min.js') }}"></script>
	<script src="{{ asset('assets/admin/js/stisla.js') }}"></script>
	<script src="{{ asset('assets/admin/js/scripts.js') }}"></script>
</body>

</html>

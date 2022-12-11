@extends('layouts.app-admin')

@section('page-title', 'Dashboard')

@section('breadcrumb')
	<div class="section-header-breadcrumb">
		<div class="breadcrumb-item active">
			<a href="{{ route('admin.index') }}">Dashboard</a>
		</div>
	</div>
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-4 col-md-6 col-sm-6 col-12">
			<div class="card card-statistic-1">
				<div class="card-icon bg-primary">
					<i class="far fa-user-doctor"></i>
				</div>
				<div class="card-wrap">
					<div class="card-header">
						<h4>Dokter</h4>
					</div>
					<div class="card-body">
						{{ $counts->dokter }}
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-6 col-sm-6 col-12">
			<div class="card card-statistic-1">
				<div class="card-icon bg-primary">
					<i class="far fa-hospital-user"></i>
				</div>
				<div class="card-wrap">
					<div class="card-header">
						<h4>Poli</h4>
					</div>
					<div class="card-body">{{ $counts->poli }}</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-6 col-sm-6 col-12">
			<div class="card card-statistic-1">
				<div class="card-icon bg-primary">
					<i class="fas fa-clipboard-list-check"></i>
				</div>
				<div class="card-wrap">
					<div class="card-header">
						<h4>Pendaftaran Online</h4>
					</div>
					<div class="card-body">{{ $counts->pendaftaran_online }}</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-6 col-sm-6 col-12">
			<div class="card card-statistic-1">
				<div class="card-icon bg-primary">
					<i class="fas fa-clipboard-check"></i>
				</div>
				<div class="card-wrap">
					<div class="card-header">
						<h4>Pendaftaran Online Hari Ini</h4>
					</div>
					<div class="card-body">{{ $counts->pendaftaran_online_today }}</div>
				</div>
			</div>
		</div>
	</div>
@endsection

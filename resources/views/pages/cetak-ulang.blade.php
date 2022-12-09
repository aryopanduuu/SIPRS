@extends('layouts.app')

@section('content')
	<section class="section account-content">
		<div class="col">
			<h3 class="title mb-4 text-center font-weight-bold">Cetak Ulang Tiket</h3>
			<div class="account-box">
				{!! Form::open(['route' => 'appointment.cetak-ulang']) !!}
				<div class="form-group">
					{!! Form::label('kode_antrian', 'Kode Antrian/Nomor Rekam Medis<span class="text-red">*</span>', [], false) !!}
					{!! Form::text('kode_antrian', null, [
					    'class' => 'form-control' . $errors->first('kode_antrian', ' is-invalid'),
					    'required',
					]) !!}
					@error('kode_antrian')
						<div class="invalid-feedback pt-1">
							{{ $message }}
						</div>
					@enderror
				</div>
				<div class="form-group">
					{!! Form::label('tgl_periksa', 'Tanggal Periksa<span class="text-red">*</span>', [], false) !!}
					{!! Form::date('tgl_periksa', null, [
					    'class' => 'form-control' . $errors->first('tgl_periksa', ' is-invalid'),
					    'required',
					]) !!}
					@error('tgl_periksa')
						<div class="invalid-feedback pt-1">
							{{ $message }}
						</div>
					@enderror
				</div>
				<div class=" form-group text-center m-b-0">
					{!! Form::button('<i class="fa fa-search"></i> Cari', [
					    'class' => 'account-btn btn btn-primary',
					    'type' => 'submit',
					]) !!}
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</section>
@endsection

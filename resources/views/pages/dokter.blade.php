@extends('layouts.app')
@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header text-center">
                        <h3 class="header-title">Dokter Kami</h3>
                        <div class="line"></div>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="row doctors-list">
                <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                    @foreach($dokters as $dokter)
                    <div class="doctors-list">
                        <div class="doctor-inner">
                            <img class="img-fluid" alt="" src="{{ asset('assets/img/doctor-01.jpg') }}">
                            <div class="doctor-details">
                                <div class="doctor-info">
                                    <h4 class="doctor-name"><a href="#">{{ $dokter['nama'] }}</a></h4>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

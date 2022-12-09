@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header text-center">
                        <h3 class="header-title">Dokter Kami</h3>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            <div class="row doctors-list">
                @foreach($dokters as $dokter)
                <div class="col-12 col-md-6 col-lg-4 col-xl-4 py-3">
                    <div class="card">
                        <img class="card-img" alt="" src="{{ asset('assets/img/avatar/'.$dokter['foto']) }}">
                        <div class="card-body text-center">
                            <h4 class="doctor-name"><a href="#">{{ $dokter['nama'] }}</a></h4>
                            <p>
                                <span class="depart">Department</span>
                            </p>
                        </div>
                        <div class="card-footer text-center">
                            <ul class="social-list">
                                <li>
                                    <a class="facebook" href="#"><i class="fab fa-facebook-f"></i> </a>
                                </li>
                                <li>
                                    <a class="twitter" href="#"><i class="fab fa-twitter"></i> </a>
                                </li>
                                <li>
                                    <a class="linkedin" href="#"><i class="fab fa-linkedin-in"></i> </a>
                                </li>
                                <li>
                                    <a class="g-plus" href="#"><i class="fab fa-google-plus-g"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@push('custom-css')
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome/css/fontawesome.min.css') }}">
@endpush

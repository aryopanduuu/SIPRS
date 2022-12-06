@extends('layouts.app')
@section('content')
    <section class="section departments">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header">
                        <h3 class="header-title">Poliklinik</h3>
                        <div class="line"></div>
                        <p>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($polis as $poli)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $poli['nama_poli'] }}</h5>
                                <h5 class="card-title"></h5>
                                <p class="card-text">Deskripsi Poli</p>
                                <div class="btn-group">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse"
                                        data-target="#collapseExample" aria-expanded="false"
                                        aria-controls="collapseExample">
                                        Jadwal
                                    </button>
                                    {{-- <div class="card card-body">
                                        <div class="collapse" id="collapseExample">
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="card-footer px-5" id="collapseExample">
                                <div class="widget working-widget">
                                    <div class="working-hours pt-3">
                                        <h3>Working Hours</h3>
                                        <ul>
                                            <li>
                                                <span>Monday</span> <b>19:00 - 20:00</b>
                                            </li>
                                            <li>
                                                <span>Tuesday</span> <b></b>
                                            </li>
                                            <li>
                                                <span>Wednesday</span> <b></b>
                                            </li>
                                            <li>
                                                <span>Thursday</span> <b></b>
                                            </li>
                                            <li>
                                                <span>Friday</span> <b></b>
                                            </li>
                                            <li>
                                                <span>Saturday</span> <b></b>
                                            </li>
                                            <li>
                                                <span>Sunday</span> <b>Closed</b>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                {{-- <span class="d-flex justify-content-center">Working Hours</span>
                                <ul class="list-unstyled mt-3">
                                    <li>
                                        <span>Monday</span> <b>9.00 AM To 5.00 PM</b>
                                    </li>
                                    <li>
                                        <span>Tuesday</span> <b>9.00 AM To 5.00 PM </b>
                                    </li>
                                    <li>
                                        <span>Wednesday</span> <b>9.00 AM To 5.00 PM</b>
                                    </li>
                                    <li>
                                        <span>Thursday</span> <b>9.00 AM To 5.00 PM</b>
                                    </li>
                                    <li>
                                        <span>Friday</span> <b>9.00 AM To 5.00 PM</b>
                                    </li>
                                    <li>
                                        <span>Saturday</span> <b>11.00 AM To 3.00 PM</b>
                                    </li>
                                    <li>
                                        <span>Sunday</span> <b>Closed</b>
                                    </li>
                                </ul> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>









            {{--
            <div class="row">
                @foreach ($polis as $poli)
                    <div class="col-md-4">
                        <div class="dept-box">
                            <div class="dept-img">
                                <a href="department-details.html">
                                    <img width="67" height="80" alt="Dentists" src="assets/img/icon-04.png"></a>
                            </div>
                            <h4>
                                <a href="department-details.html"> {{ $poli['nama_poli'] }}</a>
                            </h4>
                            <p>Deskripsi Poli
                            </p>
                        </div>
                    </div>
                @endforeach
            </div> --}}
        </div>
    </section>
@endsection

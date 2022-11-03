@extends('layouts.app')
@section('content')
    <section class="section departments">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header text-center">
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
            </div>
        </div>
    </section>
@endsection

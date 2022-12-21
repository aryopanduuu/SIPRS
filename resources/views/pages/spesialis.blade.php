@extends('layouts.app')
@section('content')
    {{-- <section class="section departments py-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header">
                        <h3 class="header-title">Spesialis</h3>
                        <div class="line"></div>
                        <p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!DOCTYPE html>

    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<title>Responsive Card Slider</title>-->

        <!-- Swiper CSS -->
        <link rel="stylesheet" href="public/assets/css/swiper-bundle.min.css">

        <!-- CSS -->
        <link rel="stylesheet" href="public/assets/css/custom.css">

    </head>

    <body>
        <div class="slide-container swiper">
            <div class="slide-content">
                <div class="card-wrapper swiper-wrapper">
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>

                            <div class="card-image">
                                <!--<img src="images/profile1.jpg" alt="" class="card-img">-->
                            </div>
                        </div>
                        <div class="card-content">
                            <h2 class="name">David Dell</h2>
                            <p class="description">The lorem text the section that contains header with having open
                                functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>

                            <button class="button">View More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="swiper-button-next swiper-navBtn"></div>
        <div class="swiper-button-prev swiper-navBtn"></div>
        <div class="swiper-pagination"></div>
        </div>

    </body>

    <!-- Swiper JS -->
    <!--Uncomment this line-->
    <!--<script src="js/swiper-bundle.min.js"></script>-->

    <!-- JavaScript -->
    <!--Uncomment this line-->
    <!--<script src="js/script.js"></script>-->

    </html> --}}
    <section class="section departments">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header">
                        <h3 class="header-title">Spesialis</h3>
                        <div class="line"></div>
                        <p>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($spesialis as $spesial)
                    <div class="col-md-6 p-2">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $spesial['gelar'] }}</h5>
                                <h5 class="card-title">{{ $spesial['gelar_singkatan'] }}</h5>
                                <p class="card-text">Deskripsi Spesiali</p>
                                <a href="{{ route('spesialis.show', $spesial->id) }}" class="btn btn-primary">
                                    Lihat Dokter
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

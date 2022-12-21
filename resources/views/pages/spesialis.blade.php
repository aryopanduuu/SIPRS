@extends('layouts.app')
@section('content')
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

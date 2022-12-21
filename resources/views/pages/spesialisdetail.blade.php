@extends('layouts.app')
@section('content')
    <div class="main-content">

        <div class="page-header">
            @foreach ($gelar as $spd)
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title">
                                <span> {{ $spd->gelar }}</span>
                                {{-- <span> Test</span> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="service-view">
                            <div class="service-image">
                                {{-- <img alt="" src="assets/img/department-img.jpg" class="img-fluid"> --}}
                            </div>
                            <div class="service-content">
                                <p>
                                </p>
                                <p>
                                </p>
                                <ul class="list-square">
                                    @foreach ($datas as $idd)
                                        <li>{{ $idd->user_id }}</li>
                                    @endforeach
                                </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                    {{-- <aside class="col-md-4 sidebar-right">

                        <div class="widget search-widget">
                            <form class="search-form">
                                <div class="input-group">
                                    <input type="text" placeholder="Search..." class="form-control">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div> --}}

                    {{-- <div class="widget category-widget">
                            <h5>List Spesialis</h5>
                            <ul class="categories">
                                <li>
                                    <a href="#">--</a>
                                </li>
                                <li>
                                    <a href="#">--</a>
                                </li>
                                <li>
                                    <a href="#">--</a>
                                </li>
                                <li>
                                    <a href="#">--</a>
                                </li>
                                <li>
                                    <a href="#">--</a>
                                </li>
                            </ul>
                        </div> --}}
                </div>
                </aside>
            </div>
        </div>
    </div>
    </div>
@endsection

<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-2 float-left">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            <img alt="Logo" src="assets/img/logo.png" width="56" height="50">
                        </a>
                    </div>
                </div>
                <div class="col-md-10">
                    <nav class="navbar navbar-expand-md p-0">
                        <div class="navbar-collapse collapse" id="navbar">
                            <ul class="nav navbar-nav main-nav float-right ml-auto">
                                @foreach ($menu as $item)
                                @if ($item['hasChild'])
                                <li class="nav-item{{ Request::segment(1) == $item['name'] ? ' active' : null }}">
                                    @else
                                <li class="nav-item{{ Route::currentRouteName() == $item['name'] ? ' active' : null }}">
                                    @endif
                                    <a href="{{ $item['url'] }}" class="nav-link">{{ $item['title'] }}</a>
                                </li>
                                @endforeach
                                <li class="nav-item">
                                    <a class="btn btn-primary appoint-btn nav-link" href="">Pendaftaran Online</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<header class="mobile-header">
    <div class="panel-control-left">
        <a class="toggle-menu" href="javascript:;" data-target="side_menu"><i class="fas fa-bars"></i></a>
    </div>
    <div class="page_title">
        <a href="{{ route('home') }}">
            <img src="assets/img/logo.png" alt="Logo" class="img-fluid" width="60" height="60"></a>
    </div>
</header>

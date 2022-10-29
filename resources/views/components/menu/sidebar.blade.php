<div class="sidebar sidebar-menu" id="side_menu">
    <div class="sidebar-inner slimscroll">
        <a id="close_menu" href="javascript:;"><i class="fas fa-times"></i></a>
        <ul class="mobile-menu-wrapper" style="display: block;">
            @foreach ($menu as $item)
            @if ($item['hasChild'])
            <li class="{{ Request::segment(1) == $item['name'] ? ' active' : null }}">
                @else
            <li class="{{ Route::currentRouteName() == $item['name'] ? ' active' : null }}">
                @endif
                <div class="mobile-menu-item clearfix">
                    <a href="{{ $item['url'] }}">{{ $item['title'] }}</a>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>

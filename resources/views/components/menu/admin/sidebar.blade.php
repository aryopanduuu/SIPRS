<div class="main-sidebar sidebar-style-2">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="{{ route('admin.index') }}">Admin</a>
		</div>
		<div class="sidebar-brand sidebar-brand-sm">
			<a href="{{ route('admin.index') }}">A</a>
		</div>
		<ul class="sidebar-menu">
			@foreach ($menu as $header)
				@if (auth()->user()->hasRole($header['role']) || $header['role'] == 'any')
					<li class="menu-header">{{ $header['title'] }}</li>
				@endif
				@foreach ($header['menu'] as $item)
					@if (Route::currentRouteName() == $item['name'] ||
					    ($item['hasChild'] && Request::segment(2) == $item['prefixChild']))
						<li class="active">
						@elseif(isset($item['hasSubMenu']) && $item['hasSubMenu'])
						<li class="dropdown">
						@else
						<li>
					@endif
					@if (isset($item['hasSubMenu']) &&
					    $item['hasSubMenu'] &&
					    auth()->user()->hasRole($item['role'] || $item['role'] == 'any'))
						<a class="nav-link has-dropdown" data-toggle="dropdown" href="javascript:;">
							<i class="far fa-{{ $item['icon'] }}"></i><span>{{ $item['title'] }}</span>
						</a>
						<ul class="dropdown-menu">
							@foreach ($item['subMenu'] as $subItem)
								@if (Request::segment(2) == $subItem['prefix'][0] && Request::segment(3) == $subItem['prefix'][1])
									<li class="active">
									@else
									<li>
								@endif
								<a class="nav-link" href="{{ $subItem['url'] }}">{{ $subItem['title'] }}</a>
								</li>
							@endforeach
						</ul>
					@elseif(auth()->user()->hasRole($item['role']) || $item['role'] == 'any')
						<a class="nav-link" href="{{ $item['url'] }}">
							<i class="far fa-{{ $item['icon'] }}"></i><span>{{ $item['title'] }}</span>
						</a>
						</li>
					@endif
				@endforeach
			@endforeach
		</ul>
	</aside>
</div>

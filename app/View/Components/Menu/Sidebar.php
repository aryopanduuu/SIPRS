<?php

namespace App\View\Components\Menu;

use Illuminate\Support\Facades\Request;
use Illuminate\View\Component;

class Sidebar extends Component
{
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		if (Request::segment(1) != 'admin') {
			$view = 'components.menu.sidebar';
		} else {
			$view = 'components.menu.admin.sidebar';
		}
		return view($view);
	}
}

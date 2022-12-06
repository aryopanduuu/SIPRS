<?php

namespace App\View\Components\Menu;

use App\Models\Kontak;
use Illuminate\View\Component;

class Footer extends Component
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
		$kontak = Kontak::where('tipe', 'kontak')->get();
		$data = [];
		foreach ($kontak as $index => $item) {
			$data[$item->slug] = $item->konten;
		}

		$data = (object) $data;

		return view('components.menu.footer', compact('data'));
	}
}

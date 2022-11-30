<?php

return [
	'store_path' => public_path("/"),
	'aliases' => [
		// ...
		'DNS1D' => Milon\Barcode\Facades\DNS1DFacade::class,
		'DNS2D' => Milon\Barcode\Facades\DNS2DFacade::class,
	]
];

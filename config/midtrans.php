<?php

return [
	'mercant_id' => env('MIDTRANS_MERCHANT_ID'),
	'client_key' => env('MIDTRANS_IS_PRODUCTION') ? env('MIDTRANS_CLIENT_KEY') : env('MIDTRANS_SB_CLIENT_KEY'),
	'server_key' => env('MIDTRANS_IS_PRODUCTION') ? env('MIDTRANS_SERVER_KEY') : env('MIDTRANS_SB_SERVER_KEY'),

	'is_production' => env('MIDTRANS_IS_PRODUCTION', false),
	'is_sanitized' => false,
	'is_3ds' => false,
];

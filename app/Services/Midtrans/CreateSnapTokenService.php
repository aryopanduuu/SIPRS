<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;

class CreateSnapTokenService extends Midtrans
{
	protected $transaction;

	public function __construct($transaction)
	{
		parent::__construct();

		$this->transaction = $transaction;
	}

	public function getSnapToken()
	{
		$params = [
			'transaction_details' => [
				'order_id' => $this->transaction->kode_antrian,
				'gross_amount' => $this->transaction->price,
			],
			'customer_details' => $this->transaction->customer
		];

		$snapToken = Snap::getSnapToken($params);

		return $snapToken;
	}
}

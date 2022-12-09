<?php

namespace App\Services\Midtrans;

use Midtrans\Transaction;

class GetTransactionStatus extends Midtrans
{
	protected $orderId;

	public function __construct($orderId)
	{
		parent::__construct();

		$this->orderId = $orderId;
	}

	public function getStatus()
	{
		try {
			$status = Transaction::status($this->orderId);
			return $status;
		} catch (\Throwable $th) {
			return false;
		}
	}
}

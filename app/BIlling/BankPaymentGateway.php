<?php

namespace App\BIlling;

use Illuminate\Support\Str;

class BankPaymentGateway implements PaymentGatewayContract
{
    private $currency;
    private $discount;

    public function __construct($currency)
    {
        $this->currency = $currency;
        $this->discount = 0;
    }

    public function charge($amount)
    {
        return [
            'amount' => $amount - $this->discount,
            'confirmation_payment' => Str::random(),
            'currency' => $this->currency,
            'discount' => $this->discount
        ];
    }

    public function setDiscount($amount)
    {
        $this->discount = $amount;
    }

}

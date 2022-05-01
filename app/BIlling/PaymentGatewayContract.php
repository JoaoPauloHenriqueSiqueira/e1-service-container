<?php

namespace App\BIlling;

interface PaymentGatewayContract
{
    public function charge($amount);

    public function setDiscount($amount);
}

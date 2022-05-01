<?php

namespace App\Orders;

use App\BIlling\PaymentGatewayContract;

class OrderDetails
{
    private $paymentGateway;

    public function __construct(PaymentGatewayContract $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }

    public function all()
    {
        $this->paymentGateway->setDiscount(50);

        return [
            'name' => 'João',
            'address' => "123 Rua das andorinhas"
        ];
    }

}

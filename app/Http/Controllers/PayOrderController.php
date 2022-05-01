<?php

namespace App\Http\Controllers;

use App\BIlling\BankPaymentGateway;
use App\BIlling\PaymentGatewayContract;
use App\Orders\OrderDetails;
use Illuminate\Http\Request;

class PayOrderController extends Controller
{
    /**
     * #1 - this is the common way to use a another class:
     * We instance this class with a 'new' and use it methods
     *
     */
//    public function store()
//    {
//        $payment = new BankPaymentGateway();
//        return $payment->order(21);
//    }

    /**
     * @param BankPaymentGateway $paymentGateway
     * @return array
     *
     * #2 This is a second way use a another class
     * It doesnt need to create a new instance or anything like else
     * But if I have a parameter to pass at construct, It' will
     * be necessary inject on provider (We are using AppServiceProvider)
     */
//    public function store(BankPaymentGateway $paymentGateway)
//    {
//        return $paymentGateway->order(21);
//    }


//    public function store(BankPaymentGateway $paymentGateway)
//    {
//        return $paymentGateway->charge(21);
//    }

    public function store(OrderDetails $orderDetails, PaymentGatewayContract $paymentGateway)
    {
        $order = $orderDetails->all();
        return $paymentGateway->charge(200);
    }


}

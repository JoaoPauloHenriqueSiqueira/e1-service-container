<?php

namespace App\Providers;

use App\BIlling\BankPaymentGateway;
use App\BIlling\CreditPaymentPaymentGateway;
use App\BIlling\PaymentGatewayContract;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //#3 In this way, I'm creating a new instance every time
//        $this->app->bind(BankPaymentGateway::class, function($app){
//            return new BankPaymentGateway('usd');
//        });

        #4 I wasn't using interface Contract, It was just a single class (PaymentGateway)
//        $this->app->singleton(BankPaymentGateway::class, function ($app) {
//            return new BankPaymentGateway('usd');
//        });

        $this->app->singleton(PaymentGatewayContract::class, function ($app) {
            if (request()->has('credit')) {
                return new CreditPaymentPaymentGateway('usd');
            }
            return new BankPaymentGateway('usd');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

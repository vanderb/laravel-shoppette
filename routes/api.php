<?php


// API Routes
Route::group([
        'prefix' => 'api/shoppette/',
        'as.' => 'api.shoppette',
        'middleware' => \Vanderb\LaravelShoppette\Middleware\ProtectCartApi::class,
        'namespace' => 'Vanderb\LaravelShoppette\Controllers\FrontEnd'
    ],
    function(){
        //Vouchers
        Route::post('vouchers/validate','VoucherController@validateVoucher');
        Route::get('vouchers/details','VoucherController@show');
        //Cart functionality
        Route::get('cart/get','CartController@getCartById');
        Route::post('cart/add-item','CartController@addItem');
        Route::put('cart/update-item','CartController@updateItem');
        Route::delete('cart/remove-item','CartController@removeItem');
        //Checkout functionality
        Route::get('checkout','CheckoutController@getCheckout');
        Route::post('checkout/add-billing-address','CheckoutController@addBillingAddress');
        Route::post('checkout/add-shipping-address','CheckoutController@addShippingAddress');
        //Oder functionality
        //Route::post('order','OrderController@saveOrder');
    });

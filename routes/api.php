<?php


// API Routes
Route::group([
        'prefix' => 'api/shoppette/',
        'as.' => 'api.shoppette',
        'middleware' => ['protectCartApi'],
        'namespace' => 'Vanderb\LaravelShoppette\Controllers\FrontEnd'
    ],
    function(){
        //Vouchers
        Route::post('vouchers/validate','VoucherController@validateVoucher');
        Route::get('vouchers/details','VoucherController@show');
        //Cart functionality
        Route::get('cart/get','CartController@getCartById');
        Route::post('cart/add-item','CartController@addItem');
        Route::delete('cart/remove-item','CartController@removeItem');
        //Checkout functionality
        Route::get('checkout','CheckoutController@getCheckout');
        Route::post('checkout/add-billing-address','CheckoutController@addBillingAddress');
        Route::post('checkout/add-shipping-address','CheckoutController@addShippingAddress');
        //Oder functionality
        //Route::post('order','OrderController@saveOrder');
        Route::get('session-test', function(){
            dd(request()->get('cart_session'));
        });
    });

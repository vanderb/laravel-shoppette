<?php


// API Routes
Route::group([
        'prefix' => 'api/shoppette/',
        'middleware' => ['laravelShoppette'],
        'as.' => 'api.shoppette',
        'namespace' => 'Vanderb\Controllers'
    ],
    function(){
        //Vouchers
        Route::get('vouchers/validate/{code}','VoucherController@validateVoucher');
        Route::get('vouchers/{code}','VoucherController@show');
        //Cart functionality
        Route::get('cart/{$id}','CartController@getCartById');
        Route::post('cart/add-item','CartController@addItem');
        Route::delete('cart/remove-item','CartController@removeItem');
        //Checkout functionality
        Route::get('checkout','CheckoutController@getCheckout');
        Route::post('checkout/add-billing-address','CheckoutController@addBillingAddress');
        Route::post('checkout/add-shipping-address','CheckoutController@addShippingAddress');
        //Oder functionality
        Route::post('order','OrderController@saveOrder');
        
    });
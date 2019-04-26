<?php

namespace Vanderb\LaravelShoppette\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Vanderb\LaravelShoppette\Contracts\VoucherContract;
use Vanderb\LaravelShoppette\Contracts\CartContract;
use Vanderb\LaravelShoppette\Contracts\ShippingContract;
use Facades\Vanderb\LaravelShoppette\Contracts\Cart;

class CheckoutController extends Controller {
    
    public function addBillingAddress(Request $request){
        Cart::saveBillingAddress($request->except('cart_session'));
        return Cart::get();
    }
    
    public function addShippingAddress(Request $request){
        Cart::saveShippingAddress($request->except('cart_session'));
        return Cart::get();
    }
    
}
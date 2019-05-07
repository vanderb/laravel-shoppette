<?php

namespace Vanderb\LaravelShoppette\Services;

use Vanderb\LaravelShoppette\Contracts\CartSession as CartSessionContract;
use Vanderb\LaravelShoppette\Models\CartSession;

class CartSessionService implements CartSessionContract{
    
    public function create(): void {
        
        if(request()->bearerToken()){
            $session = CartSession::where('session_token', request()->bearerToken())->first();
            if(is_null($session)){
                $session = CartSession::create([
                    'session_token' => str_random(16)
                ]);
            }
        }
        else{
            $session = CartSession::create([
                    'session_token' => str_random(16)
                ]);
        }
        //Lazy load relationships
        $session->load(['cart_items.product', 'shipping_option', 'vouchers']);
        request()->request->add([
                'cart_session' => $session
        ]);

    }
    
}
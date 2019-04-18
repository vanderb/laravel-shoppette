<?php

namespace Vanderb\LaravelShoppette\Contracts;

use Vanderb\LaravelShoppette\Models\CartSession;

interface CartContract {
    
    public function createCartSession(): CartSession;
    
    public function getCartByToken(string $cart_token);
    
    public function getCartById(int $cart_session_id);
    
    public function addItemToCart(int $cart_session_id, array $item_data);
    
    public function removeItemFromCart(int $item_id);
    
    public function saveBillingAddressToCart(int $cart_session_id, array $billing_data);
    
    public function saveShippingAddressToCart(int $cart_session_id, array $shipping_data);

    public function generateSession();
    
}

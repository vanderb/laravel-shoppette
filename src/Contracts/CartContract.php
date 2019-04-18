<?php

namespace Vanderb\LaravelShoppette\Contracts;

interface CartContract {
    
    public function createCartSession();
    
    public function getCartById(int $cart_session_id);
    
    public function addItemToCart(int $cart_session_id, array $item_data);
    
    public function removeItemFromCart(int $cart_session_id, int $item_id);
    
    public function saveBillingAddressToCart(int $cart_session_id, array $billing_data);
    
    public function saveShippingAddressToCart(int $cart_session_id, array $shipping_data);
    
}
<?php

namespace Vanderb\LaravelShoppette\Services;

use Vanderb\LaravelShoppette\Contracts\CartContract;
use Vanderb\LaravelShoppette\Models\CartSession;
use Vanderb\LaravelShoppette\Models\CartItem;
use Vanderb\LaravelShoppette\Services\BaseService;

class CartService extends BaseService implements CartContract{
    
    protected $cart_items;
    
    public function __construct(CartSession $cart_session, CartItem $cart_item) {
        $this->model = $cart_session;
        $this->cart_items = $cart_item;
    }
    
    public function createCartSession(): CartSession {
        return $this->model->create([
            'session_token' => str_random(16)
        ]);
    }

    public function getCartByToken(string $cart_token): ?CartSession{
        return $this->model->where('session_token',$cart_token)->first();
    }

    public function getCartById(int $cart_session_id) {
        return $this->model->find($cart_session_id);
    }

    public function addItemToCart(int $cart_session_id, array $item_data) {
        return $this->cart_items->create(array_merge($item_data, ['cart_session_id' => $cart_session_id]));
    }

    public function removeItemFromCart(int $item_id) {
        $cart_item = $this->cart_items->where('id',$item_id)->first();
        if($cart_item){
            return $cart_item->delete();
        }
        return false;
    }

    public function saveBillingAddressToCart(int $cart_session_id, array $billing_data) {
        $cart_session = $this->model->find($cart_session_id);
        if($cart_session){
            return $cart_session->update([
                'billing_address' => $billing_data
            ]);
        }
        return false;
    }

    public function saveShippingAddressToCart(int $cart_session_id, array $shipping_data) {
        $cart_session = $this->model->find($cart_session_id);
        if($cart_session){
            return $cart_session->update([
                'shipping_address' => $billing_data
            ]);
        }
        return false;
    }

    public function generateSession() {
        return $this->model->create([
            'session_token' =>  str_random(16)
        ]);
    }

}
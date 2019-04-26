<?php

namespace Vanderb\LaravelShoppette\Services;

use Vanderb\LaravelShoppette\Contracts\Cart;
use Vanderb\LaravelShoppette\Models\CartSession;
use Vanderb\LaravelShoppette\Models\CartItem;
use Vanderb\LaravelShoppette\Classes\BillingAddress;
use Vanderb\LaravelShoppette\Classes\ShippingAddress;
use Vanderb\LaravelShoppette\Models\Voucher;
use Vanderb\LaravelShoppette\Exceptions\VoucherUsedException;

class CartService implements Cart{
    
    public function get(): CartSession{
        return request()->get('cart_session');
    }
    
    public function add(array $item): bool{
        $current_item = $this->getCartItem($item);
        if($current_item){
            $current_item->qty = $current_item->qty + $item['qty'];
            return $current_item->save();
        }
        $this->session()->cart_items()->save(new CartItem(array_merge($item, ['cart_session_id' => $this->session()->id])));
        return true;
    }
    
    public function update(array $item): bool{
        $current_item = $this->getCartItem($item);
        if($current_item){
            $current_item->qty = $item['qty'];
            return $current_item->save();
        }
        return false;
    }
    
    public function remove(int $item_id): bool{
        $cart_item = $this->session()->cart_items->where('id',$item_id)->first();
        if($cart_item){
            $cart_item->delete();
            return true;
        }
        return false;
    }
    
    public function saveBillingAddress(array $billing_address): bool{
        
    }
    
    public function billingAddress(): BillingAddress{
        
    }
    
    public function saveShippingAddress(array $shipping_address): bool{
        
    }
    
    public function shippingAddress(): ShippingAddress{
        
    }
    
    public function redeemVoucher(Voucher $voucher): bool {
        if($this->session()->vouchers->contains($voucher->id)){
            throw new VoucherUsedException('Voucher has already been used.');
        }
        $this->session()->vouchers()->attach($voucher);
        return true;
    }
    
    /***************************************************/
    private function getCartItem(array $item_data){
        return $this->session()
                ->cart_items
                ->where('product_id',$item_data['product_id'])
                ->first();
    }
    
    private function session(){
        return request()->cart_session;
    }
    
}
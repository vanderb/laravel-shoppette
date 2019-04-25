<?php

namespace Vanderb\LaravelShoppette\Models;

use Illuminate\Database\Eloquent\Model;
use Vanderb\LaravelShoppette\Classes\BillingAddress;
use Vanderb\LaravelShoppette\Classes\ShippingAddress;

class CartSession extends Model{

    protected $table = 'ls_cart_sessions';
    
    protected $fillable = [
        'session_token',
        'billing_address',
        'shipping_address'
    ];
    
    protected $appends = [
        'cart_total',
        'total_weight',
        'total_items'
    ];


    public function cart_items(){
        return $this->hasMany(CartItem::class);
    }
    
    public function vouchers(){
        return $this->belongsToMany(Voucher::class);
    }
    
    public function getShippingAddressAttribute($value){
        return new ShippingAddress($this->fromJson($value ?? '{}'));
    }
    
    public function getBillingAddressAttribute($value){
        return new BillingAddress($this->fromJson($value ?? '{}'));
    }
    
    public function getCartTotalAttribute(){
        return $this->cart_items->sum(function($item){
            return $item->product->price*$item->qty;
        });
    }
    
    public function getTotalItemsAttribute(){
        return $this->cart_items->count();
    }
    
    public function getTotalWeightAttribute(){
        return $this->cart_items->sum(function($item){
            return $item->product->weight*$item->qty;
        });
    }
    
}
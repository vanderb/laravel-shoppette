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
    
    public function cart_items(){
        return $this->hasMany(CartItem::class);
    }
    
    public function vouchers(){
        return $this->belongsToMany(Voucher::class);
    }
    
    public function getShippingAddressAttribute(){
        //return new ShippingAddress($this->fromJson($this->shipping_address ?? []));
    }
    
    public function getBillingAddress(){
        //return new BillingAddress($this->formJson($this->billing_address ?? []));
    }
    
}
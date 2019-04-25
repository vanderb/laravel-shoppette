<?php

namespace Vanderb\LaravelShoppette\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model{

    protected $table = 'ls_orders';

    protected $fillable = [
        'billing_address',
        'shipping_address',
        'shipping_option_id',
    ];

    public function order_items(){
        return $this->hasMany(OrderItem::class);
    }

    public function getShippingAddressAttribute(){
        return new ShippingAddress($this->fromJson($this->shipping_address ?? []));
    }

    public function getBillingAddress(){
        return new BillingAddress($this->formJson($this->billing_address ?? []));
    }
    
    public function shipping_option(){
        return $this->belongsTo(ShippingOption::class);
    }

}
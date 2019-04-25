<?php

namespace Vanderb\LaravelShoppette\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model{

    protected $table = 'ls_order_items';

    protected $fillable = [
        'order_id',
        'product_id',
        'price',
        'qty'
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function products(){
        return $this->belongsTo(Product::class);
    }

}
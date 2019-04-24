<?php

namespace Vanderb\LaravelShoppette\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model{

    protected $table = 'ls_cart_items';

    protected $fillable = [
        'cart_session_id',
        'product_id',
        'qty'
    ];
    
    public function cart_session(){
        return $this->belongsTo(CartSession::class);
    }
    
    public function product(){
        return $this->belongsTo(Product::class);
    }
    
}
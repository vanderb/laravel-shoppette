<?php

namespace Vanderb\LaravelShoppette\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model{
    
    protected $fillable = [
        'cart_session_id',
        'qty'
    ];
    
    public function cart_session(){
        return $this->belongsTo(CartSession::class);
    }
    
    public function products(){
        return $this->belongsToMany(Product::class);
    }
    
}
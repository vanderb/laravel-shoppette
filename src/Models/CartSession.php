<?php

namespace Vanderb\LaravelShoppette\Models;

use Illuminate\Database\Eloquent\Model;

class CartSession extends Model{

    protected $table = 'ls_cart_sessions';
    
    protected $fillable = [
        'session_id'
    ];
    
    public function cart_items(){
        return $this->hasMany(CartItem::class);
    }
    
    public function vouchers(){
        return $this->belongsToMany(Voucher::class);
    }
    
}
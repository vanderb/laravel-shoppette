<?php

namespace Vanderb\LaravelShoppette\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{

    protected $table = 'ls_products';
    
    protected $fillable = [
        'price',
        'photo',
        'listed',
        'active'
    ];
    
    public function discount(){
        return $this->hasOne(Discount::class);
    }
    
    public function cart_items(){
        return $this->belongsToMany(CartItem::class);
    }
    
    public function bundles(){
        return $this->belongsToMany(Product::class,'bundle_id','product_id');
    }
    
    public function bundled_products(){
        return $this->belongsToMany(Product::class,'product_id','bundle_id');
    }
    
    public function vouchers(){
        return $this->belongsToMany(Voucher::class);
    }
    
    public function sales(){
        return $this->belongsToMany(Sale::class);
    }
    
}
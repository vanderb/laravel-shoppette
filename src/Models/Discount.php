<?php

namespace Vanderb\LaravelShoppette\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model{
    
    protected $fillable = [
        'name',
        'discount_amount',
        'discount_percentage'
    ];
    
    public function products(){
        return $this->belongsToMany(Product::class);
    }
    
}
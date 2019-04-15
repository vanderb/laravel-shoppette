<?php

namespace Vanderb\LaravelShoppette\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model{
    
    protected $fillable = [
        'name',
        'discount_percentage',
        'starts_on',
        'ends_on'
    ];
    
    protected $dates = [
        'starts_on',
        'ends_on'
    ];
    
    public function products(){
        return $this->belongsToMany(Product::class);
    }
    
}
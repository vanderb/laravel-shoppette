<?php

namespace Vanderb\LaravelShoppette\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model{

    protected $table = 'ls_vouchers';

    protected $fillable = [
        'name',
        'discount_amount',
        'discount_percentage',
        'qty',
        'expired_on',
        'active'
    ];

    protected $dates = [
        'expired_on'
    ];

    public function products(){
        return $this->belongsToMany(Product::class);
    }

}
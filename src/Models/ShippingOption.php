<?php

namespace Vanderb\LaravelShoppette\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model{

    protected $table = 'ls_shipping_options';

    protected $fillable = [
        'name',
        'price',
        'max_weight',
        'price',
    ];

    public function order(){
        return $this->hasOne(Order::class);
    }

}
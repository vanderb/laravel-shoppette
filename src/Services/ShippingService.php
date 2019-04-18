<?php

namespace Vanderb\LaravelShoppette\Services;

use Vanderb\LaravelShoppette\Contracts\ShippingContract;
use Vanderb\LaravelShoppette\Models\ShippingOption;
use Vanderb\LaravelShoppette\Services\BaseService;

class ShippingService extends BaseService implements ShippingContract{
    
    public function __construct(ShippingOption $shipping_option) {
        $this->model = $shipping_option;
    }

    public function getShippingOptionByWeight(float $total_weight) {
        ;
    }
    
    public function checkValidForWeight(int $id, float $total_weight) {
        ;
    }
    
}
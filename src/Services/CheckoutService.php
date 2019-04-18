<?php

namespace Vanderb\LaravelShoppette\Services;

use Vanderb\LaravelShoppette\Contracts\CheckoutContract;
use Vanderb\LaravelShoppette\Services\BaseService;
use Vanderb\LaravelShoppette\Models\Order;

class CheckoutService extends BaseService implements CheckoutContract{

    public function __construct(Order $order) {
        $this->model = $order;
    }
    
    public function saveOrder(array $order_data) {
        ;
    }
    
}

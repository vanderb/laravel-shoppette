<?php

namespace Vanderb\LaravelShoppette\Contracts;

interface OrderContract {
    
    public function saveOrder(array $order_data);
    
}

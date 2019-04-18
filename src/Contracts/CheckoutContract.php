<?php

namespace Vanderb\LaravelShoppette\Contracts;

interface CheckoutContract {
    
    public function saveOrder(array $order_data);
    
}

<?php

namespace Vanderb\LaravelShoppette\Contracts;

interface PaymentContract {
    
    /**
     * Send payment details and total price to be processed by payment solution
     * @param array $payment_data
     * @param float $total_price
     */
    public function processPayment(array $payment_data, float $total_price);
    
}
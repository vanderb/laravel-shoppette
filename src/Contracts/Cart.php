<?php

namespace Vanderb\LaravelShoppette\Contracts;

use Vanderb\LaravelShoppette\Models\CartSession;
use Vanderb\LaravelShoppette\Classes\BillingAddress;
use Vanderb\LaravelShoppette\Classes\ShippingAddress;
use Vanderb\LaravelShoppette\Models\Voucher;

interface Cart {
    
    public function get(): CartSession;
    
    public function add(array $item): bool;
    
    public function update(array $item): bool;
    
    public function remove(int $item_id): bool;
    
    public function saveBillingAddress(array $billing_address): bool;
    
    public function billingAddress(): BillingAddress;
    
    public function saveShippingAddress(array $shipping_address): bool;
    
    public function shippingAddress(): ShippingAddress;
    
    public function redeemVoucher(Voucher $voucher): bool;
    
}
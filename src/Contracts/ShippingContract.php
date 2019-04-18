<?php

namespace Vanderb\LaravelShoppette\Contracts;

interface ShippingContract {
    
    /**
     * Get shipping option for given total weight of order
     * @param float $total_weight
     */
    public function getShippingOptionByWeight(float $total_weight);
    
    /**
     * Check if the selected shipping option is still valid for the given weight.
     * @param int $id
     * @param float $total_weight
     */
    public function checkValidForWeight(int $id,float $total_weight): bool;
    
}
<?php

namespace Vanderb\LaravelShoppette\Contracts;

interface VoucherContract {
    
    public function validateVoucher(string $voucher_code): bool;
    
    public function getVoucherDetails(string $voucher_code);
    
    public function getVoucherById(int $id);
    
    public function createVoucher(array $data);
    
    public function updateVoucher(int $id, array $data);
    
}

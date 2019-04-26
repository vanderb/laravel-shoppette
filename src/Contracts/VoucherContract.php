<?php

namespace Vanderb\LaravelShoppette\Contracts;
use Vanderb\LaravelShoppette\Models\Voucher;

interface VoucherContract {
    
    public function validateVoucher(string $voucher_code): ?Voucher;
    
    public function getVoucherDetails(string $voucher_code);
    
    public function getVoucherById(int $id);
    
    public function createVoucher(array $data);
    
    public function updateVoucher(int $id, array $data);
    
}

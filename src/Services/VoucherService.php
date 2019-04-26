<?php

namespace Vanderb\LaravelShoppette\Services;

use Vanderb\LaravelShoppette\Contracts\VoucherContract;
use Vanderb\LaravelShoppette\Models\Voucher;
use Vanderb\LaravelShoppette\Services\BaseService;

class VoucherService extends BaseService implements VoucherContract{
    
    public function __construct(Voucher $voucher) {
        $this->model = $voucher;
    }

    public function validateVoucher(string $voucher_code): ?Voucher{
        return $this->model
                ->where('expires_on','>=',now()->format('Y-m-d'))
                ->where('code',$voucher_code)
                ->where('active',1)
                ->first();
    }
    
    public function getVoucherDetails(string $voucher_code){
        return $this->model
                ->where('code',$voucher_code)
                ->first();
    }
    
    public function getVoucherById(int $id){
        return $this->model->find($id);
    }
    
    public function createVoucher(array $data){
        return $this->model->create($data);
    }
    
    public function updateVoucher(int $id, array $data){
        $voucher = $this->model->find($id);
        if($voucher){
            return $voucher->update($data);
        }
        return false;
    }
    
}

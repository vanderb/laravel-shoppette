<?php

namespace Vanderb\LaravelShoppette\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Vanderb\LaravelShoppette\Contracts\VoucherContract;
use Vanderb\LaravelShoppette\Events\VoucherRedeemed;

class OrderController extends Controller {
    
    public function validateVoucher(Request $request, VoucherContract $vouchers){
        if($voucher = $vouchers->validateVoucher($request->get('code'))){
            event(new VoucherRedeemed($voucher->id, $cart_session));
            return $voucher;
        }
        return null;
    }
    
    public function show(Request $request, VoucherContract $vouchers){
        return $vouchers->getVoucherDetails($request->get('code'));
    }
    
}
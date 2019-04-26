<?php

namespace Vanderb\LaravelShoppette\Controllers\FrontEnd;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Vanderb\LaravelShoppette\Contracts\CartContract;
use Vanderb\LaravelShoppette\Contracts\VoucherContract;
use Facades\Vanderb\LaravelShoppette\Contracts\Cart;

class VoucherController extends Controller {
    
    public function validateVoucher(Request $request, VoucherContract $vouchers){
        try {
            
            if($voucher = $vouchers->validateVoucher($request->get('code'))) {
                Cart::redeemVoucher($voucher);
            }

            return Cart::get();
        } catch (Exception $ex) {
            return response()->json(['error'=>$ex->getMessage()],500);
        }
    }

    public function show(Request $request, VoucherContract $vouchers){
        return $vouchers->getVoucherDetails($request->get('code'));
    }

}
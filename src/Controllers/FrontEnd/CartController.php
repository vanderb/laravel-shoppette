<?php

namespace Vanderb\LaravelShoppette\Controllers\FrontEnd;

use Facades\Vanderb\LaravelShoppette\Contracts\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Vanderb\LaravelShoppette\Contracts\CartContract;
use Vanderb\LaravelShoppette\Events\CartUpdated;
use Exception;

class CartController extends Controller {

    public function getCartById() {
        logger('Getting cart!');
        return response()->json(Cart::get());
    }

    public function addItem(Request $request) {
        try{
            Cart::add($request->except(['cart_session']));
            event(new CartUpdated());
            return Cart::get();
        } catch (Exception $ex) {
            return response()->json(['error'=>$ex->getMessage()],500);
        }
    }

    public function updateItem(Request $request) {
        try{
            Cart::update($request->except('cart_session'));
            event(new CartUpdated());
            return Cart::get();
        } catch (Exception $ex) {
            return response()->json(['error'=>$ex->getMessage()],500);
        }
    }

    public function removeItem(Request $request) {
        try{
            Cart::remove($request->get('cart_item_id'));
            event(new CartUpdated());
            return Cart::get();
        } catch (Exception $ex) {
            return response()->json(['error'=>$ex->getMessage()],500);
        }
    }

}
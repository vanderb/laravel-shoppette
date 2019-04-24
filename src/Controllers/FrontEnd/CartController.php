<?php

namespace Vanderb\LaravelShoppette\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Vanderb\LaravelShoppette\Contracts\CartContract;
use Exception;

class CartController extends Controller {

    public function getCartById(Request $request) {
        return response()->json($request->get('cart_session'));
    }

    public function addItem(Request $request, CartContract $cart) {
        try{
            $cart->addItemToCart($request->cart_session->id, $request->except(['cart_session']));
            return $cart->getCartByToken( $request->bearerToken() );
        } catch (Exception $ex) {
            return response()->json(['error'=>$ex->getMessage()],500);
        }
    }

    public function removeItem(Request $request, CartContract $cart) {
        try{
            $cart->removeItemFromCart($request->get('cart_item_id'));
            return $cart->getCartByToken( $request->bearerToken() );
        } catch (Exception $ex) {
            return response()->json(['error'=>$ex->getMessage()],500);
        }
    }

}
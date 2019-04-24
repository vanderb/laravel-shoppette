<?php

namespace Vanderb\LaravelShoppette\Middleware;

use Closure;
use Vanderb\LaravelShoppette\Contracts\CartContract;

class ProtectCartApi {

    protected $cart;

    public function __construct(CartContract $cart)
    {
        $this->cart = $cart;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        $session = $this->cart->getCartByToken( $request->bearerToken() );

        if(is_null($session)) {
            $session = $this->cart->generateSession();
        }

        $request->request->add(['cart_session' => $session]);

        return $next($request);
    }
}
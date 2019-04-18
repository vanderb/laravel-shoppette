<?php

namespace Vanderb\LaravelShoppette\Middleware;

use Closure;
use Frogbob\LaravelCartSession\Contracts\CartContract;

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

        $session = $this->getCartById( $request->bearerToken() );

        if(!$session) {
            $session = $this->cart->generateSession();
        }

        $request->request->add(['cart_session' => $session]);

        return $next($request);
    }
}
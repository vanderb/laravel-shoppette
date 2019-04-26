<?php

namespace Vanderb\LaravelShoppette\Middleware;

use Closure;
use Facades\Vanderb\LaravelShoppette\Contracts\CartSession;

class ProtectCartApi {

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
        CartSession::create();
        return $next($request);
    }
}
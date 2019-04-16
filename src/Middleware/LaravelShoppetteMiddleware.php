<?php

namespace Vanderb\LaravelShoppette\Middleware;

use Closure;

class LaravelShoppetteMiddleware {

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

        // Get current

        // If no session found create new

        // Add cart_session to request
        // $request->request->add(['cart_session' => $session]);

        return $next($request);
    }
}
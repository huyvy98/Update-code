<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson() && !Auth::guard('admin')->check()) {
            return route('auth.show');
        } elseif (!Auth::guard('admin')->user()->hasRole('SuperAdmin')) {
            return route('products.index');
        }
        return $request;
    }
//    public function handle($request, Closure $next, ...$guards)
//    {
//        if (!$request->expectsJson() && !Auth::guard('admin')->check()) {
//            return route('auth.show');
//        } elseif (!Auth::guard('admin')->user()->hasRole('SuperAdmin')) {
//            return route('products.index');
//        }
//        return $next($request);
//    }
}

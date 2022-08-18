<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Traits\HasRoles;


class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
//        if (Auth::guard('admin')->user()->hasRole('SuperAdmin')) {
//            return Redirect::route('admin.index');
//        } else {
//            return Redirect::route('products.index');
//        }

        return $next($request);
    }
}

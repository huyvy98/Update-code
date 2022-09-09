<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ApiAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param $userType
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next, $userType)
    {
        if(Auth::guard('api')->check()){
            return $next($request);
        }

        return response()->json(['Permission Denied'],401);
    }

}

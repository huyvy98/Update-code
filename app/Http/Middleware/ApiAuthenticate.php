<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class ApiAuthenticate extends Middleware
{
    /**
     * @param $request
     * @return void
     */
    protected function redirectTo($request)
    {
        dd(Auth::guard('api')->check());
    }

}

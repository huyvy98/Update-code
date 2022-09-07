<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiAuthenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  Request  $request
     * @return string|null
     */
    protected function redirectTo($request): ?string
    {
        if(! $request->expectsJson()){
            return route('login.user');
        }
        return null;
    }

    protected function authenticate($request, array $guards)
    {
        if($this->auth->guard('api')->check()){
            return $this->auth->shouldUse('api');
        }

        $this->unauthenticated($request, ['api']);
    }
}

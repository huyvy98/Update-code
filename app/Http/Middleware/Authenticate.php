<?php

namespace App\Http\Middleware;

use App\Exceptions\ApiException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Handle an unauthenticated user.
     *
     * @param Request $request
     * @param array $guards
     * @return void
     *
     * @throws AuthenticationException
     */
    protected function unauthenticated($request, array $guards)
    {
        if ($guards[0] === 'admin') {
            throw new AuthenticationException(
                'Unauthenticated.', $guards, $this->redirectTo($request)
            );
        } elseif ($guards[0] === 'api') {
            throw new ApiException(
                '401', 'Unauthorized'
            );
        }
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param Request $request
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('auth.showLoginForm');
        }
    }
}

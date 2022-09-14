<?php

namespace Modules\Admin\Services;


use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Modules\Admin\Contracts\Services\AuthService;
use Modules\Admin\Http\Requests\LoginRequest;

class AuthServiceImpl implements AuthService
{
    /**
     * Login admin
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only(['email', 'password']);
        if (Auth::guard('admin')->attempt($credentials)) {
            return Redirect::route('products.index');
        } else {
            session()->flash('error', 'Email or Password is incorrect');

            return Redirect::back()->withInput();
        }
    }

    /**
     * Logout admin
     *
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::guard('admin')->logout();

        return Redirect::route('auth.showLoginForm');
    }
}

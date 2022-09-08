<?php

namespace Modules\Admin\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Modules\Admin\Contracts\Services\AuthService;
use Modules\Admin\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    /**
     * @var AuthService
     */
    public AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Show form login
     *
     * @return View
     */
    public function show(): View
    {
        return view('admin::auth.login');
    }

    /**
     * Login
     *
     * @param  LoginRequest  $request
     * @return RedirectResponse
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        return $this->authService->login($request);
    }

    /**
     * Logout
     *
     * @return RedirectResponse
     */
    public function logout():RedirectResponse
    {
        return $this->authService->logout();
    }
}

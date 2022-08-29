<?php

namespace Modules\Admin\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Modules\Admin\Contracts\Services\LoginService;
use Modules\Admin\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    /**
     * @var LoginService
     */
    public LoginService $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
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
        return $this->loginService->login($request);
    }

    /**
     * @return RedirectResponse
     */
    public function logout():RedirectResponse
    {
        return $this->loginService->logout();
    }
}

<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Modules\User\Contracts\Services\AuthService;
use Modules\User\Http\Requests\LoginUserRequest;

class LoginController extends Controller
{
    /**
     * @var AuthService
     */
    public AuthService $authService;

    /**
     * @param  AuthService  $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Show the specified resource.
     * @return View
     */
    public function show(): View
    {
        return view('user::users.login');
    }

    /**
     * Show the form for editing the specified resource.
     * @param  LoginUserRequest  $request
     * @return mixed
     */
    public function login(LoginUserRequest $request)
    {
        return $this->authService->login($request);
    }

}

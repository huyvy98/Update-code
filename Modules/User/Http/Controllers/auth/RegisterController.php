<?php

namespace Modules\User\Http\Controllers\auth;

use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Modules\User\Contracts\Services\AuthService;
use Modules\User\Http\Requests\RegisterUserRequest;

class RegisterController extends Controller
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
        return view('user::users.register');
    }

    public function register(RegisterUserRequest $request)
    {
        $user = $this->authService->register($request);

        return view('user::users.register');
    }
}

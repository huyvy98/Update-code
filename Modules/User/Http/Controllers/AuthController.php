<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Contracts\Services\AuthService;
use Modules\User\Http\Requests\LoginUserRequest;
use Modules\User\Http\Requests\RegisterUserRequest;

class AuthController extends Controller
{
    /**
     * @var AuthService
     */
    public AuthService $authService;

    /**
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginUserRequest $request)
    {
        return $this->authService->login($request);
    }

    public function register(RegisterUserRequest $request)
    {
        if (!$request->validated()) {
            return response()->json($request->errors(), 422);
        }
        return $this->authService->registerUser($request);
    }

    public function logout()
    {
        return $this->authService->logout();
    }
}

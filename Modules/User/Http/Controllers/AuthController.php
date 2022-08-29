<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\User\Contracts\Services\AuthService;
use Modules\User\Http\Requests\LoginUserRequest;
use Modules\User\Http\Requests\RegisterUserRequest;
use Modules\User\Transformers\AuthResource;

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

    public function login(LoginUserRequest $request): AuthResource
    {
        $data = $this->authService->login($request);

        return AuthResource::make($data);
    }

    public function register(RegisterUserRequest $request): AuthResource
    {
        $data = $this->authService->registerUser($request);

        return AuthResource::make($data);
    }

    public function logout(): AuthResource
    {
        $data = $this->authService->logout();

        return AuthResource::make($data);
    }
}

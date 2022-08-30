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

    /**
     * @param LoginUserRequest $request
     * @return AuthResource
     */
    public function login(LoginUserRequest $request): AuthResource
    {
        $data = $this->authService->login($request);

        return AuthResource::make($data);
    }

    /**
     * @param RegisterUserRequest $request
     * @return AuthResource
     */
    public function register(RegisterUserRequest $request): AuthResource
    {
        $data = $this->authService->registerUser($request);

        return AuthResource::make($data);
    }

    /**
     * @return AuthResource
     */
    public function logout()
    {
        $this->authService->logout();
    }
}

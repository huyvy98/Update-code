<?php

namespace Modules\User\Contracts\Services;

use Modules\User\Http\Requests\LoginUserRequest;
use Modules\User\Http\Requests\RegisterUserRequest;
use Modules\User\Transformers\AuthResource;

interface AuthService
{
    /**
     * @param  LoginUserRequest  $request
     * @return AuthResource
     */
    public function login(LoginUserRequest $request): AuthResource;

    /**
     * @param  RegisterUserRequest  $request
     * @return AuthResource
     */
    public function registerUser(RegisterUserRequest $request): AuthResource;

    /**
     * @return AuthResource
     */
    public function logout(): AuthResource;
}

<?php

namespace Modules\User\Contracts\Services;

use App\Models\User;
use Modules\User\Http\Requests\LoginUserRequest;
use Modules\User\Http\Requests\RegisterUserRequest;

interface AuthService
{
    /**
     * @param  LoginUserRequest  $request
     * @return mixed
     */
    public function login(LoginUserRequest $request);

    /**
     * @param  RegisterUserRequest  $request
     * @return User
     */
    public function register(RegisterUserRequest $request): User;
}

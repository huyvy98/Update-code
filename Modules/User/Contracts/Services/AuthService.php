<?php

namespace Modules\User\Contracts\Services;

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
     * @return mixed
     */
    public function registerUser(RegisterUserRequest $request);

    /**
     * @return mixed
     */
    public function logout();
}

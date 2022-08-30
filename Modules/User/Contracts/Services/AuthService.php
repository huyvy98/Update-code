<?php

namespace Modules\User\Contracts\Services;

use App\Models\User;
use Modules\User\Http\Requests\LoginUserRequest;
use Modules\User\Http\Requests\RegisterUserRequest;
use Modules\User\Repositories\Auth;

interface AuthService
{
    /**
     * Login user
     *
     * @param LoginUserRequest $request
     * @return Auth
     */
    public function login(LoginUserRequest $request): Auth;

    /**
     * Register user
     *
     * @param RegisterUserRequest $request
     * @return User
     */
    public function registerUser(RegisterUserRequest $request): User;

    /**
     * Logout
     *
     * @return void
     */
    public function logout(): void;
}

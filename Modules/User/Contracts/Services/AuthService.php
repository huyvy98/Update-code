<?php

namespace Modules\User\Contracts\Services;

use App\Models\User;
use Modules\User\Http\Requests\LoginUserRequest;
use Modules\User\Http\Requests\RegisterUserRequest;

interface AuthService
{
    /**
     * Login user
     *
     * @param LoginUserRequest $request
     * @return array
     */
    public function login(LoginUserRequest $request): array;

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

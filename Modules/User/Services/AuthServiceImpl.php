<?php

namespace Modules\User\Services;

use App\Exceptions\ApiException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Modules\User\Contracts\Repositories\Mysql\UserRepository;
use Modules\User\Contracts\Services\AuthService;
use Modules\User\Http\Requests\LoginUserRequest;
use Modules\User\Http\Requests\RegisterUserRequest;
use Illuminate\Support\Facades\Auth;

class AuthServiceImpl implements AuthService
{
    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param LoginUserRequest $request
     * @return array
     */
    public function login(LoginUserRequest $request): array
    {
        $credentials = $request->only(['email', 'password']);
        $token = auth('api')->attempt($credentials);
        if (!$token) {
            throw ApiException::forbidden('Email or password was incorrect');
        }
        return ['access_token' => $token];
    }

    /**
     * @param RegisterUserRequest $request
     * @return User
     */
    public function registerUser(RegisterUserRequest $request): User
    {
        if ($request->get('password_confirmation') == $request->get('password')) {
            $user = new User();
            $user->firstname = $request->input('firstname');
            $user->lastname = $request->input('lastname');
            $user->address = $request->input('address');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->password = Hash::make($request->input('password'));
            $data = $this->userRepository->save($user);
        }

        return $data;
    }

    /**
     * @return void
     */
    public function logout(): void
    {
        Auth::guard('api')->logout();
    }
}

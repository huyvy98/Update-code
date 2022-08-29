<?php

namespace Modules\User\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Modules\User\Contracts\Repositories\Mysql\AuthRepository;
use Modules\User\Contracts\Services\AuthService;
use Modules\User\Http\Requests\LoginUserRequest;
use Modules\User\Http\Requests\RegisterUserRequest;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthServiceImpl implements AuthService
{
    /**
     * @var AuthRepository
     */
    private AuthRepository $authRepository;

    /**
     * @param AuthRepository $authRepository
     */
    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    /**
     * @param LoginUserRequest $request
     * @return mixed
     */
    public function login(LoginUserRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        $token = auth('api')->attempt($credentials);
        if (!$token) {
            $error = ['error' => 'Email hoặc mật khẩu không đúng!!'];

            return $error;
        }

        return $this->createNewToken($token);
    }

    /**
     * @param RegisterUserRequest $request
     * @return mixed
     */
    public function registerUser(RegisterUserRequest $request)
    {
        $user = new User();
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->address = $request->input('address');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->password = Hash::make($request->input('password'));
        $data = $this->authRepository->save($user);

        return $data;
    }

    /**
     * @return mixed
     */
    public function logout()
    {
        Auth::logout();
        Session::flush();
        $message = ['message' => 'User successfully signed out'];

        return $message;
    }

    /**
     * @param $token
     * @return mixed
     */
    public function createNewToken($token)
    {
        $data = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->guard('api')->user()
        ];

        return $data;
    }

    /**
     * Refresh a token.
     *
     * @return mixed
     */
    public function refresh()
    {
        return $this->createNewToken(auth()->refresh());
    }
}

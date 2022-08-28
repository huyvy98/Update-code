<?php

namespace Modules\User\Services;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Modules\User\Contracts\Repositories\Mysql\AuthRepository;
use Modules\User\Contracts\Services\AuthService;
use Modules\User\Http\Requests\LoginUserRequest;
use Modules\User\Http\Requests\RegisterUserRequest;
use Modules\User\Transformers\AuthResource;

class AuthServiceImpl implements AuthService
{
    /**
     * @var AuthRepository
     */
    private AuthRepository $authRepository;

    /**
     * @param  AuthRepository  $authRepository
     */
    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    /**
     * @param  LoginUserRequest  $request
     * @return AuthResource
     */
    public function login(LoginUserRequest $request): AuthResource
    {
        if (!$request->validated()) {
            return AuthResource::make($request);
        }
        $credentials = $request->only(['email', 'password']);
        if (!$token = Auth::attempt($credentials)) {
            $error = ['error' => 'Email hoặc mật khẩu không đúng!!'];
            return AuthResource::make($error);
        }
        $tokenCreate = $this->createNewToken($token);

        return AuthResource::make($tokenCreate);
    }

    /**
     * @param  RegisterUserRequest  $request
     * @return AuthResource
     */
    public function registerUser(RegisterUserRequest $request): AuthResource
    {
        if (!$request->validated()) {
            return AuthResource::make($request);
        }

        $user = new User();
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->address = $request->input('address');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->password = Hash::make($request->input('password'));
        $data = $this->authRepository->save($user);

        return AuthResource::make($data);
    }

    public function logout(): AuthResource
    {
        Auth::logout();
        $message = ['message' => 'User successfully signed out'];

        return AuthResource::make($message);
    }

    /**
     * @param $token
     * @return AuthResource
     */
    public function createNewToken($token): AuthResource
    {
        $data = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'user' => auth()->user()
        ];
        return AuthResource::make($data);
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

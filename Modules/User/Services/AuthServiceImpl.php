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
     * @return JsonResponse
     */
    public function login(LoginUserRequest $request): JsonResponse
    {
        if(!$request->validated()){
            return response()->json($request->errors());
        }
        $credentials = $request->only(['email', 'password']);
        if (! $token = Auth::attempt($credentials)) {
            return response()->json(['error' => 'Email hoặc mật khẩu không đúng!!'], 401);
        }
        return $this->createNewToken($token);
    }

    /**
     * @param RegisterUserRequest $request
     * @return JsonResponse
     */
    public function registerUser(RegisterUserRequest $request): JsonResponse
    {
        if(!$request->validated()){
            return response()->json($request->errors());
        }
            $user = new User();
            $user->firstname = $request->input('firstname');
            $user->lastname = $request->input('lastname');
            $user->address = $request->input('address');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->password = Hash::make($request->input('password'));
            $data = $this->authRepository->save($user);

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $data
        ], 201);
    }

    public function logout(): JsonResponse
    {
        Auth::logout();

        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * @param $token
     * @return JsonResponse
     */
    public function createNewToken($token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'user' => auth()->user()
        ]);
    }

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }
}

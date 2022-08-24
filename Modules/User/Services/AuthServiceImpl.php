<?php

namespace Modules\User\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
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
     * @return mixed|void
     */
    public function login(LoginUserRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials)) {
            return response()->json([
                'status' => '200',
                'message' => 'Login Success'
            ]);
        } else {
            return response()->json([
                'status' => '400',
                'message' => 'Fails'
            ]);
        }
        $this->createNewToken($token);
    }

    /**
     * @param RegisterUserRequest $request
     * @return User
     */
    public function register(RegisterUserRequest $request): User
    {
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
}

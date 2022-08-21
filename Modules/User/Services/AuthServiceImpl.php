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
     * @param  AuthRepository  $authRepository
     */
    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    /**
     * @param  LoginUserRequest  $request
     * @return mixed|void
     */
    public function login(LoginUserRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials)) {
            return Redirect::route('user.index');
        } else {
            return Redirect::back()->withInput();
        }
    }

    /**
     * @param  RegisterUserRequest  $request
     * @return User
     */
    public function register(RegisterUserRequest $request): User
    {
        return $this->create($request);
    }

    /**
     * @param  RegisterUserRequest  $request
     * @return User
     */
    public function create(RegisterUserRequest $request): User
    {
        if ($request->input('password') === $request->input('password_conf')) {
            $user = new User();
            $user->firstname = $request->input('firstname');
            $user->lastname = $request->input('lastname');
            $user->address = $request->input('address');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->password = Hash::make($request->input('password'));
            $data = $this->authRepository->save($user);
        }
        return $data;
    }
}

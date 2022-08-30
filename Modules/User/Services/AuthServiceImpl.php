<?php

namespace Modules\User\Services;

use App\Exceptions\ApiException;
use App\Models\User;
use App\Securities\Authentications\AuthenticationManager;
use App\Securities\Authentications\BasicAuthentication;
use Illuminate\Support\Facades\Hash;
use Modules\Api\Constants\UserStatus;
use Modules\User\Contracts\Repositories\Mysql\AuthRepository;
use Modules\User\Contracts\Services\AuthService;
use Modules\User\Http\Requests\LoginUserRequest;
use Modules\User\Http\Requests\RegisterUserRequest;
use Modules\User\Repositories\Auth;

class AuthServiceImpl implements AuthService
{
    /**
     * @var AuthRepository
     */
    private AuthRepository $authRepository;

    /** @var AuthenticationManager */
    private AuthenticationManager $authenticationManager;

    /**
     * @param AuthRepository $authRepository
     * @param AuthenticationManager $authenticationManager
     */
    public function __construct(AuthRepository $authRepository, AuthenticationManager $authenticationManager)
    {
        $this->authRepository = $authRepository;
        $this->authenticationManager = $authenticationManager;
    }

    /**
     * @param LoginUserRequest $request
     * @return Auth
     */
    public function login(LoginUserRequest $request): Auth
    {
        $basicAuth = new BasicAuthentication("api", $request->get('email'), $request->get('password'));
        $authenticatedObject = $this->authenticationManager->authenticate($basicAuth);
        if ($authenticatedObject->getUserDetails()->status === UserStatus::INACTIVE) {
            throw ApiException::forbidden('Your account has been disabled');
        }

        /**
         * @var Auth $authToken
         */
        $authToken = $authenticatedObject->getAuthenticatedCertificates();

        return $authToken;
    }

    /**
     * @param RegisterUserRequest $request
     * @return User
     */
    public function registerUser(RegisterUserRequest $request): User
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
     * @return void
     */
    public function logout(): void
    {
        Auth::logout();
    }

//    /**
//     * @param $token
//     * @return mixed
//     */
//    public function createNewToken($token)
//    {
//        $data = [
//            'access_token' => $token
//        ];
//
//        return $data;
//    }
//
//    /**
//     * Refresh a token.
//     *
//     * @return mixed
//     */
//    public function refresh()
//    {
//        return $this->createNewToken(auth()->refresh());
//    }
}

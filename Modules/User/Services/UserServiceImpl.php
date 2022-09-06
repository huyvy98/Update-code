<?php

namespace Modules\User\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Modules\User\Contracts\Repositories\Mysql\UserRepository;
use Modules\User\Contracts\Services\UserService;

class UserServiceImpl implements UserService
{

    /**
     * @var UserRepository $userRepository
     */
    protected UserRepository $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return array
     */
    public function getUserById(): array
    {
        $id = Auth::guard('api')->user()->id;

        $user = $this->userRepository->findById($id)->toArray();

        return $user;

    }
}

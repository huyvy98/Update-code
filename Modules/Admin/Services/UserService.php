<?php

namespace Modules\Admin\Services;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use Modules\Admin\Repositories\User\UserRepository;

class UserService
{
    /**
     * @var UserRepository $userRepository
     */
    protected UserRepository $userRepository;

    /**
     * UserService constructor
     * @param  UserRepository  $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Get all user
     *
     * @return String
     */
    public function getAll(): string
    {
        return $this->userRepository->getAllUser();
    }

    /**
     * Validate user data
     * @param  array  $data
     * @return String
     */
    public function saveUsertData(array $data): string
    {
        $validator = Validator::make($data, [
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'image' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }
        $result = $this->userRepository->save($data);

        return $result;
    }
}

<?php

namespace Modules\Admin\Services;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Contracts\Repositories\Mysql\UserRepository;
use Modules\Admin\Contracts\Services\UserService;
use Modules\Admin\Http\Requests\AdminRequest;
use Modules\Admin\Http\Requests\UserRequest;

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
     * get all user
     *
     * @return LengthAwarePaginator
     */
    public function getUser(): LengthAwarePaginator
    {
        return $this->userRepository->get();
    }

    /**
     * save user
     *
     * @param UserRequest $request
     * @return User
     */
    public function saveUser(UserRequest $request): User
    {
        $user = new User();
        $user->assignRole('User');
        $user->firstname = $request->get('firstname');
        $user->lastname = $request->get('lastname');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');
        $user->password = Hash::make($request->get('password'));

        $this->userRepository->save($user);

        return $user;
    }

    /**
     * update user
     *
     * @param UserRequest $request
     * @param int $id
     * @return User
     */
    public function updateUser(UserRequest $request, int $id): User
    {
        $user = $this->userRepository->findById($id);

        $user->firstname = $request->get('firstname');
        $user->lastname = $request->get('lastname');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');
        if (empty($request->get('password'))) {
            $user->password = $request->get(old('password'));
        } else {
            $user->password = Hash::make($request->get('password'));
        }

        return $this->userRepository->update($user);
    }

    /**
     * get id user to edit
     *
     * @param int $id
     * @return User|null
     */
    public function editUser(int $id): ?User
    {
        return $this->userRepository->findById($id);
    }

    /**
     * delete user
     *
     * @param int $id
     * @return void
     */
    public function destroyUser(int $id): void
    {
        $this->userRepository->destroy($id);
    }
}

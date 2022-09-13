<?php

namespace Modules\Admin\Contracts\Services;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Admin\Http\Requests\UserRequest;

interface UserService
{
    /**
     * get all user
     *
     * @return LengthAwarePaginator
     */
    public function getUser(): LengthAwarePaginator;

    /**
     * save user
     *
     * @param UserRequest $request
     * @return User
     */
    public function saveUser(UserRequest $request): User;

    /**
     * update user
     *
     * @param UserRequest $request
     * @param int $id
     * @return User
     */
    public function updateUser(UserRequest $request, int $id): User;

    /**
     * edit user
     *
     * @param int $id
     * @return User|null
     */
    public function editUser(int $id): ?User;

    /**
     * delete user
     *
     * @param int $id
     * @return void
     */
    public function destroyUser(int $id): void;
}

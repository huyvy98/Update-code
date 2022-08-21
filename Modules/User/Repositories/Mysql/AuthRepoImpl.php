<?php

namespace Modules\User\Repositories\Mysql;

use App\Models\User;
use Modules\User\Contracts\Repositories\Mysql\AuthRepository;

class AuthRepoImpl implements AuthRepository
{
    /**
     * @param  int  $id
     * @return User|null
     */
    public function findById(int $id): ?User
    {
        return User::query()->findOrFail($id);
    }

    /**
     * @param  User  $user
     * @return User
     */
    public function save(User $user): User
    {
        $user->save();

        return $user;
    }
}

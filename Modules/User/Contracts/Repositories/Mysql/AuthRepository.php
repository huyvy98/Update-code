<?php

namespace Modules\User\Contracts\Repositories\Mysql;

use App\Models\User;

interface AuthRepository
{
    /**
     * Get user by id
     *
     * @param  int  $id
     * @return User|null
     */
    public function findById(int $id): ?User;

    /**
     * Save user
     *
     * @param User $user
     * @return User
     */
    public function save(User $user): User;
}

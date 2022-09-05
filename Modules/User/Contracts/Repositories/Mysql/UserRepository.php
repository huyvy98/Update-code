<?php

namespace Modules\User\Contracts\Repositories\Mysql;

use App\Models\User;

interface UserRepository
{
    /**
     * Save user
     *
     * @param User $user
     * @return User
     */
    public function save(User $user): User;
}
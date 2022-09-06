<?php

namespace Modules\User\Contracts\Services;

use Illuminate\Database\Eloquent\Collection;

interface UserService
{
    /**
     * Show user login
     *
     * @return array
     */
    public function getUserById(): array;
}

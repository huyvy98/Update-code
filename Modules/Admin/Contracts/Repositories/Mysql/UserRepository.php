<?php

namespace Modules\Admin\Contracts\Repositories\Mysql;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserRepository
{
    /**
     * Find user by id
     *
     * @param int $id
     * @return User |null
     */
    public function findById(int $id): ?User;

    /**
     * Get all user data
     *
     * @return LengthAwarePaginator
     */
    public function get(): LengthAwarePaginator;

    /**
     * Delete user
     *
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void;

    /**
     * Save user
     *
     * @param User $user
     * @return User
     */
    public function save(User $user): User;

    /**
     * Create new user
     *
     * @param User $user
     * @return User
     */
    public function create(User $user): User;

    /**
     * Update user
     *
     * @param User $user
     * @return User
     */
    public function update(User $user): User;
}

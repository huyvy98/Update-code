<?php

namespace Modules\Admin\Repositories\Mysql;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Admin\Contracts\Repositories\Mysql\UserRepository;

class UserRepoImpl implements UserRepository
{
    /**
     * Save user
     *
     * @param User $user
     * @return User
     */
    public function save(User $user): User
    {
        $user->save();

        return $user;
    }

    /**
     * Get all user
     *
     * @return LengthAwarePaginator
     */
    public function get(): LengthAwarePaginator
    {
        return User::query()->paginate(10);
    }

    /**
     * Delete user
     *
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void
    {
        User::destroy($id);
    }

    /**
     * Create new user
     *
     * @param User $user
     * @return User
     */
    public function create(User $user): User
    {
        $user->create();

        return $user;
    }

    /**
     * Update user
     *
     * @param User $user
     * @return User
     */
    public function update(User $user): User
    {
        $user->update();

        return $user;
    }

    /**
     * Find user by ID
     *
     * @param int $id
     * @return User|null
     */
    public function findById(int $id): ?User
    {
        return User::query()->findOrFail($id);
    }
}

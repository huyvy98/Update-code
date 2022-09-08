<?php

namespace Modules\Admin\Repositories\Mysql;

use App\Models\Admin;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Admin\Contracts\Repositories\Mysql\AdminRepository;

class AdminRepoImpl implements AdminRepository
{
    /**
     * Save admin
     *
     * @param Admin $admin
     * @return Admin
     */
    public function save(Admin $admin): Admin
    {
        $admin->save();

        return $admin;
    }

    /**
     * Get all admin
     *
     * @return LengthAwarePaginator
     */
    public function get(): LengthAwarePaginator
    {
        return Admin::query()->paginate(5);
    }

    /**
     * Delete admin
     *
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void
    {
        Admin::destroy($id);
    }

    /**
     * Create new admin
     *
     * @param Admin $admin
     * @return Admin
     */
    public function create(Admin $admin): Admin
    {
        $admin->create();

        return $admin;
    }

    /**
     * Update admin
     *
     * @param Admin $admin
     * @return Admin
     */
    public function update(Admin $admin): Admin
    {
        $admin->update();

        return $admin;
    }

    /**
     * Find admin by ID
     *
     * @param int $id
     * @return Admin|null
     */
    public function findById(int $id): ?Admin
    {
        return Admin::query()->findOrFail($id);
    }
}

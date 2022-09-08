<?php

namespace Modules\Admin\Contracts\Repositories\Mysql;

use App\Models\Admin;
use Illuminate\Pagination\LengthAwarePaginator;

interface AdminRepository
{
    /**
     * Find admin by id
     *
     * @param int $id
     * @return Admin |null
     */
    public function findById(int $id): ?Admin;

    /**
     * Get all admin data
     *
     * @return LengthAwarePaginator
     */
    public function get(): LengthAwarePaginator;

    /**
     * Delete admin
     *
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void;

    /**
     * Save admin
     *
     * @param Admin $admin
     * @return Admin
     */
    public function save(Admin $admin): Admin;

    /**
     * Create new admin
     *
     * @param Admin $admin
     * @return Admin
     */
    public function create(Admin $admin): Admin;

    /**
     * Update admin
     *
     * @param Admin $admin
     * @return Admin
     */
    public function update(Admin $admin): Admin;
}

<?php

namespace Modules\Admin\Contracts\Repositories\Mysql;

use App\Models\Admin;
use Illuminate\Pagination\LengthAwarePaginator;

interface ListAdminRepository
{
    /**
     * Find product by id
     *
     * @param  int  $id
     * @return Admin |null
     */
    public function findById(int $id): ?Admin;

    /**
     * @return LengthAwarePaginator
     */
    public function getAllAdmin(): LengthAwarePaginator;

    /**
     * @param  int  $id
     * @return void
     */
    public function destroy(int $id): void;

    /**
     * @param  Admin  $admin
     * @return Admin
     */
    public function save(Admin $admin): Admin;

    /**
     * @param  Admin  $admin
     * @return Admin
     */
    public function createAdmin(Admin $admin): Admin;

    /**
     * @param  Admin  $admin
     * @return Admin
     */
    public function updateAdmin(Admin $admin): Admin;
}

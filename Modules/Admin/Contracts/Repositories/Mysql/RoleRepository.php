<?php

namespace Modules\Admin\Contracts\Repositories\Mysql;

use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\Permission\Models\Role;

interface RoleRepository
{
    /**
     * Find product by id
     *
     * @param int $id
     * @return Role |null
     */
    public function findById(int $id): ?Role;

    /**
     * @return LengthAwarePaginator
     */
    public function getAllRole(): LengthAwarePaginator;

    /**
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void;

    /**
     * @param Role $role
     * @return Role
     */
    public function save(Role $role): Role;

    /**
     * @param Role $role
     * @return Role
     */
    public function createRole(Role $role): Role;

    /**
     * @param Role $role
     * @return Role
     */
    public function updateRole(Role $role): Role;
}

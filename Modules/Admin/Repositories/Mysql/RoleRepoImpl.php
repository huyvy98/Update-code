<?php

namespace Modules\Admin\Repositories\Mysql;

use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Admin\Contracts\Repositories\Mysql\RoleRepository;
use Spatie\Permission\Models\Role;

class RoleRepoImpl implements RoleRepository
{
    /**
     * @param  int  $id
     * @return Role|null
     */
    public function findById(int $id): ?Role
    {
        return Role::query()->findOrFail($id);
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getAllRole(): LengthAwarePaginator
    {
        return Role::query()->paginate(5);
    }

    /**
     * @param  int  $id
     * @return void
     */
    public function destroy(int $id): void
    {
        Role::destroy($id);
    }

    /**
     * @param  Role  $role
     * @return Role
     */
    public function save(Role $role): Role
    {
        $role->save();
        return $role;
    }

    /**
     * @param  Role  $role
     * @return Role
     */
    public function createRole(Role $role): Role
    {
        $role->query()->create();

        return $role;
    }

    /**
     * @param  Role  $role
     * @return Role
     */
    public function updateRole(Role $role): Role
    {
        $role->update();

        return $role;
    }
}

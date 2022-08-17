<?php

namespace Modules\Admin\Contracts\Services;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\Permission\Models\Role;

interface RoleService
{
    /**
     * @return LengthAwarePaginator
     */
    public function getAll(): LengthAwarePaginator;

    /**
     * @param Request $request
     * @return Role
     */
    public function saveRole(Request $request): Role;

    /**
     * @param Request $request
     * @param int $id
     * @return Role
     */
    public function updateRole(Request $request, int $id): Role;

    /**
     * @param int $id
     * @return Role|null
     */
    public function editRole(int $id): ?Role;

    /**
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void;
}

<?php

namespace Modules\Admin\Services;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Admin\Contracts\Repositories\Mysql\RoleRepository;
use Modules\Admin\Contracts\Services\RoleService;
use Spatie\Permission\Models\Role;

class RoleServiceImpl implements RoleService
{
    /**
     * @var RoleRepository
     */
    protected RoleRepository $roleRepository;
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getAll(): LengthAwarePaginator
    {
        return $this->roleRepository->getAllRole();
    }

    public function saveRole(Request $request): Role
    {
        $permission = $request->get('permission');
        $role = new Role();
        $role->name = $request->input('name');
        $role->syncPermissions($request->input('permission'));
        $data = $this->roleRepository->save($role);

        return $data;
    }

    /**
     * @param Request $request
     * @param int $id
     * @return Role
     */
    public function updateRole(Request $request, int $id): Role
    {
        $role = $this->roleRepository->findById($id);
        $role->name = $request->input('name');

        return $this->roleRepository->updateRole($role);
    }

    /**
     * @param int $id
     * @return Role|null
     */
    public function editRole(int $id): ?Role
    {
        return $this->roleRepository->findById($id);
    }

    /**
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void
    {
        $this->roleRepository->destroy($id);
    }
}

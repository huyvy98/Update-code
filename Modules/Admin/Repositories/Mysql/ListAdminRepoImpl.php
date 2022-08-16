<?php

namespace Modules\Admin\Repositories\Mysql;

use App\Models\Admin;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Admin\Contracts\Repositories\Mysql\ListAdminRepository;

class ListAdminRepoImpl implements ListAdminRepository
{
    public function save(Admin $admin): Admin
    {
        $admin->save();

        return $admin;
    }

    public function getAllAdmin(): LengthAwarePaginator
    {
        return Admin::query()->paginate(5);
    }

    public function destroy(int $id): void
    {
        Admin::destroy($id);
    }

    public function createAdmin(Admin $admin): Admin
    {
        $admin->query()->create();

        return $admin;
    }

    public function updateAdmin(Admin $admin): Admin
    {
        $admin->update();

        return $admin;
    }

    public function findById(int $id): ?Admin
    {
        return Admin::query()->findOrFail($id);
    }
}

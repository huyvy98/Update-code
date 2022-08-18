<?php

namespace Modules\Admin\Services;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Contracts\Repositories\Mysql\ListAdminRepository;
use Modules\Admin\Contracts\Services\ListAdminService;

class ListAdminServiceImpl implements ListAdminService
{
    /**
     * @var ListAdminRepository $listAdminRepository
     */
    protected ListAdminRepository $listAdminRepository;

    /**
     * @param ListAdminRepository $listAdminRepository
     */
    public function __construct(ListAdminRepository $listAdminRepository)
    {
        $this->listAdminRepository = $listAdminRepository;
    }

    public function getAll(): LengthAwarePaginator
    {
        return $this->listAdminRepository->getAllAdmin();
    }

    public function saveAdmin(Request $request): Admin
    {
        $admin = new Admin();
        $admin->assignRole('Admin');
        $admin->syncPermissions([
            'products.index',
            'products.create',
            'products.edit',
            'products.destroy',
            'orders.index',
            'orders.destroy',
            'orderDetails.index'
        ]);
        $admin->firstname = $request->get('firstname');
        $admin->lastname = $request->get('lastname');
        $admin->email = $request->get('email');
        $admin->phone = $request->get('phone');
        $admin->password = Hash::make($request->get('password'));
        $this->listAdminRepository->save($admin);
        return $admin;
    }

    public function updateAdmin(Request $request, int $id): Admin
    {
        $admin = $this->listAdminRepository->findById($id);
        $admin->firstname = $request->get('firstname');
        $admin->lastname = $request->get('lastname');
        $admin->email = $request->get('email');
        $admin->phone = $request->get('phone');
        $admin->password = Hash::make($request->get('password'));
        return $this->listAdminRepository->updateAdmin($admin);
    }

    public function editAdmin(int $id): ?Admin
    {
        return $this->listAdminRepository->findById($id);
    }

    public function destroy(int $id): void
    {
        $this->listAdminRepository->destroy($id);
    }
}

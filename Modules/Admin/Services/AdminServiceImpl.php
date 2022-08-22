<?php

namespace Modules\Admin\Services;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Contracts\Repositories\Mysql\AdminRepository;
use Modules\Admin\Contracts\Services\AdminService;
use Spatie\Permission\Models\Permission;

class AdminServiceImpl implements AdminService
{
    /**
     * @var AdminRepository $listAdminRepository
     */
    protected AdminRepository $listAdminRepository;

    /**
     * @param AdminRepository $listAdminRepository
     */
    public function __construct(AdminRepository $listAdminRepository)
    {
        $this->listAdminRepository = $listAdminRepository;
    }

    /**
     * get all admin
     *
     * @return LengthAwarePaginator
     */
    public function getAll(): LengthAwarePaginator
    {
        return $this->listAdminRepository->getAllAdmin();
    }

    /**
     *
     *
     * @param Request $request
     * @return Admin
     */
    public function saveAdmin(Request $request): Admin
    {
        $admin = new Admin();
        $admin->assignRole('Admin');
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
        if (empty($request->get('password'))) {
            $admin->password = $request->get(old('password'));
        } else {
            $admin->password = Hash::make($request->get('password'));
        }

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

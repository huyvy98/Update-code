<?php

namespace Modules\Admin\Services;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Contracts\Repositories\Mysql\AdminRepository;
use Modules\Admin\Contracts\Services\AdminService;
use Modules\Admin\Http\Requests\AdminRequest;
use Spatie\Permission\Models\Permission;

class AdminServiceImpl implements AdminService
{
    /**
     * @var AdminRepository $adminRepository
     */
    protected AdminRepository $adminRepository;

    /**
     * @param AdminRepository $adminRepository
     */
    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    /**
     * get all admin
     *
     * @return LengthAwarePaginator
     */
    public function getAdmin(): LengthAwarePaginator
    {
        return $this->adminRepository->get();
    }

    /**
     * save admin
     *
     * @param AdminRequest $request
     * @return Admin
     */
    public function saveAdmin(AdminRequest $request): Admin
    {
        $admin = new Admin();
        $admin->assignRole('Admin');
        $admin->firstname = $request->get('firstname');
        $admin->lastname = $request->get('lastname');
        $admin->email = $request->get('email');
        $admin->phone = $request->get('phone');
        $admin->password = Hash::make($request->get('password'));

        $this->adminRepository->save($admin);

        return $admin;
    }

    /**
     * update admin
     *
     * @param AdminRequest $request
     * @param int $id
     * @return Admin
     */
    public function updateAdmin(AdminRequest $request, int $id): Admin
    {
        $admin = $this->adminRepository->findById($id);

        $admin->firstname = $request->get('firstname');
        $admin->lastname = $request->get('lastname');
        $admin->email = $request->get('email');
        $admin->phone = $request->get('phone');
        if (empty($request->get('password'))) {
            $admin->password = $request->get(old('password'));
        } else {
            $admin->password = Hash::make($request->get('password'));
        }

        return $this->adminRepository->update($admin);
    }

    /**
     * get id admin to edit
     *
     * @param int $id
     * @return Admin|null
     */
    public function editAdmin(int $id): ?Admin
    {
        return $this->adminRepository->findById($id);
    }

    /**
     * delete admin
     *
     * @param int $id
     * @return void
     */
    public function destroyAdmin(int $id): void
    {
        $this->adminRepository->destroy($id);
    }
}

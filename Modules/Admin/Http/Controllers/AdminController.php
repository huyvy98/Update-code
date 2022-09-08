<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Modules\Admin\Contracts\Services\AdminService;
use Modules\Admin\Http\Requests\AdminRequest;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * @var AdminService
     */
    public AdminService $adminService;

    /**
     * @param AdminService $adminService
     */
    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    /**
     *Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $admins = $this->adminService->getAdmin();

        return view('admin::admin.index', compact('admins'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin::admin.create');
    }

    public function store(AdminRequest $request): RedirectResponse
    {
        $this->adminService->saveAdmin($request);

        return Redirect::route('admin.index')->with('message', 'Thêm mới thành công');
    }

    /**
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $admins = $this->adminService->editAdmin($id);

        return view('admin::admin.edit', compact('admins'));
    }

    /**
     * @param AdminRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(AdminRequest $request, int $id): RedirectResponse
    {
        $this->adminService->updateAdmin($request, $id);

        return Redirect::route('admin.index')->with('message', 'Cập nhật thành công');
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->adminService->destroyAdmin($id);

        return Redirect::route('admin.index')->with('message', 'Đã xóa thành công');
    }
}

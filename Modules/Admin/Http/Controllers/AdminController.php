<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Admin;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Modules\Admin\Contracts\Services\ListAdminService;
use Modules\Admin\Http\Requests\AdminRequest;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * @var ListAdminService
     */
    public ListAdminService $listAdminService;

    /**
     * @param  ListAdminService  $listAdminService
     */
    public function __construct(ListAdminService $listAdminService)
    {
        $this->listAdminService = $listAdminService;
    }

    /**
     *Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $admins = $this->listAdminService->getAll();

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
        $this->listAdminService->saveAdmin($request);

        return Redirect::route('admin.index')->with('message', 'Thêm mới thành công');
    }

    /**
     * @param  int  $id
     * @return View
     */
    public function edit(int $id): View
    {
        $admins = $this->listAdminService->editAdmin($id);

        return view('admin::admin.edit', compact('admins'));
    }

    /**
     * @param  AdminRequest  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(AdminRequest $request, int $id): RedirectResponse
    {
        $this->listAdminService->updateAdmin($request, $id);

        return Redirect::route('admin.index')->with('message', 'Cập nhật thành công');
    }

    /**
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->listAdminService->destroy($id);

        return Redirect::route('admin.index')->with('message', 'Đã xóa thành công');
    }
}

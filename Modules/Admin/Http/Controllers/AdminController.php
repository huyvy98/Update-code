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
     *
     * @return View
     */
    public function index(): View
    {
        $admins = $this->listAdminService->getAll();
        /** @var Admin $auth */
        $auth = Auth::guard('admin')->user();
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

        return Redirect::route('admin.index');
    }

    /**
     * @param  int  $id
     * @return View
     */
    public function edit(int $id): View
    {
        $admins = $this->listAdminService->editAdmin($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $admins->roles->pluck('name', 'name')->all();

        return view('admin::admin.edit',compact('admins','roles','userRole'));
    }

    /**
     * @param  AdminRequest  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(AdminRequest $request, int $id): RedirectResponse
    {
        $this->listAdminService->updateAdmin($request, $id);

        return Redirect::route('admin.index');
    }

    /**
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->listAdminService->destroy($id);

        return Redirect::route('admin.index')->with('message','success');
    }
}

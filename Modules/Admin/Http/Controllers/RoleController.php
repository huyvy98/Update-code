<?php

namespace Modules\Admin\Http\Controllers;


use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\ValidationException;
use Modules\Admin\Contracts\Repositories\Mysql\RoleRepository;
use Modules\Admin\Contracts\Services\RoleService;
use DB;

class RoleController extends Controller
{

    function __construct()
    {
//        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
//        $this->middleware('permission:role-create', ['only' => ['create','store']]);
//        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
//        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
//        $role = Role::create(['guard_name' => 'admin','name'=>'super']);
//
//        $per = Permission::create(['guard_name' => 'admin','name'=>'addA']);
//        $per = Permission::create(['guard_name' => 'admin','name' => 'editA']);
//        $per = Permission::create(['guard_name' => 'admin','name' => 'deleteA']);
//        $per = Permission::create(['guard_name' => 'admin','name' => 'viewA']);

//        $role = Role::query()->where('id',1)->first();
//        $role->syncPermissions(Permission::all());
//        $admin = Admin::query()->where('id',1)->first();
//        $admin->syncPermissions(Permission::all());
////////        dd($admin);
//        $admin->assignRole(['SuperAdmin']);
//        $user = Admin::role('super')->get();
//        dd($user);
//        app()['cache']->forget('spatie.permission.cache');
    }

//    public function create()
//    {
//        $permission = Permission::query()->get();
//        return view('admin::role.create', compact('permission'));
//    }
//
//    /**
//     * @param RoleRequest $request
//     * @return RedirectResponse
//     */
//    public function store(RoleRequest $request): RedirectResponse
//    {
//        $role = Role::create(['name' => $request->input('name')]);
//        $role->syncPermissions($request->input('permission'));
//
//        return redirect()->route('roles.index')
//            ->with('success', 'Role created successfully');
//    }
//
//    public function show($id)
//    {
//        return redirect()->route('roles.index');
//    }
//
//    public function edit($id)
//    {
//        $role = Role::find($id);
//        if ($role->name == 'Super-Admin') {
//            $notification = array(
//                'message' => "You have no permission for edit this role",
//                'alert-type' => 'error'
//            );
//            return redirect()->route('roles.index')
//                ->with($notification);
//        }
//
//        $permission = Permission::get();
//        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
//            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
//            ->all();
//
//        return view('roles.edit', compact('role', 'permission', 'rolePermissions'));
//    }
//
//    public function update(Request $request, $id)
//    {
//        $this->validate($request, [
//            'name' => [
//                'required',
//                Rule::unique('roles', 'name')->ignore($id)
//            ],
//            'permission' => 'required'
//        ]);
//
//        $role = Role::find($id);
//        $role->name = $request->input('name');
//        $role->save();
//
//        $role->syncPermissions($request->input('permission'));
//
//        return redirect()->route('roles.index')
//            ->with('success', 'Role updated successfully');
//    }
//
//    public function destroy($id)
//    {
//        $role = Role::find($id);
//
//        if (auth()->user()->roles->find($id)) {
//            $notification = array(
//                'message' => 'You have no permission for delete this role',
//                'alert-type' => 'error'
//            );
//            return redirect()->route('roles.index')
//                ->with($notification);
//        }
//        if ($role->name == "Super-Admin") {
//            $notification = array(
//                'message' => 'You have no permission for delete Super-Admin role',
//                'alert-type' => 'error'
//            );
//            return redirect()->route('roles.index')
//                ->with($notification);
//        }
//        $role->delete();
//
//        $notification = array(
//            'message' => 'The role deleted successfully',
//            'alert-type' => 'success'
//        );
//        return redirect()->route('roles.index')
//            ->with($notification);
//    }
}

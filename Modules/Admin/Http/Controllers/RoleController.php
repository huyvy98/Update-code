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
//        $admin = Admin::query()->where('id',1)->first();
//        $admin->assignRole('SuperAdmin');
    }
}

<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['guard_name' => 'admin', 'name' => 'superadmin.admin.index']);
        Permission::create(['guard_name' => 'admin', 'name' => 'superadmin.admin.create']);
        Permission::create(['guard_name' => 'admin', 'name' => 'superadmin.admin.edit']);
        Permission::create(['guard_name' => 'admin', 'name' => 'superadmin.admin.destroy']);
        Permission::create(['guard_name' => 'admin', 'name' => 'products.index']);
        Permission::create(['guard_name' => 'admin', 'name' => 'products.create']);
        Permission::create(['guard_name' => 'admin', 'name' => 'products.edit']);
        Permission::create(['guard_name' => 'admin', 'name' => 'products.destroy']);
        Permission::create(['guard_name' => 'admin', 'name' => 'orders.index']);
        Permission::create(['guard_name' => 'admin', 'name' => 'orders.destroy']);
        Permission::create(['guard_name' => 'admin', 'name' => 'orderDetails.index']);

        Role::create(
            ['guard_name' => 'admin', 'name' => 'SuperAdmin'],
        )->givePermissionTo(Permission::all());

        Role::create(['guard_name' => 'admin', 'name' => 'Admin'])->givePermissionTo(
            [
                'products.index',
                'products.create',
                'products.edit',
                'products.destroy',
                'orders.index',
                'orders.destroy',
                'orderDetails.index'
            ]
        );

//        $admin = Admin::query()->where('id',1)->first();
//        $admin->syncPermissions(Permission::all());
//
//        $admin = Admin::query()->where('id',1)->first();
//        $admin->assignRole('SuperAdmin');
    }
}



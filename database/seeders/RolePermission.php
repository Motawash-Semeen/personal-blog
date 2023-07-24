<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'Admin']);
        $permission = Permission::create(['name' => 'User List']);
        $permission = Permission::create(['name' => 'Create User']);
        $permission = Permission::create(['name' => 'Edit User']);
        $permission = Permission::create(['name' => 'Delete User']);
        $permission = Permission::create(['name' => 'Role List']);
        $permission = Permission::create(['name' => 'Create Role']);
        $permission = Permission::create(['name' => 'Edit Role']);
        $permission = Permission::create(['name' => 'Delete Role']);
        $permission = Permission::create(['name' => 'Post List']);
        $permission = Permission::create(['name' => 'Create Post']);
        $permission = Permission::create(['name' => 'Edit Post']);
        $permission = Permission::create(['name' => 'Delete Post']);

        $user = User::first();
        $user->assignRole($role);
        $role->syncPermissions(Permission::all());
    }
}

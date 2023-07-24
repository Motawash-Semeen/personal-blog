<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function addRole()
    {
        $permissions = Permission::all();
        return view('backend.pages.roles.addrole', compact('permissions'));
    }
    public function storeRole(Request $request)
    {
        //return $request->all();
        $request->validate([
            'name' => 'required|unique:roles,name',

        ]);
        
        $role = new Role();
        $role->name = $request->name;
        foreach ($request->permissions as $permission) {
            $role->givePermissionTo($permission);
        }
        $role->save();
        session()->flash('message', 'Role created successfully!');
        return redirect()->back();
    }
    public function manageRole()
    {
        $roles = Role::all();
        return view('backend.pages.roles.manageroles', compact('roles'));
    }
    public function editRole($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        return view('backend.pages.roles.editrole', compact('role', 'permissions'));
    }
    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
        ]);
        $role = Role::find($id);
        $role->name = $request->name;
        $role->syncPermissions($request->permissions);
        $role->save();
        session()->flash('message', 'Role updated successfully!');
        return redirect('/admin/managerole');
    }
    public function deleteRole($id)
    {
        $role = Role::find($id);
        $role->delete();
        session()->flash('message', 'Role deleted successfully!');
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
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
}

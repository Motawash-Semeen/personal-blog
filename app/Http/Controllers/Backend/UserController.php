<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function addUser()
    {
        $roles = Role::all();
        return view('backend.pages.users.adduser', compact('roles'));
    }
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'min:6|required|same:confirm_password',
            'confirm_password' => 'min:6|required'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->assignRole($request->role);
        $user->password = md5($request->password);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('backend/images/user/', $filename);
            $user->image = $filename;
        }	
        $user->save();
        return redirect('admin/manageuser');
    }
    public function manageUser()
    {
        $users = User::all();
        return view('backend.pages.users.manageusers', compact('users'));
    }
    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/manageuser');
    }
    public function editUser($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('backend.pages.users.edituser', compact('user', 'roles'));
    }
    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'role' => 'required',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email; 
        $user->syncRoles($request->role);
        if($request->hasFile('image')){
            if(file_exists('backend/images/user/'.$user->image)){
                unlink('backend/images/user/'.$user->image);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('backend/images/user/', $filename);
            $user->image = $filename;
        }	
        $user->save();
        return redirect('admin/manageuser');
    }
}

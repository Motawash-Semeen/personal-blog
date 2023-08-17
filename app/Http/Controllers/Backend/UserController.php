<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function addUser()
    {
        $roles = Role::all();
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('backend.pages.users.adduser', compact('roles', 'user'));
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
        session()->flash('message', 'User Added Successfully');
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
        session()->flash('message', 'User Updated Successfully');
        return redirect('admin/manageuser');
    }
    public function update_profile(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
        ]);
        $user->name = $request->name;
        $user->phone = $request->email;
        $request->description ? $user->description = $request->description : "";
        $request->address ? $user->address = $request->address : $user->address = "";
        $request->website ? $user->website = $request->website : $user->website = "";
        $request->facebook ? $user->facebook = $request->facebook : $user->facebook =  "";
        $request->instagram ? $user->instagram = $request->instagram : $user->instagram = "";
        $request->linkedin ? $user->linkedin = $request->linkedin : $user->linkedin =  "";
        $request->twitter ? $user->twitter = $request->twitter : $user->twitter =  "";
        $user->update();

        session()->flash('message', 'User Updated Successfully');
        return redirect('admin/profile');
    }
    public function update_image(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        if ($request->hasFile('image')) {
            //session()->flash('message', 'User Updated Successfully');
            $destination = "backend/images/".$request->old_img;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file("image");
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('backend/images/',$filename);
            $user->profile_image = $filename;
            $user->update();
            session()->flash('message', 'Image Updated Successfully');
        }
    
        session()->flash('message', 'Image Updated Failed');
    }
}

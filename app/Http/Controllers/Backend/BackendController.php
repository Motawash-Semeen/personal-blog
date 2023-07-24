<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class BackendController extends Controller
{
    public function dashboard()
    {
        return view('backend.pages.dashboard');
    }
    public function addRole()
    {
        
        $permissions = Permission::all();
        return view('backend.pages.addrole', compact('permissions'));
    }
}

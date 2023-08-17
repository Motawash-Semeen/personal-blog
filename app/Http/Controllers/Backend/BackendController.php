<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class BackendController extends Controller
{
    public function dashboard()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('backend.pages.dashboard', compact('user'));
    }
    
}

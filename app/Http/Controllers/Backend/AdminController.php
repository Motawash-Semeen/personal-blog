<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'min:6|required'
        ]);
        $user = User::where('email', $request->email)->first();
        if($user && $user->password == md5($request->password)){
            Auth::login($user);
            session()->flash('message', 'Welcome back, ' . $user->name . '! You are now logged in.');
            return redirect('/admin');
        }
        else{
            return 'not logined';
        }
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'min:6|required|same:confirm_password',
            'confirm_password' => 'min:6|required'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = md5($request->password);
        $user->save();
        return redirect()->route('login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

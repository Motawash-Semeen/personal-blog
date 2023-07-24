<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        return view('frontend.pages.home');
    }
    public function posts()
    {
        return view('frontend.pages.allpost');
    }
    public function singlePost()
    {
        return view('frontend.pages.post');
    }
    public function contact()
    {
        return view('frontend.pages.contact');
    }
    public function author()
    {
        return view('frontend.pages.author');
    }
    public function login()
    {
        return view('frontend.pages.login');
    }
    public function register()
    {
        return view('frontend.pages.register');
    }
}

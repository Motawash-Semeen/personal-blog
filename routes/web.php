<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.pages.home');
});
Route::get('/posts', function () {
    return view('frontend.pages.allpost');
});
Route::get('/contact', function () {
    return view('frontend.pages.contact');
});
Route::get('/post', function () {
    return view('frontend.pages.post');
});
Route::get('/author', function () {
    return view('frontend.pages.author');
});
Route::get('/login', function () {
    return view('frontend.pages.login');
});
Route::get('/register', function () {
    return view('frontend.pages.register');
});



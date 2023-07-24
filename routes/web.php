<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Frontend\FrontendController;
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

Route::get('/', [FrontendController::class,'home']);
Route::get('/posts', [FrontendController::class,'posts']);
Route::get('/contact', [FrontendController::class,'contact']);
Route::get('/post', [FrontendController::class,'singlePost']);
Route::get('/author', [FrontendController::class,'author']);
Route::get('/login', [FrontendController::class, 'login'])->name('login');
Route::post('/login', [AdminController::class, 'login']);
Route::get('/logout', [AdminController::class, 'logout']);
Route::get('/register', [FrontendController::class, 'register']);
Route::post('/register', [AdminController::class, 'register']);


Route::prefix('admin')->middleware(['logincheck'])->group(function () {
    Route::get('/', [BackendController::class, 'dashboard']);
    Route::get('/addrole', [BackendController::class, 'addRole']);
    Route::post('/addrole', [RoleController::class, 'storeRole']);
});




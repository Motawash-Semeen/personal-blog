<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CommentsController;
use App\Http\Controllers\Backend\GallaryController;
use App\Http\Controllers\Backend\HomeSectionController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SiteController;
use App\Http\Controllers\Backend\SMTPController;
use App\Http\Controllers\Backend\SocialController;
use App\Http\Controllers\Backend\UserController;
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
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
Route::get('/register', [FrontendController::class, 'register'])->name('register');
Route::post('/register', [AdminController::class, 'register']);


Route::prefix('admin')->middleware(['logincheck'])->group(function () {
    Route::get('/', [BackendController::class, 'dashboard']);
    Route::get('/addrole', [RoleController::class, 'addRole']);
    Route::post('/addrole', [RoleController::class, 'storeRole']);
    Route::get('/managerole', [RoleController::class, 'manageRole']);
    Route::get('/deleterole/{id}', [RoleController::class, 'deleteRole']);
    Route::get('/editrole/{id}', [RoleController::class, 'editRole']);
    Route::post('/editrole/{id}', [RoleController::class, 'updateRole']);

    Route::get('/adduser', [UserController::class, 'addUser']);
    Route::post('/adduser', [UserController::class, 'storeUser']);
    Route::get('/manageuser', [UserController::class, 'manageUser']);
    Route::get('/deleteuser/{id}', [UserController::class, 'deleteUser']);
    Route::get('/edituser/{id}', [UserController::class, 'editUser']);
    Route::post('/edituser/{id}', [UserController::class, 'updateUser']);

    Route::get('/profile', [AdminController::class, 'profile']);
    Route::post('/profile', [UserController::class, 'update_profile']);
    Route::post('/image_upload', [UserController::class, 'update_image']);


    Route::get('/addpost', [PostController::class, 'addPost']);
    Route::post('/addpost', [PostController::class, 'storePost']);
    Route::get('/managepost', [PostController::class, 'managePost']);
    Route::get('/deletepost/{id}', [PostController::class, 'deletePost']);
    Route::get('/editpost/{id}', [PostController::class, 'editPost']);
    Route::post('/editpost/{id}', [PostController::class, 'updatePost']);
    Route::get('/statusPost/{id}', [PostController::class, 'statusPost']);

    Route::get('/addcategory', [CategoryController::class, 'addCate']);
    Route::post('/addcategory', [CategoryController::class, 'storeCate']);
    Route::get('/managecategory', [CategoryController::class, 'manageCate']);
    Route::get('/deletecategory/{id}', [CategoryController::class, 'deleteCate']);
    Route::get('/editcategory/{id}', [CategoryController::class, 'editCate']);
    Route::post('/editcategory/{id}', [CategoryController::class, 'updateCate']);
    Route::get('/statusCate/{id}', [CategoryController::class, 'statusCate']);


    Route::get('/smtp', [SMTPController::class, 'index']);
    Route::post('/smtp', [SMTPController::class, 'update']);
    Route::get('/site-settings', [SiteController::class, 'index']);
    Route::post('/site-settings', [SiteController::class, 'update']);


    Route::get('/home-section', [HomeSectionController::class, 'index']);
    Route::get('/edit-section/{id}', [HomeSectionController::class, 'edit']);
    Route::post('/edit-section/{id}', [HomeSectionController::class, 'update']);
    Route::get('/status-section/{id}', [HomeSectionController::class, 'status']);


    Route::get('/home-gallaries', [GallaryController::class, 'index']);
    Route::get('/add-gallaries', [GallaryController::class, 'create']);
    Route::post('/add-gallaries', [GallaryController::class, 'store']);
    Route::get('/edit-gallaries/{id}', [GallaryController::class, 'edit']);
    Route::post('/edit-gallaries/{id}', [GallaryController::class, 'update']);
    Route::get('/status-gallaries/{id}', [GallaryController::class, 'status']);
    Route::get('/delete-gallaries/{id}', [GallaryController::class, 'destroy']);


    Route::get('/comments', [CommentsController::class, 'index']);
    //Route::get('/add-comments', [CommentsController::class, 'create']);
    //Route::post('/add-comments', [CommentsController::class, 'store']);
    Route::get('/edit-comments/{id}', [CommentsController::class, 'edit']);
    Route::post('/edit-comments/{id}', [CommentsController::class, 'update']);
    Route::get('/status-comments/{id}', [CommentsController::class, 'status']);
    Route::get('/delete-comments/{id}', [CommentsController::class, 'destroy']);

});




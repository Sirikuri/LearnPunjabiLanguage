<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SubCategoriesController;
use App\Http\Controllers\TopicController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     // return view('admin.layout.welcome');
//     return view('admin.layouts.app');
// });

Route::get('/', [authController::class, 'user_login'])->name('user_login');
Route::get('/admin_login', [authController::class, 'admin_login'])->name('admin_login');
Route::get('/user_register', [authController::class, 'register_user'])->name('user_signup');
Route::get('/admin_user', [authController::class, 'admin_user'])->name('admin_user');

Route::post('/register_user_post', [authController::class, 'register_user_post'])->name('register_user_post');
Route::post('/admin_register_login', [authController::class, 'postAdminLogin'])->name('admin_register_login');
Route::post('/user_register_login', [authController::class, 'postuserLogin'])->name('user_register_login');
Route::get('/admin_logout', [authController::class, 'admin_logout'])->name('admin_logout');
Route::get('/user_logout', [authController::class, 'user_logout'])->name('user_logout');
Route::get('forget-password', [adminController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [adminController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [adminController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [adminController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::group(['middleware' => ['web', 'admin'] ], function() {
    Route::get('/admin_dashboard', [adminController::class, 'index'])->name('admin_dashboard');
    Route::resource('users', UsersController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('subcategories', SubCategoriesController::class);
    Route::Post('subcatories/{id}', [adminController::class, 'loadSubCategories'])->name('loadsubcategory');
    Route::resource('topics', TopicController::class);
    Route::get('/admin_profile', [adminController::class, 'admin_profile'])->name('admin_profile');
    Route::post('/admin_update_profile', [adminController::class, 'admin_update_profile'])->name('admin_update_profile');
   
    // Route::get('/admin_profile', [adminController::class, 'admin_profile'])->name('admin_profile');
    // Route::post('/admin_update_profile', [adminController::class, 'admin_update_profile'])->name('admin_update_profile');
    });

    Route::group(['middleware' => ['web', 'user_check'] ], function() {
        Route::get('/user_dashboard', [adminController::class, 'user_index'])->name('user_dashboard');
        Route::get('/user_profile', [adminController::class, 'user_profile'])->name('user_profile');
        Route::post('/user_update_profile', [adminController::class, 'user_update_profile'])->name('user_update_profile');
       
        // Route::get('/admin_profile', [adminController::class, 'admin_profile'])->name('admin_profile');
        // Route::post('/admin_update_profile', [adminController::class, 'admin_update_profile'])->name('admin_update_profile');
        });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Admin\LoginController as Adminlogin;
use App\Http\Controllers\Admin\RegisterController as Adminregister;
use App\Http\Controllers\HomeController;
use GuzzleHttp\Middleware;
use App\Http\Controllers\Admin\ManageUserController as ManageUser;

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

// Public Routes
Route::view('/', 'welcome');
Route::view('/about', 'about');
Route::view('/contact', 'contact');

Route::get('/registration', [RegistrationController::class, 'register']);
Route::post('/registration', [RegistrationController::class, 'otp']);
Route::get('/verify', [RegistrationController::class, 'verify'])->middleware('guest');
Route::post('/verify', [RegistrationController::class, 'verifyOtp']);

Route::get('/tmadmin', [Adminlogin::class, 'showLoginForm'])->name('tmadmin')->middleware('adminguest');
Route::post('/tmadmin', [Adminlogin::class, 'login'])->middleware('adminguest');
Route::post('/tmout', [Adminlogin::class, 'logout'])->name('tmout');

// User Authentication Routes
Auth::routes();

// Routes for Admin and SuperAdmin
Route::group(['prefix'=>'tmadmin','middleware' => ['is_admin']], function () {
    // Routes only SuperAdmin
    Route::group(['middleware' => ['is_superadmin']], function () {
        Route::get('/register/{id?}', [Adminregister::class, 'showRegistrationForm']);
        Route::post('/register', [Adminregister::class, 'register']);
        Route::put('/register/{id?}', [Adminregister::class, 'update']);
        Route::get('/adminlist', [Adminregister::class,'list']);
    });
    Route::get('/dashboard', [ManageUser::class,'today']);
    Route::get('/userlist', [ManageUser::class,'userlist']);
    Route::post('/userlist', [ManageUser::class,'updateUserStatus']);
});

// Roures for user
Route::group(['middleware' => ['is_user']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::view('/updateprofile', 'updateprofile');
    Route::view('/viewprofile', 'viewprofile');
});

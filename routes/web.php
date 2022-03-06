<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Admin\LoginController as Adminlogin;
use App\Http\Controllers\Admin\RegisterController as Adminregister;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ManageUserController as ManageUser;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ProfileSearchController as Search;
use App\Http\Controllers\Admin\RegisterUserController as User;

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
Route::get('/', [HomeController::class, 'index']);
Route::view('/about', 'about');
Route::view('/contact', 'contact');
Route::view('/terms', 'terms');
Route::view('/privacy', 'privacy');
Route::view('/faq', 'faq');
Route::post('/contact',[HomeController::class, 'contact']);

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
    Route::post('/deleteuser',[ManageUser::class,'deleteUser']);
    Route::get('/register_user/{id?}', [User::class,'showRegistrationForm']);
    Route::post('/register_user', [User::class,'register']);
    Route::put('/register_user/{id?}', [User::class,'update']);
    Route::get('/testimonial/{id?}',[ManageUser::class,'showTesimonialForm']);
    Route::post('/testimonial',[ManageUser::class,'addTesimonial']);
    Route::put('/testimonial/{id?}',[ManageUser::class,'updateTesimonial']);
    Route::get('/testimonial_list',[ManageUser::class,'testimonialList']);
});

// Roures for user
Route::group(['middleware' => ['is_user']], function () {
    // Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/viewprofile/{id?}', [UserProfileController::class,'view']);
    Route::get('/updateprofile', [UserProfileController::class,'update']);
    Route::post('/updateprofile', [UserProfileController::class,'basicInfo']);
    Route::post('/updatecareer', [UserProfileController::class,'career']);
    Route::post('/updatefamily', [UserProfileController::class,'family']);
    Route::post('/updatecontact', [UserProfileController::class,'contact']);
    Route::post('/district', [UserProfileController::class,'district']);
    Route::post('/addsibling', [UserProfileController::class,'addsibling']);
    Route::post('/deletesibling', [UserProfileController::class,'deletesibling']);
    Route::post('/sibling', [UserProfileController::class,'sibling']);
    Route::post('/search',[Search::class,'result']);
    Route::get('/search',[Search::class,'result']);
    Route::get('/viewedprofiles',[Search::class,'viewedProfile']);
    Route::get('/newprofiles',[Search::class,'newProfile']);
    Route::post('/profilesearch',[UserProfileController::class,'profilesearch']);
});

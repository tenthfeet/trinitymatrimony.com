<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RegistrationController;

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
    return view('welcome');
});

Route::view('/about','about');
Route::view('/contact','contact');

Route::get('/registration',[RegistrationController::class,'register']);
Route::post('/registration',[RegistrationController::class,'otp']);
Route::get('/verify',function(){ return view('verify');});
Route::post('/verify',[RegistrationController::class,'verifyOtp']);

Route::view('/updateprofile','updateprofile');
Route::view('/viewprofile','viewprofile');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

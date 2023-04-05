<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Auth;

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
//Guest
Route::middleware('Guest')->group(function() {
    Route::get('/', 'App\Http\Controllers\GuestController@Home')->name('home');
    Route::get('/about', 'App\Http\Controllers\GuestController@AboutUs')->name('about');
    Route::get('/sign_up', 'App\Http\Controllers\GuestController@Signup')->name('signup');
    Route::get('/login', 'App\Http\Controllers\GuestController@Login')->name('login');
    Route::post('/register_user', 'App\Http\Controllers\GuestController@RegisterUser')->name('register-user');
    Route::post('/login_user', 'App\Http\Controllers\CustomAuthController@LoginUser')->name('login-user');
});

// Admin
Route::middleware(['User','isAdmin'])->group(function() {
    Route::get('/dashboard', 'App\Http\Controllers\AdminController@Dashboard')->name('dashboard');
    Route::get('/insights', 'App\Http\Controllers\AdminController@Insights')->name('insights');
    Route::get('/requests', 'App\Http\Controllers\AdminController@Requests')->name('requests');
    Route::get('/history', 'App\Http\Controllers\AdminController@History')->name('history');
    Route::get('/settings', 'App\Http\Controllers\AdminController@Settings')->name('settings');
});

// Donor
Route::middleware(['User','isDonor'])->group(function() {
});

// Reciever
Route::middleware(['User','isReciever'])->group(function() {
});

// Custom
Route::get('/logout', 'App\Http\Controllers\CustomAuthController@Logout')->name('logout');


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\GuestController;
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

// Admin
Route::prefix('admin')->middleware('auth')->group(function() {
});

//Guest
Route::get('/', 'App\Http\Controllers\GuestController@Home')->name('home');
Route::get('/about', 'App\Http\Controllers\GuestController@AboutUs')->name('about');
Route::get('/sign_up', 'App\Http\Controllers\GuestController@Signup')->name('signup');
Route::get('/login', 'App\Http\Controllers\GuestController@Login')->name('login');

Route::post('/register-user', 'App\Http\Controllers\GuestController@RegisterUser')->name('register-user');

// Custom Auth 
Route::post('/login-user', 'App\Http\Controllers\CustomAuthController@LoginUser')->name('login-user');
Route::get('/dashboard', 'App\Http\Controllers\CustomAuthController@Dashboard')->name('dashboard');
Route::get('/logout', 'App\Http\Controllers\CustomAuthController@Logout')->name('logout');

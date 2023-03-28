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

Route::get('/', 'App\Http\Controllers\GuestController@Home')->name('home');
Route::get('/about', 'App\Http\Controllers\GuestController@AboutUs')->name('about');
Route::get('/sign_up', 'App\Http\Controllers\GuestController@Signup')->name('signup');
Route::get('/login', 'App\Http\Controllers\GuestController@Login')->name('login');


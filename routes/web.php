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
// Guest
Route::middleware('isGuest')->group(function() {
    Route::get('/', 'App\Http\Controllers\GuestController@Home')->name('home');
    Route::get('/about', 'App\Http\Controllers\GuestController@AboutUs')->name('about');

    Route::get('/register', 'App\Http\Controllers\GuestController@Signup')->name('signup');
    Route::post('/register/donor', 'App\Http\Controllers\GuestController@RegisterDonor')->name('register-donor');
    Route::post('/register/receiver', 'App\Http\Controllers\GuestController@RegisterReceiver')->name('register-receiver');

    Route::get('/login', 'App\Http\Controllers\GuestController@Login')->name('login');
    Route::post('/login', 'App\Http\Controllers\CustomAuthController@LoginUser')->name('login-user');

});

// Admin
Route::middleware(['auth','isAdmin'])->group(function() {
    Route::get('/dashboard', 'App\Http\Controllers\AdminController@Dashboard')->name('dashboard');
    Route::get('/insights', 'App\Http\Controllers\AdminController@Insights')->name('insights');

    Route::get('/requests/pending', 'App\Http\Controllers\DonationController@PendingDonation')->name('donation.pending');
    Route::get('/requests/booked', 'App\Http\Controllers\DonationController@BookedDonation')->name('donation.booked');
    Route::get('/requests/denied', 'App\Http\Controllers\DonationController@DeniedDonation')->name('donation.denied');
    Route::get('/requests/done', 'App\Http\Controllers\DonationController@DoneDonation')->name('donation.done');

    Route::get('/history', 'App\Http\Controllers\DonationController@DonationLog')->name('admin.history');

    Route::get('/settings', 'App\Http\Controllers\AdminController@Settings')->name('settings');
    Route::post('/settings/update', 'App\Http\Controllers\UserController@UserUpdate')->name('admin-update');

    Route::get('/requests/filter', 'App\Http\Controllers\DonationController@FilterDonation')->name('donation.filter');

    //Requests Route
    Route::post('/requests/{id}/', 'App\Http\Controllers\DonationController@DonationUpdate')->name('donation.Update');
    Route::post('/requests/order/{id}/', 'App\Http\Controllers\OrderController@OrdersUpdate')->name('order.Update');
});

// Donor
Route::middleware(['auth','isDonor'])->group(function() {
    Route::get('/booking', 'App\Http\Controllers\DonorController@Booking')->name('donor.booking');
    Route::post('/booking/donation', 'App\Http\Controllers\DonationController@DonationBooking')->name('donation.booking');

    Route::get('/history/donor', 'App\Http\Controllers\DonorController@History')->name('donor.history');

    Route::get('/settings/donor', 'App\Http\Controllers\DonorController@Settings')->name('donor.settings');
    Route::post('/settings/donor/update', 'App\Http\Controllers\UserController@UserUpdate')->name('donor.update');


});

// Reciever
Route::middleware(['auth','isReciever'])->group(function() {
    Route::get('/order', 'App\Http\Controllers\RecieverController@order')->name('receiver.request');
    Route::post('/order', 'App\Http\Controllers\OrderController@RequestOrder')->name('receiver.order');

    Route::get('/history/receiver', 'App\Http\Controllers\RecieverController@History')->name('receiver.history');

    Route::get('/settings/receiver', 'App\Http\Controllers\RecieverController@Settings')->name('receiver.settings');
    Route::post('/settings/receiver/update', 'App\Http\Controllers\UserController@UserUpdate')->name('receiver.update');
});

// Custom
Route::get('/logout', 'App\Http\Controllers\CustomAuthController@Logout')->name('logout');


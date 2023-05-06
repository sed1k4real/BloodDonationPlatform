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
    Route::post('/register', 'App\Http\Controllers\GuestController@RegisterUser')->name('register-user');

    Route::get('/login', 'App\Http\Controllers\GuestController@Login')->name('login');
    Route::post('/login', 'App\Http\Controllers\CustomAuthController@LoginUser')->name('login-user');

});

// Admin
Route::middleware(['auth','isAdmin'])->group(function() {
    Route::get('/dashboard', 'App\Http\Controllers\AdminController@Dashboard')->name('dashboard');
    Route::get('/insights', 'App\Http\Controllers\AdminController@Insights')->name('insights');

    Route::get('/requests/pending', 'App\Http\Controllers\DonationController@PendingDonation')->name('donation.pending');
    Route::get('/requests/booked', 'App\Http\Controllers\DonationController@BookedDonation')->name('donation.booked');
    Route::get('/requests/denied', 'App\Http\Controllers\DonationController@PendingDonation')->name('donation.denied');
    Route::get('/requests/done', 'App\Http\Controllers\DonationController@PendingDonation')->name('donation.done');

    Route::get('/history', 'App\Http\Controllers\DonationController@DonationLog')->name('admin.history');

    Route::get('/settings', 'App\Http\Controllers\AdminController@Settings')->name('settings');
    Route::post('/settings/update', 'App\Http\Controllers\AdminController@Update')->name('admin.update');

    Route::get('/requests/filter', 'App\Http\Controllers\JobsController@FilterJobs')->name('jobs.filter');

    //Requests Route
    Route::post('/requests/{id}', 'App\Http\Controllers\DonationController@DonationUpdate')->name('jobsUpdate');
});

// Donor
Route::middleware(['auth','isDonor'])->group(function() {
    Route::get('/booking', 'App\Http\Controllers\DonorController@Booking')->name('donor-booking');
    Route::post('/booking/donation', 'App\Http\Controllers\DonationController@DonationBooking')->name('donation-booking');

    Route::get('/settings/donor', 'App\Http\Controllers\DonorController@Settings')->name('donor.settings');
    Route::get('/history/donor', 'App\Http\Controllers\DonorController@History')->name('donor.history');


});

// Reciever
Route::middleware(['auth','isReciever'])->group(function() {
});

// Custom
Route::get('/logout', 'App\Http\Controllers\CustomAuthController@Logout')->name('logout');


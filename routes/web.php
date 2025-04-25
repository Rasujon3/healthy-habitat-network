<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\OfferController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Registration Routes
Route::get('/register', function() {
    return view('auth.register-choice');
})->name('register');

Route::get('/register/resident', [RegisterController::class, 'showResidentRegistrationForm'])->name('register.resident');
Route::post('/register/resident', [RegisterController::class, 'registerResident']);

Route::get('/register/business', [RegisterController::class, 'showBusinessRegistrationForm'])->name('register.business');
Route::post('/register/business', [RegisterController::class, 'registerBusiness']);

Route::get('/register/guest', [RegisterController::class, 'showGuestRegistrationForm'])->name('register.guest');
Route::post('/register/guest', [RegisterController::class, 'createGuestUser']);

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('welcome');
});

// Auth routes provided by Laravel UI
#Auth::routes();

// Protected routes that require authentication
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Areas
    Route::resource('areas', AreaController::class);

    // Businesses
    Route::resource('businesses', BusinessController::class);

    // Products
    Route::resource('products', ProductController::class);
    Route::post('/products/batch-update', [ProductController::class, 'batchUpdateAvailability'])
        ->name('products.batch-update');

    // Residents
    Route::get('/resident/create', [ResidentController::class, 'create'])->name('resident.create');
    Route::post('/resident', [ResidentController::class, 'store'])->name('resident.store');
    Route::get('/resident/edit/{id}', [ResidentController::class, 'edit'])->name('resident.edit');
    Route::put('/resident/{id}', [ResidentController::class, 'update'])->name('resident.update');

    // Votes
    Route::post('/votes', [VoteController::class, 'store'])->name('votes.store');
    Route::delete('/votes/destroy/{id}', [VoteController::class, 'destroy'])->name('votes.destroy');
    Route::get('/popular-products', [VoteController::class, 'popularProducts'])->name('votes.popular');

    // Offers
    Route::resource('offers', OfferController::class);
});

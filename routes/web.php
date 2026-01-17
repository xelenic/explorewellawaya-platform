<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BusinessRegistrationController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\WelcomeController;

Route::get('/', [WelcomeController::class, 'index'])->name('home');

// About Page
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about.index');

// Blog Routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Search Routes
Route::get('/search', [App\Http\Controllers\SearchController::class, 'index'])->name('search.index');
Route::get('/search/autocomplete', [App\Http\Controllers\SearchController::class, 'autocomplete'])->name('search.autocomplete');

// Destination Routes
Route::get('/destinations', [DestinationController::class, 'index'])->name('destinations.index');
Route::get('/destinations/{slug}', [DestinationController::class, 'show'])->name('destinations.show');

// Business Registration Routes
Route::get('/business-registration', [BusinessRegistrationController::class, 'showRegistrationForm'])->name('business-registration.form');
Route::post('/business-registration', [BusinessRegistrationController::class, 'register'])->name('business-registration.submit');
Route::get('/business-registration/success', [BusinessRegistrationController::class, 'success'])->name('business-registration.success');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// Profile Routes
Route::middleware(['auth'])->prefix('profile')->name('profile.')->group(function () {
    Route::get('/settings', [App\Http\Controllers\ProfileController::class, 'settings'])->name('settings');
    Route::post('/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('update');
    Route::post('/update-password', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('update-password');
});

// Business Owner Routes
Route::middleware(['auth'])->prefix('business')->name('business.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Business\DashboardController::class, 'index'])->name('dashboard');
});

// Logout route
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->middleware('auth')->name('logout');

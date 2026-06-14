<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;

// 1. HOME REDIRECT: Redirect guests to login, and logged-in users to dashboard
Route::get('/', function () {
    return Auth::check() ? redirect('/dashboard') : redirect('/login');
});

// 2. STUDENT & GENERAL ROUTES (Requires Login)
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [BookingController::class, 'dashboard'])->name('dashboard');

    // Facilities List & Details
    Route::get('/facilities', [FacilityController::class, 'index'])->name('facilities');
    Route::get('/facilities/{id}', [FacilityController::class, 'show'])->name('facilities.show');

    // My Bookings (Read & Delete CRUD)
    Route::get('/my-bookings', [BookingController::class, 'index'])->name('my.bookings');
    Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');

    // Booking Process (Create CRUD)
    Route::get('/book/{id}', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/book/store', [BookingController::class, 'store'])->name('bookings.store');
});

// 3. ADMIN ROUTES (Step 3: Requires Admin Role)
// This uses the 'can:admin-access' Gate we created in AppServiceProvider
Route::middleware(['auth', 'can:admin-access'])->prefix('admin')->group(function () {
    
    // Admin Management Table
    Route::get('/facilities', [AdminController::class, 'index'])->name('admin.facilities.index');
    
    // Admin CRUD: Delete Venue
    Route::delete('/facilities/{id}', [AdminController::class, 'destroy'])->name('admin.facilities.destroy');
    
    // Admin CRUD: Add Venue
    Route::post('/facilities/store', [AdminController::class, 'store'])->name('admin.facilities.store');
});
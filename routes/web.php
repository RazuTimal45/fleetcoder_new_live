<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StatController;
use App\Http\Controllers\SettingController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;

Route::get('/', [LandingPageController::class, 'index']);
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

// ── dashboard pages (auth required) 
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard',          [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/users',    [DashboardController::class, 'users'])->name('dashboard.users');
    Route::get('/dashboard/contacts', [DashboardController::class, 'contacts'])->name('dashboard.contacts');
    
    // Services
    Route::get('/dashboard/services', [ServiceController::class, 'index'])->name('dashboard.services');
    Route::post('/dashboard/services', [ServiceController::class, 'store'])->name('dashboard.services.store');
    Route::patch('/dashboard/services/{service}', [ServiceController::class, 'update'])->name('dashboard.services.update');
    Route::delete('/dashboard/services/{service}', [ServiceController::class, 'destroy'])->name('dashboard.services.destroy');

    // Stats
    Route::get('/dashboard/stats', [StatController::class, 'index'])->name('dashboard.stats');
    Route::post('/dashboard/stats', [StatController::class, 'store'])->name('dashboard.stats.store');
    Route::patch('/dashboard/stats/{stat}', [StatController::class, 'update'])->name('dashboard.stats.update');
    Route::delete('/dashboard/stats/{stat}', [StatController::class, 'destroy'])->name('dashboard.stats.destroy');

    Route::get('/dashboard/about',    [SettingController::class, 'about'])->name('dashboard.about');
    Route::get('/dashboard/settings', fn() => view('dashboard.settings'))->name('dashboard.settings');
    Route::post('/dashboard/settings', [SettingController::class, 'update'])->name('dashboard.settings.update');
});

// ── profile 
Route::middleware('auth')->group(function () {
    Route::get('/profile',    [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile',  [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::middleware(['auth'])->group(function () {

//     Route::get('/dashboard', [DashboardController::class, 'index'])
//         ->middleware('verified')->name('dashboard');

//     Route::get('/profile', [ProfileController::class, 'edit'])
//         ->name('profile.edit');
// });



Route::inertia('/', 'Home')->name('home');

Route::inertia('/dashboard', 'Dashboard')->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::inertia('/profile', 'Profile/Edit')->middleware(['auth', 'password.confirm'])
    ->name('profile.edit');


require __DIR__ . '/auth.php';

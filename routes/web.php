<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| User Routes (Public)
|--------------------------------------------------------------------------
*/

// Homepage
Route::get('/', function () {
    return view('user.home');
})->name('home');

// Bengkel Search & Detail
Route::get('/bengkel/search', function () {
    return view('user.search');
})->name('bengkel.search');

Route::get('/bengkel/waiting-confirmation', function () {
    return view('user.waiting-confirmation');
})->name('bengkel.waiting-confirmation');

Route::get('/bengkel/dashboard', function () {
    return view('bengkel.dashboard.index');
})->name('bengkel.dashboard');

Route::get('/bengkel/final-price/{id}', function ($id) {
    return view('bengkel.dashboard.final-price');
})->name('bengkel.final-price');

Route::get('/bengkel/{id}', function ($id) {
    return view('user.detail');
})->name('bengkel.detail');

// Authentication Routes
Route::get('/login', function () {
    return view('user.auth.login');
})->name('login');

Route::get('/register', function () {
    return view('user.auth.register');
})->name('register');

/*
|--------------------------------------------------------------------------
| Bengkel Routes (Bengkel Dashboard)
|--------------------------------------------------------------------------
*/

// Moved to top with specific routes to avoid conflict with /bengkel/{id}

/*
|--------------------------------------------------------------------------
| Admin Routes (Admin Dashboard)
|--------------------------------------------------------------------------
*/

// Route::prefix('admin')->name('admin.')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('admin.dashboard.index');
//     })->name('dashboard');
// });

// Example page (untuk referensi)
Route::get('/example', function () {
    return view('example');
})->name('example');

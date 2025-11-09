<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
/*
|--------------------------------------------------------------------------
| User Routes (Public)
|--------------------------------------------------------------------------
*/

// TANPA LOGIN
Route::get('/', fn() => view('landing_page'))->name('landing_page');
Route::get('/about_us', function () {return view('about_us');})->name('about_us');

// Authentikasi dan segala macamnya

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::get('/register_bengkel;', [AuthController::class, 'showRegisterBengkel'])->name('registerBengkel');
Route::post('/register_bengkel', [AuthController::class, 'registerBengkel'])->name('registerBengkel.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard tiap role
Route::middleware(['auth', 'role:admin'])->get('/admin/dashboard', fn() => view('dashboard.admin'))->name('admin.dashboard');
Route::middleware(['auth', 'role:bengkel'])->get('/bengkel/dashboard', fn() => view('dashboard.bengkel'))->name('bengkel.dashboard');
Route::middleware(['auth', 'role:user'])->get('/user/dashboard', fn() => view('dashboard.user'))->name('user.dashboard');

/*
|--------------------------------------------------------------------------
| Dashboard per Role
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    // ADMIN
    Route::middleware('role:admin')
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {

            // halaman awal admin
            Route::get('/dashboard', fn() => view('admin.dashboard.index'))->name('dashboard.index');
            Route::get('/calon-bengkel/{id}', [AdminController::class, 'showCalonBengkel'])->name('calonBengkel.show');
            Route::post('/calon-bengkel/{id}/approve', [AdminController::class, 'approveCalonBengkel'])->name('calonBengkel.approve');
            
            // Kelola User
            Route::get('/users', fn() => view('admin.users.index'))->name('users.index');

        });



    // BENGKEL
    Route::middleware('role:bengkel')
        ->prefix('bengkel')
        ->name('bengkel.')
        ->group(function () {
            Route::get('/dashboard', fn() => view('bengkel.dashboard.index'))->name('dashboard');
            Route::get('/final-price/{id}', fn($id) => view('bengkel.dashboard.final-price'))->name('final-price');
        });

    // USER
    Route::middleware('role:user')
        ->prefix('user')
        ->name('user.')
        ->group(function () {
            Route::get('/dashboard', fn() => view('user.search'))->name('search');
            Route::get('/waiting-confirmation', fn() => view('user.waiting-confirmation'))->name('waiting-confirmation');
        });
});



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
// Route::get('/example', function () {
//     return view('example');
// })->name('example');

// Route::get('/bengkel/search', fn() => view('user.search'))->name('bengkel.search');
// Route::get('/bengkel/{id}', fn($id) => view('user.detail'))->name('bengkel.detail');

// Homepage
// Route::get('/', function () {
//     return view('user.home');
// })->name('home');

// Bengkel Search & Detail
// Route::get('/bengkel/search', function () {
//     return view('user.search');
// })->name('bengkel.search');

// Route::get('/bengkel/waiting-confirmation', function () {
//     return view('user.waiting-confirmation');
// })->name('bengkel.waiting-confirmation');

// Route::get('/bengkel/dashboard', function () {
//     return view('bengkel.dashboard.index');
// })->name('bengkel.dashboard');

// Route::get('/bengkel/final-price/{id}', function ($id) {
//     return view('bengkel.dashboard.final-price');
// })->name('bengkel.final-price');

// Route::get('/bengkel/{id}', function ($id) {
//     return view('user.detail');
// })->name('bengkel.detail');


// Authentication Routes
// Route::get('/login', function () {
//     return view('user.auth.login');
// })->name('login');

// Route::get('/register', function () {
//     return view('user.auth.register');
// })->name('register');

// Route::get('/about_us', fn() => view('about_us'))->name('about_us');

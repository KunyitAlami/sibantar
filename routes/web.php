<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PaymentController;
/*
|--------------------------------------------------------------------------
| User Routes (Public)
|--------------------------------------------------------------------------
*/

// TANPA LOGIN
Route::get('/', fn() => view('landing_page'))->name('landing_page');
Route::get('/about_us', function () {return view('about_us');})->name('about_us');

// Authentikasi dan segala macamnya
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.post')->middleware('guest');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->name('register.post')->middleware('guest');

Route::get('/register_bengkel', [AuthController::class, 'showRegisterBengkel'])->name('registerBengkel')->middleware('guest');
Route::post('/register_bengkel', [AuthController::class, 'registerBengkel'])->name('registerBengkel.post')->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Midtrans Payment Callback (webhook)
Route::post('/payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');

// Route Home - Redirect berdasarkan role setelah login
Route::get('/home', [AuthController::class, 'redirectToDashboard'])->name('home')->middleware('auth');

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
            Route::get('/history', fn() => view('user.history'))->name('history');
            Route::get('/bengkel/{id}', fn($id) => view('user.detail'))->name('bengkel.detail');
            Route::get('/bengkel/{id}/confirmation', fn($id) => view('user.confirmation'))->name('bengkel.confirmation');
            
            // Order Tracking dengan status dinamis
            Route::get('/order-tracking/{orderId}', function ($orderId) {
                $status = request()->get('status', 'waiting');
                return view('user.order-tracking', compact('orderId', 'status'));
            })->name('order-tracking');
            
            // Halaman waiting confirmation dengan timer 2 menit
            Route::get('/waiting-confirmation', function () {
                return view('user.waiting-confirmation');
            })->name('waiting-confirmation');
            
            Route::get('/mechanic-on-the-way', function () {
                return redirect()->route('user.order-tracking', ['orderId' => 1, 'status' => 'on-the-way']);
            })->name('mechanic-on-the-way');
            
            // Payment routes
            Route::post('/create-transaction', [PaymentController::class, 'createTransaction'])->name('create-transaction');
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

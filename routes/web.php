<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Bengkel\BengkelController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Livewire\Bengkel\OrderTrackingBengkel;

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

            Route::get('/dashboard', [AdminController::class, 'index'])
                ->name('dashboard.index');

            Route::get('/calon-bengkel/{id}', [AdminController::class, 'showCalonBengkel'])
                ->name('calonBengkel.show');

            Route::post('/calon-bengkel/{id}/approve', [AdminController::class, 'approveCalonBengkel'])
                ->name('calonBengkel.approve');

            Route::get('/users', fn() => view('admin.users.index'))
                ->name('users.index');

            Route::get('/tambah-user', [AdminController::class, 'tambahUser'])
                ->name('tambah-user');

            Route::post('/tambah-user/store', [AdminController::class, 'tambahUserStore'])
                ->name('tambah-user-store');

            Route::get('/edit-user/{id_user}', [AdminController::class, 'editUser'])
                ->name('edit-user');

            Route::post('/edit-user/store', [AdminController::class, 'updateUser'])
                ->name('update-user');

            Route::get('/calonBengkel/{id_calon_bengkel}', [AdminController::class, 'showCalon'])
                ->name('calonBengkel.show');

            Route::post('/approve-calon-bengkel/{id}', [AdminController::class, 'approveCalonBengkel'])
                ->name('calonBengkel.approve');


        });




    // BENGKEL
    Route::middleware('role:bengkel')
        ->prefix('bengkel')
        ->name('bengkel.')
        ->group(function () {
            // Route::get('/dashboard', fn() => view('bengkel.dashboard.index'))->name('dashboard');
            // Route::get('/final-price/{id}', fn($id) => view('bengkel.dashboard.final-price'))->name('final-price');


            Route::get('/dashboard/bengkel/{id_bengkel}', [BengkelController::class, 'index'])->name('dashboard');
            Route::get('/bengkel/order-tracking/{orderId}', [BengkelController::class, 'orderTracking'])->name('order-tracking');

            Route::delete('/bengkel/layanan/{id}', [BengkelController::class, 'hapusLayanan'])->name('hapusLayanan');
            Route::get('/form/bengkel/{id_bengkel}', [BengkelController::class, 'formTambahLayanan'])->name('tambahLayanan');
            Route::post('/bengkel/layanan/{id_bengkel}/store', [BengkelController::class, 'storeLayananBengkel'])->name('layanan.store');

            Route::get('/form/bengkel/{id_bengkel}', [BengkelController::class, 'formTambahLayanan'])->name('tambahLayanan');
            Route::get('/bengkel/layanan/{id}/edit', [BengkelController::class, 'editLayanan'])->name('edit.layanan');

            Route::post('/bengkel/layanan/{id_layanan_bengkel}/update',[BengkelController::class, 'updateLayananBengkel'])->name('layanan.update');

            Route::get('/report/{id_order}', [BengkelController::class, 'reportOrder'])->name('report.order');
            Route::post('/report-store/{id_order}', [BengkelController::class, 'reportStore'])->name('report.store');
        });

    // USER
    Route::middleware('role:user')
        ->prefix('user')
        ->name('user.')
        ->group(function () {
            Route::get('/eksplor_bengkel', fn() => view('user.eksplor_bengkel'))->name('eksplor_bengkel');            
            Route::get('/dashboard', fn() => view('user.dashboard'))->name('dashboard');
            // Route::get('/history', fn() => view('user.history'))->name('history');
            // Route::get('/bengkel/{id}', fn($id) => view('user.detail'))->name('bengkel.detail');
            Route::get('/bengkel/{id}/confirmation', fn($id) => view('user.confirmation'))->name('bengkel.confirmation');

            // Route::get('/mapping/edit-cpmk-cpl', [CPMKMPLMapController::class, 'edit_cpmk_cpl'])->name('cpmk-cpl-mapping.edit');
            // Route::put('/mapping/cpmk-cpl', [CPMKMPLMapController::class, 'updateCPMKCPLMap'])->name('cpmk-cpl-mapping.update');

            // yang pakai controller di sini
            Route::get('/search', [UserController::class, 'search'])->name('search');
            Route::get('/bengkel/{id_bengkel}/layanan/{id_layanan}',[UserController::class, 'detail_bengkel'])->name('bengkel.detail');
            Route::get('/bengkel/{id_bengkel}/confirmation/{id_layanan}',[UserController::class, 'konfirmasi_pesanan'])->name('bengkel.confirmation');
            Route::post('/order', [UserController::class, 'pesan'])->name('order_store');
            Route::get('/waiting-confirmation/{order_id}', [UserController::class, 'waiting_confirmation'])->name('waiting_confirmation');
            Route::get('/history-order/{id_user}', [UserController::class, 'history'])->name('history');
            Route::get('/order-tracking/{id}', [UserController::class, 'orderTracking'])->name('order-tracking');


            // Report/Laporan
            // Route::get('/report', fn() => view('user.report'))->name('report');
            // Route::post('/report', fn() => redirect()->route('user.history'))->name('report.store');
            Route::get('/report/{id_order}', [UserController::class, 'reportOrder'])
                ->name('report.order');

            Route::post('/report-store/{id_order}', [UserController::class, 'reportStore'])
                ->name('report.store');

            Route::get('/user/invoice/{id_order}', [UserController::class, 'invoice'])->name('invoice');

            Route::get('/review/{id_order}', [UserController::class, 'review'])
                ->name('review');

            Route::post('/review-store/{id_order}', [UserController::class, 'saveReview'])
                ->name('review.store');


            
            // Order Tracking berdasarkan status
            // Route::get('/order-tracking/on-the-way/{id}', function ($id) {
            //     return view('user.order-tracking', ['orderId' => $id, 'status' => 'on-the-way']);
            // })->name('order-tracking.on-the-way');
            
            // Route::get('/order-tracking/in-progress/{id}', function ($id) {
            //     return view('user.order-tracking', ['orderId' => $id, 'status' => 'in-progress']);
            // })->name('order-tracking.in-progress');
            
            // Route::get('/order-tracking/completed/{id}', function ($id) {
            //     return view('user.order-tracking', ['orderId' => $id, 'status' => 'completed']);
            // })->name('order-tracking.completed');
            
            // Order Tracking dengan status dinamis (fallback)
            // Route::get('/order-tracking/{orderId}', function ($orderId) {
            //     $status = request()->get('status', 'waiting');
            //     return view('user.order-tracking', compact('orderId', 'status'));
            // })->name('order-tracking');
            
            // Halaman waiting confirmation dengan timer 2 menit
            // Route::get('/waiting-confirmation', function () {
            //     return view('user.waiting-confirmation');
            // })->name('waiting-confirmation');
            
            // Route::get('/mechanic-on-the-way', function () {
            //     return redirect()->route('user.order-tracking', ['orderId' => 1, 'status' => 'on-the-way']);
            // })->name('mechanic-on-the-way');
            
            // Payment routes
            Route::post('/create-transaction', [PaymentController::class, 'createTransaction'])->name('create-transaction');
            Route::post('/confirm-transaction', [PaymentController::class, 'confirmTransaction'])->name('confirm-transaction');
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

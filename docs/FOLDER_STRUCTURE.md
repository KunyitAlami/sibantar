# Struktur Folder Views - SIBANTAR

Folder views telah direorganisasi berdasarkan role/aktor untuk memudahkan management.

## 📁 Struktur Folder

```
resources/views/
│
├── user/                       # User/Customer Pages
│   ├── home.blade.php         # Homepage (Landing page)
│   ├── auth/                  # Authentication
│   │   ├── login.blade.php
│   │   └── register.blade.php
│   └── bengkel/               # Bengkel Search & Detail
│       ├── search.blade.php   # Search results
│       └── detail.blade.php   # Bengkel detail
│
├── bengkel/                    # Bengkel Owner Dashboard
│   └── dashboard/
│       └── index.blade.php    # Dashboard bengkel
│
├── admin/                      # Admin Dashboard
│   └── dashboard/
│       └── index.blade.php    # Dashboard admin
│
└── components/                 # Reusable Components
    ├── layout.blade.php       # Main layout (with header & footer)
    ├── layout-simple.blade.php # Simple layout (no header/footer)
    ├── header.blade.php       # Header component
    └── footer.blade.php       # Footer component
```

## 🎭 Role & Halaman

### 1. **User/Customer** (`resources/views/user/`)

Halaman untuk pengguna umum yang mencari bantuan darurat.

**Pages:**

-   `home.blade.php` - Landing page dengan form pencarian bengkel
-   `auth/login.blade.php` - Halaman login
-   `auth/register.blade.php` - Halaman registrasi
-   `bengkel/search.blade.php` - Hasil pencarian bengkel
-   `bengkel/detail.blade.php` - Detail bengkel

**Routes:**

```php
Route::get('/', ...)->name('home');
Route::get('/login', ...)->name('login');
Route::get('/register', ...)->name('register');
Route::get('/bengkel/search', ...)->name('bengkel.search');
Route::get('/bengkel/{id}', ...)->name('bengkel.detail');
```

### 2. **Bengkel Owner** (`resources/views/bengkel/`)

Halaman untuk pemilik bengkel mengelola data dan pesanan.

**Pages:**

-   `dashboard/index.blade.php` - Dashboard bengkel

**Routes (Planned):**

```php
Route::prefix('bengkel')->name('bengkel.')->group(function () {
    Route::get('/dashboard', ...)->name('dashboard');
    // Route::get('/orders', ...)->name('orders');
    // Route::get('/profile', ...)->name('profile');
    // Route::get('/services', ...)->name('services');
});
```

### 3. **Admin** (`resources/views/admin/`)

Halaman untuk admin mengelola seluruh sistem.

**Pages:**

-   `dashboard/index.blade.php` - Dashboard admin

**Routes (Planned):**

```php
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', ...)->name('dashboard');
    // Route::get('/users', ...)->name('users');
    // Route::get('/bengkel', ...)->name('bengkel');
    // Route::get('/transactions', ...)->name('transactions');
});
```

## 🧩 Components

### Layout Components

-   `layout.blade.php` - Layout lengkap dengan header & footer (untuk halaman umum)
-   `layout-simple.blade.php` - Layout tanpa header & footer (untuk halaman search & detail)

### UI Components

-   `header.blade.php` - Navigation bar
-   `footer.blade.php` - Footer dengan informasi & links

## 📝 Konvensi Penamaan

### File Naming

-   Gunakan **lowercase** dan **kebab-case**: `search-results.blade.php`
-   Untuk index: gunakan `index.blade.php`
-   Untuk form: `create.blade.php`, `edit.blade.php`

### View Naming (dalam routes)

```php
// Format: {role}.{folder}.{file}
view('user.home')                    // resources/views/user/home.blade.php
view('user.auth.login')              // resources/views/user/auth/login.blade.php
view('user.bengkel.search')          // resources/views/user/bengkel/search.blade.php
view('bengkel.dashboard.index')      // resources/views/bengkel/dashboard/index.blade.php
view('admin.dashboard.index')        // resources/views/admin/dashboard/index.blade.php
```

## 🔄 Migration dari Struktur Lama

### Perubahan yang Dilakukan:

```
OLD                           →  NEW
─────────────────────────────────────────────────────────
home.blade.php                →  user/home.blade.php
auth/login.blade.php          →  user/auth/login.blade.php
auth/register.blade.php       →  user/auth/register.blade.php
bengkel/search.blade.php      →  user/bengkel/search.blade.php
bengkel/detail.blade.php      →  user/bengkel/detail.blade.php
```

### Routes Updated:

```php
// OLD
view('home')
view('auth.login')
view('bengkel.search')

// NEW
view('user.home')
view('user.auth.login')
view('user.bengkel.search')
```

## 📋 Next Steps

### User Pages (To Be Created)

-   [ ] `user/booking/create.blade.php` - Form booking bengkel
-   [ ] `user/booking/confirmation.blade.php` - Konfirmasi booking
-   [ ] `user/booking/history.blade.php` - Riwayat booking
-   [ ] `user/profile/index.blade.php` - Profil user
-   [ ] `user/profile/edit.blade.php` - Edit profil

### Bengkel Pages (To Be Created)

-   [ ] `bengkel/orders/index.blade.php` - List pesanan
-   [ ] `bengkel/orders/detail.blade.php` - Detail pesanan
-   [ ] `bengkel/profile/index.blade.php` - Profil bengkel
-   [ ] `bengkel/profile/edit.blade.php` - Edit profil
-   [ ] `bengkel/services/index.blade.php` - List layanan
-   [ ] `bengkel/services/edit.blade.php` - Edit layanan

### Admin Pages (To Be Created)

-   [ ] `admin/users/index.blade.php` - Kelola user
-   [ ] `admin/bengkel/index.blade.php` - Kelola bengkel
-   [ ] `admin/transactions/index.blade.php` - Kelola transaksi
-   [ ] `admin/reports/index.blade.php` - Laporan sistem

## 💡 Tips

1. **Selalu gunakan prefix folder** sesuai role saat membuat view baru
2. **Gunakan layout yang sesuai**:
    - `<x-layout>` untuk halaman dengan header/footer
    - `<x-layout-simple>` untuk halaman tanpa header/footer
3. **Konsisten dengan naming convention** untuk memudahkan maintenance
4. **Group routes** berdasarkan role menggunakan `Route::prefix()` dan `Route::name()`

## 🔒 Authentication & Authorization

Untuk implementasi ke depan, tambahkan middleware:

```php
// Bengkel routes - hanya bisa diakses oleh bengkel owner
Route::prefix('bengkel')->middleware(['auth', 'role:bengkel'])->group(function () {
    //...
});

// Admin routes - hanya bisa diakses oleh admin
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    //...
});
```

---

Last Updated: November 1, 2025

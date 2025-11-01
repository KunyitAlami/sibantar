# Authentication Pages - SIBANTAR

## 📄 Halaman yang Tersedia

### 1. **Login Page** (`/login`)

-   File: `resources/views/auth/login.blade.php`
-   Route: `route('login')`
-   URL: `http://127.0.0.1:8000/login`

**Fitur:**

-   ✅ Email & Password input
-   ✅ Toggle show/hide password
-   ✅ Remember me checkbox
-   ✅ Forgot password link
-   ✅ Social login (Google & Facebook)
-   ✅ Link ke halaman register
-   ✅ Form validation error display
-   ✅ Mobile responsive

---

### 2. **Register Page** (`/register`)

-   File: `resources/views/auth/register.blade.php`
-   Route: `route('register')`
-   URL: `http://127.0.0.1:8000/register`

**Fitur:**

-   ✅ Nama lengkap input
-   ✅ Email input
-   ✅ Nomor telepon input
-   ✅ Password & konfirmasi password
-   ✅ Toggle show/hide password (untuk kedua field)
-   ✅ Terms & conditions checkbox
-   ✅ Social login (Google & Facebook)
-   ✅ Link ke halaman login
-   ✅ Form validation error display
-   ✅ Mobile responsive

---

## 🎨 Design Features

### **Layout**

-   Centered card design
-   Logo SIBANTAR di atas form
-   White card dengan shadow
-   Background neutral-50
-   Min-height 100vh (full screen)

### **Form Elements**

-   Custom input styling (`.input` class)
-   Error state dengan border merah
-   Password toggle button
-   Social login buttons
-   Divider "Atau masuk/daftar dengan"

### **Colors Used**

-   Primary: `primary-700` (#0051BA)
-   Danger: `danger-500` (untuk error)
-   Neutral: `neutral-50`, `neutral-600`, `neutral-700`
-   White background untuk card

---

## 🔧 Backend Integration (Untuk Backend Developer)

### **Login Form Data:**

```php
POST /login
{
    'email': 'user@example.com',
    'password': 'password123',
    'remember': true/false
}
```

### **Register Form Data:**

```php
POST /register
{
    'name': 'John Doe',
    'email': 'user@example.com',
    'phone': '08123456789',
    'password': 'password123',
    'password_confirmation': 'password123',
    'terms': true
}
```

### **Validation Rules (Saran):**

```php
// Login
'email' => 'required|email',
'password' => 'required|min:8',

// Register
'name' => 'required|string|max:255',
'email' => 'required|email|unique:users',
'phone' => 'required|regex:/^08[0-9]{9,11}$/',
'password' => 'required|min:8|confirmed',
'terms' => 'required|accepted',
```

### **Error Handling:**

Halaman sudah support Laravel validation errors:

```blade
@error('email')
    <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
@enderror
```

---

## 📱 Responsive Design

### **Mobile (< 768px):**

-   Full width card dengan padding
-   Stack layout
-   Touch-friendly buttons

### **Desktop (> 768px):**

-   Centered card (max-width: 448px)
-   Larger spacing
-   Hover effects

---

## 🚀 Testing

### **Test URLs:**

```
Login:    http://127.0.0.1:8000/login
Register: http://127.0.0.1:8000/register
```

### **Features to Test:**

-   [ ] Toggle password visibility
-   [ ] Form validation
-   [ ] Remember me checkbox
-   [ ] Links navigation (login ↔ register)
-   [ ] Responsive design (mobile & desktop)
-   [ ] Social login buttons (UI only, perlu backend integration)

---

## 🔗 Routes

```php
// web.php
Route::get('/login', fn() => view('auth.login'))->name('login');
Route::get('/register', fn() => view('auth.register'))->name('register');

// Untuk backend, tambahkan:
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
```

---

## 🎯 Next Steps untuk Backend

1. **Install Laravel Breeze/Sanctum** (opsional)
2. **Create AuthController:**
    - `login()` method
    - `register()` method
    - `logout()` method
3. **Setup validation rules**
4. **Setup authentication middleware**
5. **Create dashboard redirect** setelah login
6. **Implement forgot password** feature
7. **Social login integration** (Google & Facebook OAuth)

---

## 📝 Catatan

-   Social login buttons **hanya UI**, perlu backend integration
-   Forgot password link **belum ada halaman**, perlu dibuat
-   Form menggunakan `@csrf` untuk security
-   Password minimal 8 karakter (sesuai standar Laravel)
-   Error messages otomatis muncul dari Laravel validation

---

## 🎨 Customization

### **Ubah Logo:**

```blade
<img src="{{ asset('images/logo.svg') }}" alt="SIBANTAR Logo">
```

### **Ubah Warna Button:**

```blade
<button class="btn btn-primary">   <!-- Biru -->
<button class="btn btn-secondary"> <!-- Orange -->
```

### **Tambah Field Baru:**

```blade
<div>
    <label for="field_name" class="block text-sm font-medium text-neutral-700 mb-2">
        Label
    </label>
    <input type="text" id="field_name" name="field_name" class="input" required>
    @error('field_name')
        <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
    @enderror
</div>
```

---

**Created:** November 1, 2025
**Last Updated:** November 1, 2025

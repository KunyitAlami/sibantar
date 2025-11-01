# SIBANTAR - Quick Reference

## 🚀 Available Pages

| Page               | URL               | Route Name       | File                                       |
| ------------------ | ----------------- | ---------------- | ------------------------------------------ |
| **Homepage**       | `/`               | `home`           | `resources/views/home.blade.php`           |
| **Search Results** | `/bengkel/search` | `bengkel.search` | `resources/views/bengkel/search.blade.php` |
| **Bengkel Detail** | `/bengkel/{id}`   | `bengkel.detail` | `resources/views/bengkel/detail.blade.php` |
| **Login**          | `/login`          | `login`          | `resources/views/auth/login.blade.php`     |
| **Register**       | `/register`       | `register`       | `resources/views/auth/register.blade.php`  |
| **Example**        | `/example`        | `example`        | `resources/views/example.blade.php`        |

---

## 🎨 Components

### **Reusable Components:**

-   `<x-layout>` - Main layout dengan header & footer
-   `<x-header />` - Header dengan logo & menu
-   `<x-footer />` - Footer

### **CSS Classes:**

```html
<!-- Buttons -->
<button class="btn btn-primary">Primary</button>
<button class="btn btn-secondary">Secondary</button>
<button class="btn btn-outline">Outline</button>
<button class="btn btn-primary btn-sm">Small</button>
<button class="btn btn-primary btn-lg">Large</button>

<!-- Cards -->
<div class="card p-6">Content</div>

<!-- Inputs -->
<input type="text" class="input" placeholder="Text" />
<select class="select">
    ...
</select>
```

---

## 🎯 Color Palette

```css
/* Primary - Blue */
primary-700: #0051BA    /* Main brand */
primary-600: #1976D2
primary-100: #BBDEFB

/* Secondary - Orange */
secondary-500: #FF9800  /* Accent/CTA */
secondary-600: #FB8C00

/* Status Colors */
success-600: #43A047    /* Green */
danger-600: #E53935     /* Red */
warning-600: #FDD835    /* Yellow */
info-600: #00ACC1       /* Cyan */

/* Neutral - Gray */
neutral-900: #212121    /* Dark text */
neutral-700: #616161    /* Body text */
neutral-600: #757575
neutral-300: #E0E0E0
neutral-50: #FAFAFA     /* Background */
```

---

## 📱 How to Create New Page

```blade
<x-layout>
    <x-slot:title>Page Title - SIBANTAR</x-slot:title>

    <section class="py-12">
        <div class="container mx-auto px-4">
            <h1>Your Content</h1>
        </div>
    </section>
</x-layout>
```

Add route in `routes/web.php`:

```php
Route::get('/your-page', function () {
    return view('your-page');
})->name('your.page');
```

---

## 🔧 Development Commands

```bash
# Terminal 1 - Laravel Server
php artisan serve

# Terminal 2 - Vite (Tailwind CSS)
npm run dev

# Build for production
npm run build
```

---

## 📂 Project Structure

```
sibantar/
├── resources/
│   ├── css/
│   │   └── app.css              # Tailwind + Custom CSS
│   ├── js/
│   │   └── app.js
│   └── views/
│       ├── components/
│       │   ├── layout.blade.php  # Main layout
│       │   ├── header.blade.php  # Header
│       │   └── footer.blade.php  # Footer
│       ├── auth/
│       │   ├── login.blade.php   # Login page
│       │   └── register.blade.php # Register page
│       ├── home.blade.php        # Homepage
│       └── example.blade.php     # Component examples
├── public/
│   └── images/
│       └── logo.svg              # Logo file
├── routes/
│   └── web.php                   # Routes
├── tailwind.config.js            # Tailwind config
└── docs/
    └── AUTH_PAGES.md             # Auth documentation
```

---

## 🎨 Typography Scale

| Class       | Size | Usage          |
| ----------- | ---- | -------------- |
| `text-xs`   | 12px | Small labels   |
| `text-sm`   | 14px | Captions       |
| `text-base` | 16px | Body text      |
| `text-lg`   | 18px | Subheadings    |
| `text-xl`   | 20px | Card titles    |
| `text-2xl`  | 24px | Section titles |
| `text-3xl`  | 30px | H3             |
| `text-4xl`  | 36px | H2             |
| `text-5xl`  | 48px | H1             |

---

## ✅ Completed Features

-   [x] Custom Tailwind configuration
-   [x] Color palette & typography
-   [x] Reusable components (header, footer, layout)
-   [x] Homepage with hero & features
-   [x] Search form with vehicle type & problem
-   [x] Search results page with map preview
-   [x] Bengkel list cards with ratings
-   [x] Filter buttons (UI only)
-   [x] Bengkel detail page
-   [x] Tabs navigation (Info, Layanan, Ulasan, Lokasi)
-   [x] Operating hours display
-   [x] Services & pricing list
-   [x] Reviews/testimonials
-   [x] Login page with password toggle
-   [x] Register page with validation
-   [x] Mobile-first responsive design
-   [x] Example page with all components

---

## 🚧 TODO (Backend)

-   [ ] Authentication controller
-   [ ] Form validation
-   [ ] Database migrations for users
-   [ ] Password reset functionality
-   [ ] Social login integration (Google, Facebook)
-   [ ] Dashboard pages
-   [ ] Bengkel search functionality
-   [ ] Booking system

---

## 📖 Documentation

-   `DESIGN_SYSTEM.md` - Complete design system
-   `README_FRONTEND.md` - Frontend guide
-   `docs/AUTH_PAGES.md` - Authentication pages guide
-   `docs/BENGKEL_PAGES.md` - Bengkel search & detail pages guide
-   `QUICK_REFERENCE.md` - This file

---

## 🌐 Test URLs

```
Homepage:        http://127.0.0.1:8000/
Search Results:  http://127.0.0.1:8000/bengkel/search?vehicle_type=Motor&problem_type=Ban+Bocor
Bengkel Detail:  http://127.0.0.1:8000/bengkel/1
Login:           http://127.0.0.1:8000/login
Register:        http://127.0.0.1:8000/register
Example:         http://127.0.0.1:8000/example
```

---

**Last Updated:** November 1, 2025

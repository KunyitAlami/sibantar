# 🚗 SIBANTAR - Sistem Bantuan Darurat Kendaraan Terdekat

[![Laravel](https://img.shields.io/badge/Laravel-11.x-red.svg)](https://laravel.com)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind-3.x-38bdf8.svg)](https://tailwindcss.com)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

## 📋 Deskripsi

SIBANTAR (Sistem Bantuan Darurat Kendaraan Terdekat) adalah platform web yang membantu pengguna menemukan bengkel terdekat dengan cepat dan aman saat kendaraan mengalami masalah.

## ✨ Fitur

-   🔍 Pencarian bengkel terdekat
-   ⚡ Respon cepat dalam 2 menit
-   ⭐ Rating bengkel terpercaya
-   📍 Live tracking status
-   💳 Pembayaran fleksibel (Cash/Cashless)
-   📱 Mobile-first responsive design

## 🛠️ Tech Stack

-   **Backend**: Laravel 11.x
-   **Frontend**: Blade Templates + Tailwind CSS
-   **Font**: Inter (Google Fonts)
-   **Build Tool**: Vite
-   **Database**: MySQL

## 🎨 Design System

Dokumentasi lengkap design system tersedia di [DESIGN_SYSTEM.md](DESIGN_SYSTEM.md)

### Color Palette

-   **Primary**: #0051BA (Blue)
-   **Secondary**: #FF9800 (Orange)
-   **Success**: #43A047 (Green)
-   **Danger**: #E53935 (Red)

### Typography

-   **Font**: Inter
-   **Sizes**: 12px - 48px (responsive)

## 📂 Struktur Project

```
sibantar/
├── app/
│   ├── Http/Controllers/
│   └── Models/
├── resources/
│   ├── css/
│   │   └── app.css           # Tailwind + Custom CSS
│   ├── js/
│   │   └── app.js
│   └── views/
│       ├── components/
│       │   ├── header.blade.php   # Header component
│       │   ├── footer.blade.php   # Footer component
│       │   └── layout.blade.php   # Main layout
│       └── home.blade.php         # Homepage
├── routes/
│   └── web.php
├── tailwind.config.js
├── vite.config.js
└── DESIGN_SYSTEM.md
```

## 🚀 Cara Menjalankan

### Prerequisites

-   PHP >= 8.2
-   Composer
-   Node.js >= 18
-   MySQL

### Instalasi

1. **Clone repository**

    ```bash
    git clone https://github.com/KunyitAlami/sibantar.git
    cd sibantar
    ```

2. **Install dependencies**

    ```bash
    composer install
    npm install
    ```

3. **Setup environment**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Configure database** di `.env`

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=sibantar
    DB_USERNAME=root
    DB_PASSWORD=
    ```

5. **Run migrations**

    ```bash
    php artisan migrate
    ```

6. **Run development server**

    Terminal 1 - Laravel:

    ```bash
    php artisan serve
    ```

    Terminal 2 - Vite (Tailwind):

    ```bash
    npm run dev
    ```

7. **Buka browser**
    ```
    http://localhost:8000
    ```

## 🎯 Development Guide

### Membuat Halaman Baru

```blade
<x-layout>
    <x-slot:title>Judul Halaman</x-slot:title>

    <section class="py-12">
        <div class="container mx-auto px-4">
            <h1>Konten Halaman</h1>
        </div>
    </section>
</x-layout>
```

### Menggunakan Component

**Header:**

```blade
<x-header />
```

**Footer:**

```blade
<x-footer />
```

**Button:**

```html
<button class="btn btn-primary">Click Me</button>
```

**Card:**

```html
<div class="card p-6">
    <h3>Card Title</h3>
    <p>Card content</p>
</div>
```

## 📱 Responsive Breakpoints

-   **Mobile**: < 768px
-   **Tablet**: 768px - 1024px
-   **Desktop**: > 1024px

## 🤝 Kontribusi

Jika Anda ingin berkontribusi:

1. Fork repository ini
2. Buat branch baru (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

## 📄 License

Distributed under the MIT License. See `LICENSE` for more information.

## 👥 Team

-   **Frontend Developer**: [Your Name]
-   **Backend Developer**: [Backend Developer Name]

## 📞 Kontak

-   Email: info@sibantar.com
-   Website: [sibantar.com](https://sibantar.com)

---

**Note untuk Frontend Developer:**

-   Gunakan `primary-700` untuk warna utama
-   Gunakan `secondary-500` untuk accent/CTA
-   Semua halaman harus menggunakan `<x-layout>` component
-   Ikuti design system di `DESIGN_SYSTEM.md`
-   Mobile-first approach (desain untuk mobile terlebih dahulu)
-   Gunakan class `.btn`, `.card`, `.input` untuk konsistensi

Made with ❤️ by SIBANTAR Team

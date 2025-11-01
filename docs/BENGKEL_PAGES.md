# Bengkel Pages - SIBANTAR

## 📄 Halaman Bengkel

### 1. **Search Results Page** (`/bengkel/search`)

-   **File**: `resources/views/bengkel/search.blade.php`
-   **Route**: `route('bengkel.search')`
-   **URL**: `http://127.0.0.1:8000/bengkel/search?vehicle_type=Motor&problem_type=Ban+Bocor`

**Fitur:**

-   ✅ Map preview (placeholder untuk Google Maps/Leaflet)
-   ✅ Header dengan info pencarian (jenis kendaraan & masalah)
-   ✅ Back button ke homepage
-   ✅ Filter buttons (Terdekat, Rating, Harga, Buka Sekarang)
-   ✅ Results count
-   ✅ Daftar bengkel dalam card format
-   ✅ Rating bintang visual
-   ✅ Jarak & estimasi waktu
-   ✅ Estimasi harga
-   ✅ Button "Detail" & "Pesan"
-   ✅ Load more functionality
-   ✅ Mobile responsive dengan sticky filter

**Data yang Ditampilkan:**

-   Nama bengkel
-   Rating (5 bintang visual)
-   Jumlah ulasan
-   Jarak dari lokasi user (km)
-   Estimasi waktu tempuh (menit)
-   Range harga estimasi
-   Gambar bengkel (placeholder)

---

### 2. **Detail Bengkel Page** (`/bengkel/{id}`)

-   **File**: `resources/views/bengkel/detail.blade.php`
-   **Route**: `route('bengkel.detail', ['id' => 1])`
-   **URL**: `http://127.0.0.1:8000/bengkel/1`

**Fitur:**

-   ✅ Hero image bengkel
-   ✅ Back button
-   ✅ Status badge (Buka/Tutup dengan animasi pulse)
-   ✅ Nama & rating bengkel
-   ✅ Quick info cards (Jarak, Waktu, Harga)
-   ✅ Action buttons (Hubungi & Pesan)
-   ✅ Tabs navigation (Informasi, Layanan, Ulasan, Lokasi)
-   ✅ Mobile responsive

**Tab Contents:**

#### **Tab: Informasi**

-   Jam operasional (per hari)
-   Deskripsi bengkel
-   Fasilitas (WiFi, Musholla, dll)

#### **Tab: Layanan**

-   Daftar layanan & harga
-   Deskripsi singkat setiap layanan

#### **Tab: Ulasan**

-   Review dari customer
-   Rating bintang per review
-   Nama reviewer & tanggal
-   Komentar lengkap

#### **Tab: Lokasi**

-   Alamat lengkap
-   Map preview (placeholder)
-   Button "Buka di Google Maps"

---

## 🎨 Design Features

### **Search Results Page**

**Layout:**

-   Map di atas (h-48 mobile, h-64 tablet, h-80 desktop)
-   Overlay header dengan back button & info
-   Sticky filter bar
-   Grid card layout untuk bengkel

**Card Design:**

-   Horizontal layout (gambar kiri, info kanan)
-   Gambar 80x80px (mobile), 96x96px (desktop)
-   Rating dengan bintang kuning
-   Icon untuk jarak & waktu
-   Harga dengan warna orange (secondary-600)
-   2 buttons: outline & primary

### **Detail Page**

**Layout:**

-   Hero image 64 (mobile), 80 (desktop)
-   Back button overlay
-   Status badge di pojok kanan bawah
-   Quick info dalam 4 cards (2x2 grid mobile, 4 kolom desktop)
-   Sticky tabs navigation
-   Tab content dengan spacing proper

**Tabs:**

-   Active tab: border bawah biru & text biru
-   Inactive: border transparent & text gray
-   Hover effect

---

## 🔗 User Flow

```
Homepage
  ↓ (Pilih kendaraan & masalah)
  ↓ Submit form
Search Results
  ↓ (Klik "Detail" atau "Pesan")
  ↓
Detail Bengkel
  ↓ (Klik "Pesan Sekarang")
  ↓
Booking Form (belum dibuat)
```

---

## 📱 Responsive Design

### **Mobile (< 640px):**

-   Map height: 192px
-   Card padding: 16px
-   2 kolom untuk quick info
-   Stack buttons vertically

### **Tablet (640px - 1024px):**

-   Map height: 256px
-   Card padding: 24px
-   4 kolom untuk quick info
-   Buttons side by side

### **Desktop (> 1024px):**

-   Map height: 320px
-   Max container width dengan padding
-   Hover effects
-   Larger spacing

---

## 🔧 Backend Integration (Untuk Backend Developer)

### **Search Results API:**

**Request:**

```php
GET /bengkel/search?vehicle_type=Motor&problem_type=Ban+Bocor&lat=-6.2088&lng=106.8456
```

**Response:**

```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "name": "Bengkel Jaya Motor",
            "rating": 5.0,
            "total_reviews": 124,
            "distance": 0.6,
            "estimated_time": 15,
            "price_min": 25000,
            "price_max": 50000,
            "image": "url_to_image",
            "is_open": true,
            "specialties": ["Motor", "Ban Bocor", "Aki"]
        }
    ],
    "total": 12
}
```

### **Detail Bengkel API:**

**Request:**

```php
GET /bengkel/1
```

**Response:**

```json
{
    "id": 1,
    "name": "Bengkel Jaya Motor",
    "rating": 5.0,
    "total_reviews": 124,
    "description": "...",
    "images": ["url1", "url2"],
    "distance": 0.6,
    "estimated_time": 15,
    "price_range": "Rp 25.000 - Rp 50.000",
    "is_open": true,
    "operating_hours": {
        "monday": "08:00-17:00",
        "sunday": "closed"
    },
    "facilities": ["WiFi", "Ruang Tunggu", "Musholla"],
    "services": [
        {
            "name": "Ganti Ban",
            "description": "...",
            "price": 25000
        }
    ],
    "reviews": [
        {
            "user": "Ahmad",
            "rating": 5,
            "comment": "...",
            "date": "2025-10-30"
        }
    ],
    "address": "Jl. ...",
    "latitude": -6.2088,
    "longitude": 106.8456,
    "phone": "+628123456789"
}
```

---

## 🗺️ Map Integration

**Recommended Libraries:**

-   **Google Maps API** (berbayar tapi powerful)
-   **Leaflet.js** (gratis, open source)
-   **Mapbox** (freemium)

**Setup Google Maps:**

```html
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
<script>
    const map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: -6.2088, lng: 106.8456 },
        zoom: 15,
    });

    // Add markers for bengkel
    bengkelList.forEach((bengkel) => {
        new google.maps.Marker({
            position: { lat: bengkel.lat, lng: bengkel.lng },
            map: map,
            title: bengkel.name,
        });
    });
</script>
```

---

## ✅ Features Checklist

### **Search Page:**

-   [x] Map preview
-   [x] Filter buttons UI
-   [x] Bengkel cards
-   [x] Rating stars
-   [x] Distance & time display
-   [x] Price range
-   [x] Responsive design
-   [ ] Filter functionality (backend)
-   [ ] Sort functionality (backend)
-   [ ] Real map integration
-   [ ] Load more / pagination

### **Detail Page:**

-   [x] Hero image
-   [x] Quick info cards
-   [x] Tabs navigation
-   [x] Operating hours
-   [x] Facilities list
-   [x] Services & pricing
-   [x] Reviews display
-   [x] Location map placeholder
-   [ ] Real images from backend
-   [ ] Real map integration
-   [ ] Booking form
-   [ ] Call functionality
-   [ ] Share button

---

## 🎯 Next Steps

1. **Backend API Integration:**

    - Create API endpoints untuk search & detail
    - Setup database untuk bengkel data
    - Implement geolocation calculation

2. **Map Integration:**

    - Pilih map provider (Google Maps/Leaflet)
    - Setup API key
    - Implement markers & clustering

3. **Booking System:**

    - Create booking form page
    - Setup booking confirmation
    - Email/WhatsApp notification

4. **Additional Features:**
    - Favorite/bookmark bengkel
    - Filter by rating, price, distance
    - Sort options
    - Image gallery/lightbox
    - Share to social media

---

**Created:** November 1, 2025
**Last Updated:** November 1, 2025

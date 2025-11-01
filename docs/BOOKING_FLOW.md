# Booking Flow - SIBANTAR

## 📋 Overview

Dokumentasi lengkap untuk alur pemesanan (booking flow) bengkel di SIBANTAR, dari pencarian hingga konfirmasi.

---

## 🔄 Flow Diagram

```
1. Home Page (/)
   ↓
2. Search Bengkel (/bengkel/search)
   ↓
3. Bengkel Detail (/bengkel/{id})
   ↓
4. Confirmation Modal (rincian biaya)
   ↓
5. Waiting Confirmation (/bengkel/waiting-confirmation)
   ↓ (setelah bengkel konfirmasi)
6. Tracking/On Going (belum dibuat)
   ↓
7. Complete/Rating (belum dibuat)
```

---

## 📄 Halaman yang Sudah Dibuat

### 1. **Home Page** (`/`)

-   File: `resources/views/user/home.blade.php`
-   Deskripsi: Landing page dengan hero section dan CTA "Cari Bengkel"

### 2. **Search Bengkel** (`/bengkel/search`)

-   File: `resources/views/user/bengkel/search.blade.php`
-   Layout: `layout-simple.blade.php` (tanpa header/footer)
-   Fitur:
    -   ✅ Interactive map dengan Leaflet.js
    -   ✅ User location marker (blue circle)
    -   ✅ Bengkel markers (orange pin)
    -   ✅ Filter: Terdekat, Rating, Harga, Buka Sekarang
    -   ✅ Bengkel cards dengan info lengkap
    -   ✅ Responsive design

### 3. **Bengkel Detail** (`/bengkel/{id}`)

-   File: `resources/views/user/bengkel/detail.blade.php`
-   Layout: `layout-simple.blade.php`
-   Fitur:
    -   ✅ Bengkel info lengkap
    -   ✅ Rating & reviews
    -   ✅ Tabs: Informasi, Layanan, Ulasan, Lokasi
    -   ✅ WhatsApp contact button
    -   ✅ Tombol "Pesan Sekarang"
    -   ✅ Confirmation modal dengan rincian biaya

### 4. **Confirmation Modal**

-   File: Terintegrasi di `detail.blade.php`
-   Fitur:
    -   ✅ Rincian biaya layanan
    -   ✅ Ongkos datang
    -   ✅ Biaya malam (20:00-06:00) - otomatis muncul
    -   ✅ Total pembayaran
    -   ✅ Catatan estimasi harga
    -   ✅ Format Rupiah otomatis
    -   ✅ Tombol: Batal / Konfirmasi

### 5. **Waiting Confirmation** (`/bengkel/waiting-confirmation`)

-   File: `resources/views/user/bengkel/waiting-confirmation.blade.php`
-   Layout: `layout-simple.blade.php`
-   Fitur:
    -   ✅ Countdown timer 2 menit (02:00)
    -   ✅ Order ID (#SB4238012)
    -   ✅ Detail pesanan (kendaraan, masalah, estimasi biaya)
    -   ✅ Info bengkel yang dipilih
    -   ✅ Auto-cancel jika tidak ada konfirmasi
    -   ✅ Manual cancel button
    -   ✅ Modal konfirmasi pembatalan
    -   ✅ Redirect ke search page setelah cancel
    -   ✅ Warning visual saat < 30 detik (warna merah)

---

## ⏱️ Countdown Timer Logic

### **Timer Duration:**

-   Total: **2 menit (120 detik)**
-   Warning state: < 30 detik (text berubah merah)
-   Auto-cancel: Saat timer = 00:00

### **Timer Behavior:**

```javascript
// Initial: 02:00 (orange)
let timeLeft = 120;

// Update every second
setInterval(() => {
    timeLeft--;
    updateDisplay(); // Format: MM:SS

    if (timeLeft <= 30) {
        // Change to red
        countdown.classList.add("text-error-600");
    }

    if (timeLeft <= 0) {
        // Auto cancel
        showAutoCancelModal();
    }
}, 1000);
```

---

## 💰 Pricing Calculation

### **Biaya yang Dihitung:**

1. **Harga Layanan** - Sesuai jenis layanan yang dipilih
2. **Ongkos Datang** - Biaya kedatangan bengkel ke lokasi user
3. **Biaya Malam** - Ditambahkan jika jam 20:00-06:00

### **Formula:**

```javascript
Total = Harga Layanan + Ongkos Datang + Biaya Malam (jika ada)

// Contoh Siang Hari (07:00-19:59):
Total = 100.000 + 20.000 + 0 = Rp 120.000

// Contoh Malam Hari (20:00-05:59):
Total = 100.000 + 20.000 + 30.000 = Rp 150.000
```

### **Night Time Detection:**

```javascript
function isNightTime() {
    const now = new Date();
    const hour = now.getHours();
    return hour >= 20 || hour < 6; // 20:00-05:59
}
```

---

## 🎯 User Actions

### **Di Halaman Detail:**

1. User klik "Pesan Sekarang"
2. Modal konfirmasi muncul dengan rincian biaya
3. User review rincian:
    - Harga layanan
    - Ongkos datang
    - Biaya malam (jika berlaku)
    - Total
4. User klik "Konfirmasi" atau "Batal"

### **Di Halaman Waiting Confirmation:**

1. Timer mulai countdown (2 menit)
2. User menunggu konfirmasi bengkel
3. **Opsi A - Bengkel Konfirmasi:**
    - Timer berhenti
    - Redirect ke halaman tracking (belum dibuat)
4. **Opsi B - Timeout (2 menit habis):**
    - Auto-cancel modal muncul
    - Redirect ke search page
5. **Opsi C - User Cancel Manual:**
    - Konfirmasi modal muncul
    - Jika Ya → Auto-cancel modal → Redirect ke search
    - Jika Tidak → Kembali menunggu

---

## 🔔 Modal Types

### **1. Confirmation Modal** (di Detail Page)

-   **Trigger:** Klik tombol "Pesan Sekarang"
-   **Content:** Rincian biaya dan total
-   **Actions:**
    -   Batal (close modal)
    -   Konfirmasi (redirect ke waiting page)

### **2. Auto Cancel Modal** (di Waiting Page)

-   **Trigger:** Timer habis ATAU user confirm manual cancel
-   **Content:** "Pesanan Dibatalkan" message
-   **Actions:**
    -   Cari Bengkel Lain (redirect to search)

### **3. Manual Cancel Confirm Modal** (di Waiting Page)

-   **Trigger:** Klik "Batalkan Pesanan"
-   **Content:** "Apakah yakin batalkan?"
-   **Actions:**
    -   Tidak (close modal, lanjut tunggu)
    -   Ya, Batalkan (show auto cancel modal)

---

## 📱 Responsive Design

Semua halaman menggunakan mobile-first approach:

-   **Mobile:** Full width, stack layout
-   **Desktop:** Max-width 1200px container
-   **Cards:** Consistent padding & shadow
-   **Modals:** Centered, max-width 448px

---

## 🎨 Design Consistency

### **Colors:**

```css
Primary: #0051BA (blue)
Secondary: #FF9800 (orange)
Warning: #FFA726 (amber)
Error: #EF5350 (red)
Success: #66BB6A (green)
```

### **Typography:**

```css
Font Family: Inter (from Google Fonts)
Heading: font-bold
Body: font-medium / font-normal
Small text: text-sm (14px)
```

### **Components:**

-   `.btn` - Button base
-   `.btn-primary` - Primary button
-   `.btn-outline` - Outline button
-   `.card` - Card container
-   `.input` - Form input

---

## 🔧 Backend Integration Needed

### **1. Create Order API:**

```php
POST /api/orders/create
{
    "bengkel_id": 1,
    "user_id": 123,
    "service_type": "Ganti Ban",
    "service_price": 100000,
    "delivery_fee": 20000,
    "night_fee": 30000,
    "total": 150000,
    "user_location": {
        "lat": -3.3186,
        "lng": 114.5942
    },
    "vehicle_type": "Motor",
    "problem_description": "Ban bocor"
}

Response:
{
    "success": true,
    "order_id": "SB4238012",
    "expires_at": "2025-11-01 14:34:32" // 2 minutes from now
}
```

### **2. Waiting for Bengkel Confirmation:**

```php
// Polling atau WebSocket
GET /api/orders/{order_id}/status

Response (Waiting):
{
    "status": "waiting_confirmation",
    "time_left": 95 // seconds
}

Response (Confirmed):
{
    "status": "confirmed",
    "bengkel_response_time": "2025-11-01 14:33:15",
    "estimated_arrival": "15 menit"
}

Response (Timeout):
{
    "status": "cancelled",
    "reason": "timeout"
}
```

### **3. Cancel Order API:**

```php
POST /api/orders/{order_id}/cancel
{
    "reason": "user_cancelled"
}

Response:
{
    "success": true,
    "message": "Order cancelled"
}
```

---

## 🚀 Next Steps

### **Halaman yang Perlu Dibuat:**

1. **Tracking Page** - Monitor posisi bengkel real-time
2. **Service Complete Page** - Konfirmasi selesai
3. **Rating & Review Page** - User kasih rating
4. **Order History** - Riwayat pesanan
5. **User Dashboard** - Profile & settings

### **Features to Implement:**

-   [ ] Real-time notification (Firebase/Pusher)
-   [ ] WebSocket untuk live tracking
-   [ ] Payment integration
-   [ ] SMS/Email notification
-   [ ] bengkel dashboard untuk terima/tolak order
-   [ ] Admin dashboard untuk monitoring

---

## 📊 Data Flow

```
User Action          →  Frontend          →  Backend API        →  Database
───────────────────────────────────────────────────────────────────────────
Klik "Pesan"        →  Show modal        →  -                  →  -
Klik "Konfirmasi"   →  Redirect          →  POST /orders       →  INSERT order
Waiting page load   →  Start timer       →  GET /status (poll) →  SELECT order
Timer expires       →  Show cancel modal →  POST /cancel       →  UPDATE order
Bengkel confirms    →  Redirect tracking →  Webhook/WS update  →  UPDATE order
```

---

## 🔒 Security Notes

1. **CSRF Protection:** Semua form harus pakai `@csrf`
2. **Authentication:** User harus login sebelum pesan
3. **Order Ownership:** Verify user owns the order
4. **Rate Limiting:** Prevent spam ordering
5. **Validation:** Validate semua input dari user

---

## 🧪 Testing Checklist

### **Confirmation Modal:**

-   [ ] Modal muncul saat klik "Pesan Sekarang"
-   [ ] Harga layanan tampil benar
-   [ ] Ongkos datang tampil benar
-   [ ] Biaya malam muncul jika jam 20:00-06:00
-   [ ] Total dihitung dengan benar
-   [ ] Format Rupiah benar (Rp 100.000)
-   [ ] Tombol "Batal" close modal
-   [ ] Tombol "Konfirmasi" redirect ke waiting page

### **Waiting Confirmation:**

-   [ ] Timer mulai dari 02:00
-   [ ] Timer countdown setiap detik
-   [ ] Timer warna berubah merah saat < 30 detik
-   [ ] Auto-cancel modal muncul saat timer 00:00
-   [ ] Order ID tampil (#SB4238012)
-   [ ] Detail pesanan tampil lengkap
-   [ ] Info bengkel tampil benar
-   [ ] Tombol "Batalkan Pesanan" berfungsi
-   [ ] Konfirmasi pembatalan muncul
-   [ ] Redirect ke search page setelah cancel

---

**Created:** November 1, 2025
**Last Updated:** November 1, 2025

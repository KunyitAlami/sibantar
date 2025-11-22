<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $order->id_order }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            color: #333;
            line-height: 1.6;
            font-size: 12px;
        }
        
        .container {
            padding: 40px;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .header {
            display: table;
            width: 100%;
            margin-bottom: 30px;
            border-bottom: 3px solid #2563eb;
            padding-bottom: 20px;
        }
        
        .header-left {
            display: table-cell;
            width: 60%;
            vertical-align: middle;
        }
        
        .header-right {
            display: table-cell;
            width: 40%;
            text-align: right;
            vertical-align: middle;
        }
        
        .logo {
            max-width: 150px;
            height: auto;
            margin-bottom: 10px;
        }
        
        .company-name {
            font-size: 24px;
            font-weight: bold;
            color: #2563eb;
            margin-bottom: 5px;
        }
        
        .company-tagline {
            color: #666;
            font-size: 11px;
        }
        
        .invoice-title {
            font-size: 32px;
            font-weight: bold;
            color: #1e40af;
            margin-bottom: 5px;
        }
        
        .invoice-number {
            font-size: 14px;
            color: #666;
        }
        
        .info-section {
            display: table;
            width: 100%;
            margin-bottom: 30px;
        }
        
        .info-left, .info-right {
            display: table-cell;
            width: 50%;
            vertical-align: top;
        }
        
        .info-box {
            background-color: #f8fafc;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        
        .info-title {
            font-size: 11px;
            color: #64748b;
            text-transform: uppercase;
            font-weight: bold;
            margin-bottom: 10px;
            letter-spacing: 0.5px;
        }
        
        .info-content {
            font-size: 12px;
            line-height: 1.8;
        }
        
        .info-content strong {
            display: inline-block;
            width: 120px;
            color: #475569;
        }
        
        .status-badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .status-pending {
            background-color: #fef3c7;
            color: #92400e;
        }
        
        .status-dikonfirmasi {
            background-color: #dbeafe;
            color: #1e40af;
        }
        
        .status-diproses {
            background-color: #e0e7ff;
            color: #4338ca;
        }
        
        .status-selesai {
            background-color: #d1fae5;
            color: #065f46;
        }
        
        .status-dibatalkan {
            background-color: #fee2e2;
            color: #991b1b;
        }
        
        .table-container {
            margin-bottom: 30px;
        }
        
        .table-title {
            font-size: 14px;
            font-weight: bold;
            color: #1e293b;
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 2px solid #e2e8f0;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        
        thead {
            background-color: #2563eb;
            color: white;
        }
        
        th {
            padding: 12px 10px;
            text-align: left;
            font-weight: bold;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        td {
            padding: 12px 10px;
            border-bottom: 1px solid #e2e8f0;
        }
        
        tbody tr:hover {
            background-color: #f8fafc;
        }
        
        .text-right {
            text-align: right;
        }
        
        .summary-table {
            width: 350px;
            float: right;
            margin-top: 20px;
        }
        
        .summary-table td {
            padding: 8px 10px;
            border: none;
        }
        
        .summary-row {
            font-size: 12px;
            color: #475569;
        }
        
        .total-row {
            font-size: 16px;
            font-weight: bold;
            color: #1e293b;
            border-top: 2px solid #2563eb !important;
            background-color: #f1f5f9;
        }
        
        .notes-section {
            clear: both;
            margin-top: 40px;
            padding: 15px;
            background-color: #fffbeb;
            border-left: 4px solid #f59e0b;
            border-radius: 5px;
        }
        
        .notes-title {
            font-weight: bold;
            color: #92400e;
            margin-bottom: 5px;
            font-size: 12px;
        }
        
        .notes-content {
            color: #78350f;
            font-size: 11px;
            line-height: 1.6;
        }
        
        .footer {
            margin-top: 50px;
            padding-top: 20px;
            border-top: 2px solid #e2e8f0;
            text-align: center;
            color: #64748b;
            font-size: 10px;
        }
        
        .footer-divider {
            margin: 15px 0;
        }
        
        .contact-info {
            margin-top: 10px;
            line-height: 1.8;
        }
        
        .highlight-box {
            background-color: #eff6ff;
            border: 1px solid #bfdbfe;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }
        
        .location-icon::before {
            content: "📍 ";
        }
        
        .phone-icon::before {
            content: "📞 ";
        }
        
        .email-icon::before {
            content: "✉️ ";
        }
        
        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="header-left">
                <img src="{{ public_path('images/logo.png') }}" alt="SIBANTAR Logo" class="logo">
                <div class="company-name">SIBANTAR</div>
                <div class="company-tagline">Sistem Informasi Bengkel Antar</div>
            </div>
            <div class="header-right">
                <div class="invoice-title">INVOICE</div>
                <div class="invoice-number">#{{ str_pad($order->id_order, 6, '0', STR_PAD_LEFT) }}</div>
            </div>
        </div>
        
        <!-- Info Section -->
        <div class="info-section">
            <div class="info-left">
                <div class="info-box">
                    <div class="info-title">Informasi Pelanggan</div>
                    <div class="info-content">
                        <strong>Nama:</strong> {{ $order->user->username }}<br>
                        <strong>Email:</strong> {{ $order->user->email }}<br>
                        <strong>No. WhatsApp:</strong> {{ $order->user->wa_number ?? '-' }}<br>
                        <strong>ID User:</strong> #{{ $order->user->id_user }}
                    </div>
                </div>
                
                <div class="info-box">
                    <div class="info-title">Lokasi Pelanggan</div>
                    <div class="info-content">
                        <span class="location-icon"></span>
                        Lat: {{ number_format($order->user_latitude, 6) }}<br>
                        <span style="margin-left: 20px;">Long: {{ number_format($order->user_longitude, 6) }}</span>
                    </div>
                </div>
            </div>
            
            <div class="info-right">
                <div class="info-box">
                    <div class="info-title">Informasi Bengkel</div>
                    <div class="info-content">
                        <strong>Nama Bengkel:</strong> {{ $order->bengkel->nama_bengkel }}<br>
                        <strong>Kecamatan:</strong> {{ $order->bengkel->kecamatan }}<br>
                        <strong>Alamat:</strong> {{ $order->bengkel->alamat_lengkap }}<br>
                        <strong>Jam Operasional:</strong> {{ $order->bengkel->jam_operasional }}
                    </div>
                </div>
                
                <div class="info-box">
                    <div class="info-title">Detail Pesanan</div>
                    <div class="info-content">
                        <strong>Tanggal Order:</strong> {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i') }}<br>
                        <strong>Status:</strong> 
                        <span class="status-badge status-{{ strtolower($order->status) }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Service Details Table -->
        <div class="table-container">
            <div class="table-title">Detail Layanan</div>
            <table>
                <thead>
                    <tr>
                        <th style="width: 10%;">No</th>
                        <th style="width: 40%;">Layanan</th>
                        <th style="width: 30%;">Kategori</th>
                        <th style="width: 20%;" class="text-right">Estimasi Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            <strong>{{ $order->layananBengkel->nama_layanan ?? 'Layanan Bengkel' }}</strong><br>
                            <span style="color: #64748b; font-size: 11px;">
                                {{ $order->layananBengkel->deskripsi ?? '-' }}
                            </span>
                        </td>
                        <td>{{ $order->layananBengkel->kategori ?? '-' }}</td>
                        <td class="text-right">Rp {{ number_format($order->estimasi_harga, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Summary -->
        <div class="clearfix">
            <table class="summary-table">
                <tr class="summary-row">
                    <td><strong>Estimasi Harga Layanan:</strong></td>
                    <td class="text-right">Rp {{ number_format($order->estimasi_harga, 0, ',', '.') }}</td>
                </tr>
                <tr class="summary-row">
                    <td><strong>Biaya Layanan Platform:</strong></td>
                    <td class="text-right">Rp 0</td>
                </tr>
                <tr class="summary-row">
                    <td><strong>Pajak & Layanan:</strong></td>
                    <td class="text-right">Rp 0</td>
                </tr>
                <tr class="total-row">
                    <td><strong>TOTAL PEMBAYARAN:</strong></td>
                    <td class="text-right"><strong>Rp {{ number_format($order->total_bayar, 0, ',', '.') }}</strong></td>
                </tr>
            </table>
        </div>
        
        <!-- Notes Section -->
        @if($order->notes)
        <div class="notes-section">
            <div class="notes-title">Catatan Pesanan:</div>
            <div class="notes-content">{{ $order->notes }}</div>
        </div>
        @endif
        
        <!-- Additional Info -->
        <div class="highlight-box" style="margin-top: 30px;">
            <strong style="color: #1e40af;">Informasi Penting:</strong><br>
            <span style="font-size: 11px; color: #475569;">
                • Simpan invoice ini sebagai bukti transaksi<br>
                • Total pembayaran adalah estimasi dan dapat berubah setelah pemeriksaan kendaraan<br>
                • Untuk pertanyaan lebih lanjut, hubungi bengkel melalui informasi kontak di atas<br>
                • Pastikan untuk tiba sesuai waktu yang telah ditentukan
            </span>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <strong style="color: #1e293b;">Terima kasih telah menggunakan layanan SIBANTAR</strong>
            <div class="footer-divider">───────────────────────────────</div>
            <div class="contact-info">
                <span class="email-icon"></span> support@sibantar.com | 
                <span class="phone-icon"></span> +62 812-3456-7890<br>
                www.sibantar.com
            </div>
            <div style="margin-top: 15px; color: #94a3b8; font-size: 9px;">
                Invoice ini dibuat secara otomatis oleh sistem SIBANTAR pada {{ \Carbon\Carbon::now()->format('d F Y, H:i:s') }}<br>
                Dokumen ini sah dan tidak memerlukan tanda tangan
            </div>
        </div>
    </div>
</body>
</html>
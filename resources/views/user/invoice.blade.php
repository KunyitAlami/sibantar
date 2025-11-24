<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $order->id_order }}</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 35px 40px;
        }

        /* BOX INFO */
        .info-box {
            background: #f8fafc;
            border-radius: 5px;
            padding: 12px;
            margin-bottom: 12px;
            border: 1px solid #e2e8f0;
        }

        .info-title {
            font-size: 11px;
            font-weight: bold;
            color: #475569;
            margin-bottom: 6px;
            text-transform: uppercase;
        }

        .info-content strong {
            display: inline-block;
            width: 110px;
            color: #334155;
        }

        /* STATUS */
        .status-badge {
            padding: 4px 10px;
            border-radius: 12px;
            font-weight: bold;
            font-size: 10px;
            text-transform: uppercase;
        }

        .status-pending { background: #fef3c7; color: #92400e; }
        .status-dikonfirmasi { background: #dbeafe; color: #1e40af; }
        .status-diproses { background: #e0e7ff; color: #4338ca; }
        .status-selesai { background: #d1fae5; color: #065f46; }
        .status-dibatalkan { background: #fee2e2; color: #991b1b; }

        /* TABLE LAYANAN */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #2563eb;
            color: #fff;
        }

        th {
            padding: 10px;
            text-transform: uppercase;
            font-size: 11px;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #e2e8f0;
        }

        .text-right {
            text-align: right;
        }

        /* SUMMARY */
        .summary-table {
            width: 300px;
            margin-left: auto;
            margin-top: 10px;
        }

        /* FOOTER */
        .footer {
            text-align: center;
            margin-top: 45px;
            padding-top: 20px;
            border-top: 1px solid #cbd5e1;
            font-size: 10px;
            color: #64748b;
        }
    </style>
</head>

<body>

<div class="container">

    <!-- ================= HEADER (2 KOLOM) ================= -->
    <table style="width: 100%; margin-bottom: 25px;">
        <tr>
            <!-- LEFT -->
            <td style="width: 50%; vertical-align: top;">
                <img src="{{ public_path('images/logo.png') }}"
                     style="max-width: 140px; margin-bottom: 8px;">
                
                <div style="font-size: 24px; font-weight: bold; color: #2563eb;">
                    SIBANTAR
                </div>
                <div style="font-size: 11px; color: #64748b;">
                    Sistem Bantuan Perjalanan Darurat
                </div>
            </td>

            <!-- RIGHT -->
            <td style="width: 50%; vertical-align: top; text-align: right;">
                <div style="font-size: 32px; font-weight: bold; color: #1e40af;">
                    INVOICE
                </div>
                <div style="font-size: 14px; color: #475569; margin-top: 5px;">
                    #{{ str_pad($order->id_order, 6, '0', STR_PAD_LEFT) }}
                </div>
            </td>
        </tr>
    </table>

    <!-- ================= INFO SECTION (2 KOLOM) ================= -->
    <table style="width: 100%; margin-bottom: 20px;">
        <tr>
            <!-- LEFT COLUMN -->
            <td style="width: 50%; vertical-align: top; padding-right: 10px;">

                <div class="info-box">
                    <div class="info-title">Informasi Pelanggan</div>
                    <div class="info-content">
                        <strong>Nama:</strong> {{ $order->user->username }}<br>
                        <strong>Email:</strong> {{ $order->user->email }}<br>
                        <strong>No. WA:</strong> {{ $order->user->wa_number ?? '-' }}
                    </div>
                </div>

                <div class="info-box">
                    <div class="info-title">Lokasi Pelanggan</div>
                    <div class="info-content">
                        Lat: {{ number_format($order->user_latitude, 6) }}<br>
                        Long: {{ number_format($order->user_longitude, 6) }}
                    </div>
                </div>

            </td>

            <!-- RIGHT COLUMN -->
            <td style="width: 50%; vertical-align: top; padding-left: 10px;">

                <div class="info-box">
                    <div class="info-title">Informasi Bengkel</div>
                    <div class="info-content">
                        <strong>Nama:</strong> {{ $order->bengkel->nama_bengkel }}<br>
                        <strong>Kecamatan:</strong> {{ $order->bengkel->kecamatan }}<br>
                        <strong>Alamat:</strong> {{ $order->bengkel->alamat_lengkap }}
                    </div>
                </div>

                <div class="info-box">
                    <div class="info-title">Detail Pesanan</div>
                    <div class="info-content">
                        <strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i') }}<br>

                        <strong>Status:</strong>
                        <span class="status-badge status-{{ strtolower($order->status) }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                </div>

            </td>
        </tr>
    </table>

    <!-- ================= DETAIL LAYANAN ================= -->
    <div style="font-size: 14px; font-weight: bold; margin-bottom: 6px;">
        Detail Layanan
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 10%;">No</th>
                <th style="width: 40%;">Layanan</th>
                <th style="width: 30%;">Kategori</th>
                <th style="width: 20%;" class="text-right">Harga</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>1</td>
                <td><strong>{{ $order->layananBengkel->nama_layanan ?? 'Layanan Bengkel' }}</strong></td>
                <td>{{ $order->layananBengkel->kategori ?? '-' }}</td>
                <td class="text-right">
                    Rp {{ number_format(optional($order->tracking)->finalPrice ?? 0, 0, ',', '.') }}
                </td>
            </tr>
        </tbody>
    </table>

    <!-- ================= SUMMARY ================= -->
    <table class="summary-table">
        <tr>
            <td><strong>Harga Layanan + Biaya Platform</strong></td>
            <td class="text-right">
                Rp {{ number_format(optional($order->tracking)->finalPrice ?? 0, 0, ',', '.') }}
            </td>
        </tr>
    </table>

    <!-- ================= NOTES ================= -->
    @if($order->notes)
    <div style="
        margin-top: 30px;
        background: #fffbeb;
        border-left: 4px solid #f59e0b;
        padding: 12px;
        border-radius: 4px;">
        <div style="font-weight: bold; color: #92400e; margin-bottom: 4px;">
            Catatan Pesanan:
        </div>

        <div style="color: #78350f; font-size: 11px;">
            {{ $order->notes }}
        </div>
    </div>
    @endif

    <!-- ================= FOOTER ================= -->
    <div class="footer">
        <strong style="color:#1e293b;">Terima kasih telah menggunakan layanan SIBANTAR</strong>
        <br>support@sibantar.com | +62 812-3456-7890  
        <br>www.sibantar.com  
        <br><br>
        <span style="color:#9ca3af;">
            Invoice dibuat otomatis pada {{ \Carbon\Carbon::now()->format('d F Y, H:i:s') }}
        </span>
    </div>

</div>

</body>
</html>

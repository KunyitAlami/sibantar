<x-layout-admin>
    <x-slot:title>Laporan - Admin</x-slot:title>

    <section class="py-8">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.dashboard.index') }}" class="hover:bg-white/10 p-1.5 rounded-md transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-2xl font-bold">Kelola Aduan</h1>
                    </div>
                </div>
            </div>
            <div class="max-w-6xl mx-auto">
                <div class="bg-white rounded-2xl p-6 shadow-lg border border-neutral-100 mt-4">
                    <!-- Laporan Aduan dari Pengguna (dummy) -->
                        <div class="mt-4">
                        <div class="space-y-3">
                                <div class="bg-primary-50 rounded-xl p-4 flex items-start justify-between">
                                <div>
                                        <p class="font-semibold text-neutral-900">Aduan: Kendala Pembayaran</p>
                                        <p class="text-sm text-neutral-600 mt-1">User: johndoe — 23 Nov 2025</p>
                                        <p class="text-sm text-neutral-500 mt-1">Status: Diproses</p>
                                </div>
                                    <div class="flex items-start">
                                        <a href="#" class="inline-flex items-center px-3 py-1.5 bg-white border border-neutral-200 text-neutral-700 rounded-full text-xs">Detail</a>
                                    </div>
                            </div>

                                <div class="bg-primary-50 rounded-xl p-4 flex items-start justify-between">
                                <div>
                                    <p class="font-semibold text-neutral-900">Aduan: Layanan Tidak Responsif</p>
                                    <p class="text-sm text-neutral-600 mt-1">User: janedoe — 22 Nov 2025</p>
                                    <p class="text-sm text-neutral-500 mt-1">Status: Baru</p>
                                </div>
                                    <div class="flex items-start">
                                        <a href="#" class="inline-flex items-center px-3 py-1.5 bg-white border border-neutral-200 text-neutral-700 rounded-full text-xs">Detail</a>
                                    </div>
                            </div>

                                <div class="bg-primary-50 rounded-xl p-4 flex items-start justify-between">
                                <div>
                                    <p class="font-semibold text-neutral-900">Aduan: Data Bengkel Tidak Lengkap</p>
                                    <p class="text-sm text-neutral-600 mt-1">User: arief — 20 Nov 2025</p>
                                    <p class="text-sm text-neutral-500 mt-1">Status: Selesai</p>
                                </div>
                                    <div class="flex items-start">
                                        <a href="#" class="inline-flex items-center px-3 py-1.5 bg-white border border-neutral-200 text-neutral-700 rounded-full text-xs">Detail</a>
                                    </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</x-layout-admin>

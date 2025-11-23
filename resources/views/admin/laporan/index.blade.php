<x-layout-admin>
    <x-slot:title>Laporan - Admin</x-slot:title>

    <section class="bg-gradient-to-br from-primary-700 via-primary-600 to-primary-800 text-white py-4 md:py-4">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="flex items-center gap-3">
                    <a href="/admin/dashboard" class="hover:bg-white/10 p-2 rounded-lg transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-2xl sm:text-2xl md:text-2xl font-bold">Aduan</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-8">
        <div class="container mx-auto px-4">
            <!-- Simple Dummy Laporan Card (with reporter, issue, datetime, detail) -->
            <div class="mt-6">
                <div class="bg-white rounded-lg p-4 shadow-sm border border-neutral-100">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                        <div class="flex-1">
                            <h3 class="text-base font-semibold text-neutral-900">Pengadu: <span class="font-semibold">Rina S.</span></h3>
                            <p class="text-sm text-neutral-600 mt-1">Masalah: Teknisi terlambat datang ke lokasi, estimasi penyelesaian tidak sesuai.</p>
                        </div>
                        <div class="text-sm text-neutral-500">2025-11-23 14:35</div>
                    </div>

                    <div class="mt-3">
                        <a href="#" class="inline-block text-sm px-4 py-2 rounded-xl bg-primary-600 text-white">Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout-admin>

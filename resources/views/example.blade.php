<x-layout>
    <x-slot:title>Contoh Halaman - SIBANTAR</x-slot:title>

    <!-- Page Header -->
    <section class="bg-primary-700 text-white py-12">
        <div class="container mx-auto px-4">
            <h1 class="text-center">Contoh Halaman</h1>
            <p class="text-center text-primary-100 mt-2">Ini adalah template halaman yang bisa Anda gunakan</p>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                
                <!-- Buttons Example -->
                <div class="card p-6 mb-6">
                    <h2 class="mb-4">Contoh Buttons</h2>
                    <div class="flex flex-wrap gap-3">
                        <button class="btn btn-primary">Primary Button</button>
                        <button class="btn btn-secondary">Secondary Button</button>
                        <button class="btn btn-outline">Outline Button</button>
                        <button class="btn btn-primary btn-sm">Small</button>
                        <button class="btn btn-primary btn-lg">Large</button>
                    </div>
                </div>

                <!-- Form Example -->
                <div class="card p-6 mb-6">
                    <h2 class="mb-4">Contoh Form</h2>
                    <form class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium mb-2">Nama Lengkap</label>
                            <input type="text" class="input" placeholder="Masukkan nama lengkap">
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">Email</label>
                            <input type="email" class="input" placeholder="email@example.com">
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">Pilih Kendaraan</label>
                            <div class="relative">
                                <select class="select">
                                    <option>Pilih jenis kendaraan</option>
                                    <option>Motor</option>
                                    <option>Mobil</option>
                                    <option>Truk</option>
                                </select>
                                <svg class="absolute right-4 top-1/2 -translate-y-1/2 w-5 h-5 text-neutral-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">Pesan</label>
                            <textarea class="input" rows="4" placeholder="Tulis pesan Anda..."></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-full">
                            Kirim Pesan
                        </button>
                    </form>
                </div>

                <!-- Cards Grid Example -->
                <div class="mb-6">
                    <h2 class="mb-4">Contoh Grid Cards</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="card p-6">
                            <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <h3 class="font-semibold mb-2">Fitur 1</h3>
                            <p class="text-sm text-neutral-600">Deskripsi fitur pertama</p>
                        </div>

                        <div class="card p-6">
                            <div class="w-12 h-12 bg-secondary-100 rounded-lg flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-secondary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <h3 class="font-semibold mb-2">Fitur 2</h3>
                            <p class="text-sm text-neutral-600">Deskripsi fitur kedua</p>
                        </div>

                        <div class="card p-6">
                            <div class="w-12 h-12 bg-success-100 rounded-lg flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-success-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="font-semibold mb-2">Fitur 3</h3>
                            <p class="text-sm text-neutral-600">Deskripsi fitur ketiga</p>
                        </div>
                    </div>
                </div>

                <!-- Alert Examples -->
                <div class="space-y-4">
                    <h2 class="mb-4">Contoh Alerts</h2>
                    
                    <div class="bg-success-50 border border-success-200 text-success-800 px-4 py-3 rounded-lg">
                        <p class="font-medium">Success!</p>
                        <p class="text-sm">Data berhasil disimpan.</p>
                    </div>

                    <div class="bg-danger-50 border border-danger-200 text-danger-800 px-4 py-3 rounded-lg">
                        <p class="font-medium">Error!</p>
                        <p class="text-sm">Terjadi kesalahan, silakan coba lagi.</p>
                    </div>

                    <div class="bg-warning-50 border border-warning-200 text-warning-800 px-4 py-3 rounded-lg">
                        <p class="font-medium">Warning!</p>
                        <p class="text-sm">Periksa kembali data Anda.</p>
                    </div>

                    <div class="bg-info-50 border border-info-200 text-info-800 px-4 py-3 rounded-lg">
                        <p class="font-medium">Info!</p>
                        <p class="text-sm">Informasi penting untuk Anda.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

</x-layout>

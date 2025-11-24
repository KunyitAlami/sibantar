<x-layout>
    <x-slot:title>SIBANTAR - Bantuan Darurat Kendaraan Terdekat</x-slot:title>

    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-primary-700 to-primary-900 text-white">
        <div class="container mx-auto px-4 py-12 lg:py-20">
            <div class="max-w-2xl mx-auto text-center">
                <h1 class="mb-4">
                    Bantuan Darurat Kendaraan Terdekat
                </h1>
                <p class="text-primary-100 text-sm lg:text-base mb-8">
                    Temukan bengkel terdekat dengan cepat dan aman<br class="hidden lg:block">
                    saat kendaraan Anda bermasalah
                </p>

                <!-- Search Form Card -->
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 lg:p-8 shadow-xl text-left">
                    <form action="{{ route('login') }}" method="GET" class="space-y-6">
                        <!-- Jenis Kendaraan -->
                        <div class="form-control w-full">
                            <label class="label justify-start">
                                <span class="label-text text-white font-medium text-base">Jenis Kendaraan</span>
                            </label>
                            <select name="vehicle_type" class="select select-bordered w-full bg-white text-neutral-700 text-base !h-14 !min-h-0 !leading-normal" required>
                                <option disabled selected value="">Pilih jenis kendaraan</option>
                                <option value="Motor">Motor</option>
                                <option value="Mobil">Mobil</option>
                                <option value="Truk">Truk</option>
                            </select>
                        </div>

                        <!-- Jenis Masalah -->
                        <div class="form-control w-full">
                            <label class="label justify-start">
                                <span class="label-text text-white font-medium text-base">Jenis Kerusakan</span>
                            </label>
                            <select name="problem_type" class="select select-bordered w-full bg-white text-neutral-700 text-base !h-14 !min-h-0 !leading-normal" required>
                                <option disabled selected value="">Pilih jenis kerusakan</option>
                                <option value="Ban Bocor">Ban Bocor</option>
                                <option value="Aki Tekor">Aki Tekor</option>
                                <option value="Mesin Mati">Mesin Mati</option>
                                <option value="Kecelakaan">Kecelakaan</option>
                                <!-- <option value="Lainnya">Lainnya</option> -->
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-secondary w-full btn-lg gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            Cari Bengkel Terdekat
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-12 lg:py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-center mb-8 lg:mb-12">
                Mengapa Pilih SIBANTAR?
            </h2>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 max-w-5xl mx-auto">
                
                <!-- Feature 1: Respon Cepat -->
                <div class="card p-6 text-center">
                    <div class="w-16 h-16 bg-primary-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-neutral-900 mb-2">Respon Cepat</h3>
                    <p class="text-sm text-neutral-600">Respon bengkel dalam 2 menit</p>
                </div>

                <!-- Feature 2: Bengkel Terpercaya -->
                <div class="card p-6 text-center">
                    <div class="w-16 h-16 bg-warning-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-warning-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-neutral-900 mb-2">Bengkel Terpercaya</h3>
                    <p class="text-sm text-neutral-600">Rating Asli</p>
                </div>

                <!-- Feature 3: Live Status -->
                <div class="card p-6 text-center">
                    <div class="w-16 h-16 bg-success-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-success-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-neutral-900 mb-2">Live Status</h3>
                    <p class="text-sm text-neutral-600">Pantau status di website</p>
                </div>

                <!-- Feature 4: Pembayaran Mudah -->
                <div class="card p-6 text-center">
                    <div class="w-16 h-16 bg-info-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-info-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-neutral-900 mb-2">Pembayaran Mudah</h3>
                    <p class="text-sm text-neutral-600">Cash atau Cashless</p>
                </div>

            </div>
        </div>
    </section>

</x-layout>


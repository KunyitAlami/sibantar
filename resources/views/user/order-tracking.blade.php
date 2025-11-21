<x-layout-user>
    <!-- Header -->
    <section class="bg-white border-b border-neutral-200 sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex items-center gap-4 py-4">
                <a href="{{ route('user.dashboard') }}" class="text-neutral-700 hover:text-primary-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <h1 class="font-bold text-lg text-neutral-900">Progress Layanan</h1>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-6 pb-24">
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto">

                <!-- Status Header -->
                <div class="text-center mb-6">
                    <div class="w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M5 13l4 4L19 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold text-neutral-900 mb-2">Pesanan Sedang Diproses</h1>
                    <p class="text-sm text-neutral-600">Status terbaru akan ditampilkan di sini</p>
                </div>

                <!-- Progress Layanan -->
                @livewire('bengkel.order-progress', ['orderId' => $orderId])
            </div>
        </div>
    </section>
</x-layout-user>

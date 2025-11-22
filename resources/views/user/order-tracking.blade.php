<x-layout-user>
    <!-- Header -->
    <section class="bg-white border-b border-neutral-200 sticky top-16 z-50 shadow-sm">
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

                <!-- Status Header removed as requested -->

                <!-- Progress Layanan -->
                @livewire('bengkel.order-progress', ['orderId' => $orderId])
            </div>
        </div>
    </section>
</x-layout-user>

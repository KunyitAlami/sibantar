<x-layout-admin>
    <x-slot:title>Aktivitas - Admin</x-slot:title>

    <section class="py-8 bg-gradient-to-b from-neutral-50 to-white">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="bg-white rounded-2xl p-6 shadow-lg border border-neutral-100">
                    <h2 class="text-2xl font-bold text-neutral-900 mb-4">Aktivitas Terbaru</h2>

                    {{-- Reuse existing Livewire component which contains Aktivitas UI --}}
                    <livewire:create-management-buttons />
                </div>
            </div>
        </div>
    </section>
</x-layout-admin>

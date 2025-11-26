<x-layout-bengkel>
    <x-slot:title>Dashboard Bengkel - SIBANTAR</x-slot:title>

    <!-- Stats Section with Better Visual Hierarchy -->
    <section class="bg-gradient-to-br from-primary-700 via-primary-600 to-primary-800 text-white py-8">
        <div class="container mx-auto px-4">
            <!-- Main Stats -->
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div class="relative overflow-hidden bg-white bg-opacity-15 backdrop-blur-md rounded-3xl p-6 text-center border border-white border-opacity-20 shadow-xl">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-white opacity-5 rounded-full -mr-10 -mt-10"></div>
                    <div class="relative z-10">
                        <p class="text-7xl font-extrabold mb-2 bg-clip-text text-transparent bg-gradient-to-b from-white to-primary-100">{{ $totalOrdersToday }}</p>
                        <p class="text-sm font-semibold text-primary-50">Order Hari Ini</p>
                        <p class="text-xs text-primary-200 mt-1">
                            {{ now()->translatedFormat('l, d F Y') }}
                        </p>
                    </div>
                </div>
                
                <div class="relative overflow-hidden bg-white bg-opacity-15 backdrop-blur-md rounded-3xl p-6 text-center border border-white border-opacity-20 shadow-xl">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-white opacity-5 rounded-full -mr-10 -mt-10"></div>
                    <div class="relative z-10">
                        <p class="text-7xl font-extrabold mb-2 bg-clip-text text-transparent bg-gradient-to-b from-white to-primary-100">{{ $LayananTotal }}</p>
                        <p class="text-sm font-semibold text-primary-50">Total Layanan</p>
                        <p class="text-xs text-primary-200 mt-1">Aktif</p>
                    </div>
                </div>
            </div>

            <!-- Status Bengkel Card -->
            <div class="bg-white bg-opacity-15 backdrop-blur-md rounded-2xl p-5 border border-white border-opacity-20 shadow-lg">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center gap-3">
                        <div id="statusIcon" class="w-10 h-10 rounded-full flex items-center justify-center shadow-md transition-all duration-300
                            {{ isset($statusBengkel) && $statusBengkel->status == 'buka' ? 'bg-success-500' : 'bg-danger-500' }}">
                            <svg id="statusIconSvg" class="w-6 h-6 text-white transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                @if(isset($statusBengkel) && $statusBengkel->status == 'buka')
                                    <!-- Icon Check untuk Buka -->
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                @else
                                    <!-- Icon X untuk Tutup -->
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                @endif
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-base font-bold">Status Bengkel</h2>
                            <p class="text-xs text-primary-100 transition-all duration-300" id="statusText">
                                {{ isset($statusBengkel) && $statusBengkel->status == 'buka' 
                                    ? 'Buka - Siap Terima Order' 
                                    : 'Tutup - Tidak Menerima Order' 
                                }}
                            </p>
                        </div>
                    </div>
                    <label class="relative inline-block w-16 h-9">
                        <input type="checkbox" id="statusToggle" class="sr-only peer" 
                            {{ isset($statusBengkel) && $statusBengkel->status == 'buka' ? 'checked' : '' }}>
                        <div class="w-16 h-9 bg-white bg-opacity-30 rounded-full peer peer-checked:bg-success-500 peer-focus:ring-2 peer-focus:ring-success-300 transition-all duration-300 cursor-pointer shadow-inner"></div>
                        <div class="absolute left-1 top-1 w-7 h-7 bg-white rounded-full shadow-lg transition-transform duration-300 peer-checked:translate-x-7"></div>
                    </label>
                </div>
            </div>
        </div>
    </section>

    <!-- Order Section -->
    <section class="py-6 bg-gradient-to-b from-neutral-50 to-white min-h-screen">
        <div class="container mx-auto px-4">
            {{-- recent activity --}}
            <div> 
                <livewire:bengkel.bengkel-dashboard :id_bengkel="$id_Bengkel" />
            </div>
        </div>
    </section>

    <!-- Detail Modal -->
    <div id="detailModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-end sm:items-center justify-center p-4">
        <div class="bg-white rounded-t-3xl sm:rounded-2xl w-full sm:max-w-lg max-h-[90vh] overflow-y-auto">
            <div class="sticky top-0 bg-white border-b border-neutral-200 p-4 flex items-center justify-between rounded-t-3xl">
                <h3 class="text-lg font-bold text-neutral-900">Detail Pesanan</h3>
                <button onclick="closeDetail()" class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-neutral-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div id="detailContent" class="p-6">
                <!-- Content will be dynamically inserted -->
            </div>
        </div>
    </div>



</x-layout-bengkel>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggle = document.getElementById('statusToggle');
    const statusText = document.getElementById('statusText');
    const statusIcon = document.getElementById('statusIcon');
    const statusIconSvg = document.getElementById('statusIconSvg');
    const bengkelId = {{ $id_Bengkel ?? 0 }};
    
    console.log('Bengkel ID:', bengkelId);

    // Function untuk update UI
    function updateStatusUI(status) {
        if (status === 'buka') {
            // Update text
            statusText.textContent = 'Buka - Siap Terima Order';
            
            // Update icon background
            statusIcon.classList.remove('bg-danger-500');
            statusIcon.classList.add('bg-success-500');
            
            // Update icon SVG - Check mark
            statusIconSvg.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />';
        } else {
            // Update text
            statusText.textContent = 'Tutup - Tidak Menerima Order';
            
            // Update icon background
            statusIcon.classList.remove('bg-success-500');
            statusIcon.classList.add('bg-danger-500');
            
            // Update icon SVG - X mark
            statusIconSvg.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />';
        }
    }

    // Toggle event listener
    toggle.addEventListener('change', function() {
        const newStatus = toggle.checked ? 'buka' : 'tutup';
        
        // Disable toggle saat proses
        toggle.disabled = true;
        
        // Add loading indicator (optional)
        statusIcon.style.opacity = '0.5';

        fetch(`{{ route('bengkel.updateStatus', ['id' => ':id']) }}`.replace(':id', bengkelId), {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ status: newStatus })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if(data.success) {
                // Update UI dengan animasi
                updateStatusUI(newStatus);
                
                console.log('✅ Status berhasil diupdate:', data.status);
                
                // Optional: Show toast notification
                // showToast('Status berhasil diupdate!', 'success');
            } else {
                // Rollback toggle state
                toggle.checked = !toggle.checked;
                alert('Gagal update status: ' + (data.message || 'Terjadi kesalahan'));
            }
        })
        .catch(error => {
            console.error('❌ Error:', error);
            
            // Rollback toggle state
            toggle.checked = !toggle.checked;
            
            alert('Terjadi kesalahan saat mengupdate status!\n' + error.message);
        })
        .finally(() => {
            // Re-enable toggle
            toggle.disabled = false;
            statusIcon.style.opacity = '1';
        });
    });
});

// Optional: Toast notification function
function showToast(message, type = 'success') {
    const toast = document.createElement('div');
    toast.className = `fixed top-4 right-4 px-6 py-3 rounded-lg shadow-lg text-white z-50 transition-all duration-300 ${
        type === 'success' ? 'bg-success-500' : 'bg-danger-500'
    }`;
    toast.textContent = message;
    
    document.body.appendChild(toast);
    
    setTimeout(() => {
        toast.style.opacity = '0';
        setTimeout(() => toast.remove(), 300);
    }, 3000);
}
</script>
<x-layout-bengkel>
    <x-slot:title>Input Final Price - SIBANTAR</x-slot:title>

    <!-- Header -->
    <section class="bg-white border-b border-neutral-200 sticky top-0 z-50 shadow-sm">
        <div class="container mx-auto px-4">
            <div class="flex items-center gap-4 py-4">
                <a href="/bengkel/dashboard" class="text-neutral-700 hover:text-primary-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <div class="flex-1">
                    <h1 class="font-bold text-lg text-neutral-900">Final Price</h1>
                    <p class="text-sm text-neutral-500">Order #SB4238013</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-6 bg-gradient-to-b from-neutral-50 to-white min-h-screen">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto">

                <!-- Customer Info -->
                <div class="bg-white rounded-2xl p-5 mb-4 shadow-md border border-neutral-100">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <h3 class="font-bold text-xl text-neutral-900 mb-2">Ahmad Hidayat</h3>
                            <div class="flex flex-wrap items-center gap-3 text-sm text-neutral-600">
                                <div class="flex items-center gap-1.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    </svg>
                                    <span>1.8 km</span>
                                </div>
                                <span class="text-neutral-300">•</span>
                                <span>Motor</span>
                            </div>
                        </div>
                        <span class="px-3 py-1 bg-success-100 text-success-700 rounded-full text-xs font-semibold">
                            Dikerjakan
                        </span>
                    </div>

                    <div class="bg-neutral-50 rounded-xl p-4">
                        <p class="text-sm text-neutral-600 mb-1">Masalah</p>
                        <p class="text-neutral-900 font-semibold">Ganti Ban</p>
                        <p class="text-xs text-neutral-500 mt-2">Estimasi Awal: Rp 100.000 - Rp 150.000</p>
                    </div>
                </div>

                <!-- Final Price Form -->
                <div class="bg-white rounded-2xl p-6 shadow-md border border-neutral-100">
                    <h2 class="text-xl font-bold text-neutral-900 mb-5">Rincian Biaya Final</h2>

                    <form id="finalPriceForm">
                        <!-- Service Price -->
                        <div class="mb-5">
                            <label for="servicePrice" class="block text-sm font-semibold text-neutral-700 mb-2">
                                Harga Layanan <span class="text-error-600">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-neutral-500 font-medium">Rp</span>
                                <input 
                                    type="number" 
                                    id="servicePrice" 
                                    name="servicePrice"
                                    class="input pl-12 text-lg font-semibold" 
                                    placeholder="100000"
                                    required
                                >
                            </div>
                            <p class="text-xs text-neutral-500 mt-1">Harga untuk perbaikan/servis yang dilakukan</p>
                        </div>

                        <!-- Delivery Fee -->
                        <div class="mb-5">
                            <label for="deliveryFee" class="block text-sm font-semibold text-neutral-700 mb-2">
                                Ongkos Datang <span class="text-error-600">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-neutral-500 font-medium">Rp</span>
                                <input 
                                    type="number" 
                                    id="deliveryFee" 
                                    name="deliveryFee"
                                    class="input pl-12 text-lg font-semibold" 
                                    placeholder="20000"
                                    value="20000"
                                    required
                                >
                            </div>
                            <p class="text-xs text-neutral-500 mt-1">Biaya perjalanan ke lokasi customer (1.8 km)</p>
                        </div>

                        <!-- Night Fee (if applicable) -->
                        <div class="mb-5" id="nightFeeSection">
                            <label for="nightFee" class="block text-sm font-semibold text-neutral-700 mb-2">
                                Biaya Malam <span class="text-xs font-normal text-neutral-500">(20:00 - 06:00)</span>
                            </label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-neutral-500 font-medium">Rp</span>
                                <input 
                                    type="number" 
                                    id="nightFee" 
                                    name="nightFee"
                                    class="input pl-12 text-lg font-semibold" 
                                    placeholder="0"
                                    value="0"
                                >
                            </div>
                            <p class="text-xs text-neutral-500 mt-1">Tambahan biaya untuk layanan malam hari</p>
                        </div>

                        <!-- Additional Notes -->
                        <div class="mb-6">
                            <label for="notes" class="block text-sm font-semibold text-neutral-700 mb-2">
                                Catatan Tambahan <span class="text-xs font-normal text-neutral-500">(Opsional)</span>
                            </label>
                            <textarea 
                                id="notes" 
                                name="notes"
                                class="input resize-none" 
                                rows="3"
                                placeholder="Contoh: Sudah termasuk biaya ban baru merk XYZ, garansi 1 bulan..."
                            ></textarea>
                            <p class="text-xs text-neutral-500 mt-1">Informasi tambahan untuk customer</p>
                        </div>

                        <!-- Total Summary -->
                        <div class="bg-primary-50 rounded-2xl p-5 mb-6 border border-primary-200">
                            <h3 class="text-sm font-semibold text-neutral-700 mb-4">Ringkasan Total</h3>
                            
                            <div class="space-y-2.5 mb-4">
                                <div class="flex justify-between text-sm">
                                    <span class="text-neutral-600">Harga Layanan</span>
                                    <span class="font-semibold text-neutral-900" id="displayServicePrice">Rp 0</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-neutral-600">Ongkos Datang</span>
                                    <span class="font-semibold text-neutral-900" id="displayDeliveryFee">Rp 20.000</span>
                                </div>
                                <div class="flex justify-between text-sm" id="displayNightFeeRow" style="display: none;">
                                    <span class="text-neutral-600">Biaya Malam</span>
                                    <span class="font-semibold text-secondary-600" id="displayNightFee">Rp 0</span>
                                </div>
                            </div>

                            <div class="border-t border-primary-300 pt-4">
                                <div class="flex justify-between items-center">
                                    <span class="font-bold text-base text-neutral-900">Total Biaya</span>
                                    <span class="font-bold text-2xl text-primary-700" id="displayTotal">Rp 20.000</span>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="grid grid-cols-2 gap-3">
                            <a href="/bengkel/dashboard" class="py-3 text-center text-sm font-semibold text-neutral-700 bg-white border-2 border-neutral-300 rounded-xl hover:bg-neutral-50 transition-all">
                                Batal
                            </a>
                            <button type="submit" class="py-3 text-sm font-bold text-white bg-success-500 rounded-xl hover:bg-success-600 shadow-md hover:shadow-lg transition-all">
                                Kirim ke Customer
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Info Notice -->
                <div class="bg-primary-50 border border-primary-200 rounded-xl p-4 mt-4">
                    <div class="flex gap-3">
                        <svg class="w-5 h-5 text-primary-700 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-sm text-primary-900">
                            <p class="font-semibold mb-1">Informasi Penting:</p>
                            <ul class="list-disc list-inside space-y-1 text-primary-800">
                                <li>Total biaya akan dikirim ke customer untuk persetujuan</li>
                                <li>Customer dapat menerima atau menolak harga final</li>
                                <li>Pastikan semua biaya sudah termasuk dalam perhitungan</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        // Format currency
        function formatCurrency(amount) {
            return 'Rp ' + parseInt(amount || 0).toLocaleString('id-ID');
        }

        // Calculate and update total
        function updateTotal() {
            const servicePrice = parseInt(document.getElementById('servicePrice').value) || 0;
            const deliveryFee = parseInt(document.getElementById('deliveryFee').value) || 0;
            const nightFee = parseInt(document.getElementById('nightFee').value) || 0;

            const total = servicePrice + deliveryFee + nightFee;

            // Update display
            document.getElementById('displayServicePrice').textContent = formatCurrency(servicePrice);
            document.getElementById('displayDeliveryFee').textContent = formatCurrency(deliveryFee);
            document.getElementById('displayNightFee').textContent = formatCurrency(nightFee);
            document.getElementById('displayTotal').textContent = formatCurrency(total);

            // Show/hide night fee row
            const nightFeeRow = document.getElementById('displayNightFeeRow');
            if (nightFee > 0) {
                nightFeeRow.style.display = 'flex';
            } else {
                nightFeeRow.style.display = 'none';
            }
        }

        // Add event listeners
        document.getElementById('servicePrice').addEventListener('input', updateTotal);
        document.getElementById('deliveryFee').addEventListener('input', updateTotal);
        document.getElementById('nightFee').addEventListener('input', updateTotal);

        // Form submission
        document.getElementById('finalPriceForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = {
                servicePrice: document.getElementById('servicePrice').value,
                deliveryFee: document.getElementById('deliveryFee').value,
                nightFee: document.getElementById('nightFee').value,
                notes: document.getElementById('notes').value,
                total: parseInt(document.getElementById('servicePrice').value || 0) + 
                       parseInt(document.getElementById('deliveryFee').value || 0) + 
                       parseInt(document.getElementById('nightFee').value || 0)
            };

            // Show loading
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.disabled = true;
            submitBtn.textContent = 'Mengirim...';

            // Simulate API call
            setTimeout(() => {
                // Show success notification
                showNotification('Final price berhasil dikirim ke customer!', 'success');
                
                // Redirect back to dashboard after 1.5s
                setTimeout(() => {
                    window.location.href = '/bengkel/dashboard';
                }, 1500);
            }, 1000);
        });

        // Simple notification function
        function showNotification(message, type = 'info') {
            const colors = {
                success: 'bg-success-500',
                info: 'bg-primary-500',
                error: 'bg-error-500'
            };
            
            const notification = document.createElement('div');
            notification.className = `fixed bottom-4 right-4 ${colors[type]} text-white px-6 py-3 rounded-xl shadow-lg z-50 transform transition-all duration-300 translate-y-20 opacity-0`;
            notification.textContent = message;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.classList.remove('translate-y-20', 'opacity-0');
            }, 100);
            
            setTimeout(() => {
                notification.classList.add('translate-y-20', 'opacity-0');
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        }

        // Initialize total on page load
        updateTotal();

        // Auto-check if night time and suggest night fee
        const now = new Date();
        const hour = now.getHours();
        if (hour >= 20 || hour < 6) {
            document.getElementById('nightFee').value = '30000';
            updateTotal();
        }
    </script>
    @endpush

</x-layout-bengkel>

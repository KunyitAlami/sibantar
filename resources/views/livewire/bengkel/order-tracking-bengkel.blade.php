<div wire:poll.1000ms="refreshTracking">
    <div class="max-w-2xl mx-auto py-6">

        <!-- Flash Message -->
        @if(session()->has('success'))
            <div class="p-3 bg-success-100 text-success-700 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if(session()->has('error'))
            <div class="p-3 bg-error-100 text-error-700 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- Customer Info -->
        <div class="bg-white rounded-2xl p-5 mb-4 shadow-md border border-neutral-100 mt-4 ml-4 mr-4">
            <div class="mb-4">
                <h1 class="font-bold text-2xl">Order Detail</h1>
            </div>
            <div class="flex justify-between mb-4">
                <div>
                    <h3 class="font-bold text-xl">{{ $tracking->order->user->username ?? 'Customer' }}</h3>
                    <p class="text-sm text-neutral-500">Order #{{ $tracking->order->id_order ?? '' }}</p>
                </div>
                {{-- <span class="px-3 py-1 bg-success-100 text-success-700 rounded-full text-xs font-semibold">
                    Dikerjakan
                </span> --}}
            </div>
            <div class="bg-neutral-50 rounded-xl p-6">
                <p class="text-sm text-neutral-600 mb-1">Masalah:</p>
                <p class="text-neutral-900 font-semibold">{{ $tracking->order->layananBengkel->nama_layanan ?? '-' }}</p>
                <p class="text-sm text-neutral-600 mb-1 mt-2">Jenis Kendaraan:</p>
                <p class="text-neutral-900 font-semibold">{{ $tracking->order->layananBengkel->kategori ?? '-' }}</p>
                <p class="text-sm text-neutral-600 mb-1 mt-2">Catatan Dari Pelanggan:</p>
                <p class="text-neutral-900 font-semibold">{{ $tracking->order->notes ?? '-' }}</p>
                <p class="text-sm text-neutral-600 mb-1 mt-2">Link Lokasi:</p>
                {{-- <p class="text-neutral-900 font-semibold"></p> --}}
                @php
                    $lat = $tracking->order->user_latitude ?? null;
                    $lng = $tracking->order->user_longitude ?? null;
                @endphp

                @if ($lat && $lng)
                    <a 
                        href="https://www.google.com/maps?q={{ $lat }},{{ $lng }}"
                        target="_blank"
                        class="text-primary-600 underline font-semibold"
                    >
                        Buka di Google Maps
                    </a>
                @else
                    <p class="text-neutral-500 italic">Lokasi tidak tersedia</p>
                @endif
                <div class="mt-3" wire:ignore>
                    <div id="map" style="height: 250px; border-radius: 14px;"></div>
                </div>
                <p class="text-xs text-black font-semibold mt-4">Estimasi Awal (Harga + Ongkir): Rp {{ number_format($tracking->order->total_bayar ?? 0,0,',','.') }}</p>
            </div>
        </div>

        {{-- Current Step --}}
        <div class="bg-white rounded-2xl p-5 mb-4 shadow-md border border-neutral-100 mt-4 ml-4 mr-4">
            <div class="mb-4">
                <h1 class="font-bold text-2xl">Progress Pelayanan</h1>
            </div>

            <div class="mb-4">
                @php
                    $isFinished = $tracking->order->status === 'selesai';
                @endphp

                <select 
                    wire:model="currentStep" 
                    wire:change="updateStep($event.target.value)" 
                    class="w-full border rounded-lg p-2 text-base"
                    @if($isFinished) disabled @endif
                >
                    @if($isFinished)
                        <option value="5">Selesai</option>
                    @else
                        @foreach($steps as $key => $label)
                            @if((int)$key >= $currentStep)
                                <option value="{{ $key }}">{{ $label }}</option>
                            @endif
                        @endforeach
                    @endif
                </select>
                <p class="text-xs text-neutral-500 mt-2">
                    Pilih step untuk update status layanan.
                    @if($isFinished) Pesanan sudah selesai, tidak bisa diubah. @endif
                </p>
            </div>

        </div>


        <!-- Final Price Form -->
        <div class="bg-white rounded-2xl p-6 shadow-md border border-neutral-100 mt-4 ml-4 mr-4">
            <h2 class="text-xl font-bold text-neutral-900 mb-5">Rincian Biaya Akhir</h2>

            <form wire:submit.prevent="submitFinalPrice">
                <!-- Service Price -->
                <div class="mb-5">
                    @php
                        $minPrice = $tracking->order->layananBengkel->harga_awal ?? 0;
                        $maxPrice = $tracking->order->layananBengkel->harga_akhir ?? 1000000;
                    @endphp
                    <div class="flex items-center justify-between">
                        <label class="block text-sm font-semibold text-neutral-700 mb-2">Harga Layanan *</label>
                        <p class="text-xs text-neutral-500 mb-2">Rentang: Rp {{ number_format($minPrice,0,',','.') }} — Rp {{ number_format($maxPrice,0,',','.') }}</p>
                    </div>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-neutral-500 font-medium">Rp</span>
                        <input id="servicePriceInput" type="text" inputmode="numeric" pattern="\\d*" maxlength="7"
                            aria-describedby="servicePrice_error"
                            data-min="{{ $tracking->order->layananBengkel->harga_awal ?? 0 }}"
                            data-max="{{ $tracking->order->layananBengkel->harga_akhir ?? 1000000 }}"
                            required 
                            wire:model.defer="servicePrice" 
                            class="input text-lg font-semibold w-full"
                            @if($finalPriceSent) readonly @endif>
                    <p id="servicePrice_error" class="mt-2 text-sm text-danger-600 hidden" role="alert" aria-live="polite"></p>
                    </div>
                </div>

                <!-- Delivery Fee -->
                <div class="mb-5">
                    <label class="block text-sm font-semibold text-neutral-700 mb-2 mt-5">Ongkos Datang *</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-neutral-500 font-medium">Rp</span>
                        <input readonly type="number" wire:model.defer="deliveryFee" class="input text-lg font-semibold w-full">
                    </div>
                    <p class="text-xs text-neutral-500 mt-1">Biaya perjalanan ke lokasi customer</p>
                </div>

                @if(!$finalPriceSent)
                    <!-- Buttons -->
                    <div class="grid grid-cols-2 gap-3">
                        <a href="/bengkel/dashboard" class="py-3 text-center text-sm font-semibold text-neutral-700 bg-white border-2 border-neutral-300 rounded-xl hover:bg-neutral-50 transition-all">
                            Batal
                        </a>
                        <button type="submit"
                            class="py-3 text-sm font-bold text-white rounded-xl shadow-md 
                                {{ $currentStep >= 3 ? 'bg-success-500 hover:bg-success-600' : 'bg-gray-300 cursor-not-allowed' }}"
                            @if($currentStep < 3) disabled @endif
                        >
                            Kirim ke Customer
                        </button>
                    </div>
                    @elseif($tracking->order->status === 'selesai')
                        <div class="py-3 text-center text-sm font-semibold text-success-600 border border-success-500 rounded-xl bg-success-50">
                            Pesanan telah dibayarkan dan telah selesai
                        </div>
                    @else
                    <div class="py-3 text-center text-sm font-semibold text-success-600 border border-success-500 rounded-xl bg-success-50">
                        Final Price Sudah Dikirim ke Customer
                    </div>
                @endif
            </form>
        </div>
        </div>
        <script>
            (function(){
                // Prevent multiple initializations which happen on Livewire re-renders
                if(window.__servicePriceValidatorInitialized) return;
                window.__servicePriceValidatorInitialized = true;

                // range from layanan associated to order
                const MIN_SERVICE = parseInt('{{ $tracking->order->layananBengkel->harga_awal ?? 0 }}', 10) || 0;
                const MAX_SERVICE = parseInt('{{ $tracking->order->layananBengkel->harga_akhir ?? 0 }}', 10) || 1000000;

                function findElements(){
                    const serviceEl = document.getElementById('servicePriceInput');
                    const serviceErr = document.getElementById('servicePrice_error');
                    const form = serviceEl ? serviceEl.closest('form') : document.querySelector('form');
                    const submitBtn = form ? form.querySelector('button[type="submit"]') : null;
                    return { serviceEl, serviceErr, submitBtn };
                }

                function sanitizeValue(v){
                    if(typeof v !== 'string') v = String(v || '');
                    v = v.replace(/[^0-9]/g, '');
                    // strip leading zeros
                    v = v.replace(/^0+/, '');
                    return v;
                }

                function showServiceError(serviceErr, submitBtn, msg){
                    if(!serviceErr) return;
                    // Always set the message and make sure it's visible. Use class and
                    // inline-style as fallback in case Tailwind classes are not applied.
                    // keep the inline element's text updated but hide it visually
                    // so the floating clone can be used to avoid Livewire blinking.
                    try { serviceErr.textContent = msg; } catch (e) {}
                    try { serviceErr.classList.add('hidden'); } catch (e) {}
                    serviceErr.style.display = 'none';
                    serviceErr.setAttribute('aria-hidden', 'true');
                    if(submitBtn) submitBtn.disabled = true;
                    // Show accessible floating clone outside Livewire's DOM to avoid blink
                    try { showFloatingError(msg); } catch (e) {}
                }

                function clearServiceError(serviceErr, submitBtn){
                    if(!serviceErr) return;
                    // clear inline copy and remove floating clone
                    try { serviceErr.textContent = ''; } catch (e) {}
                    try { serviceErr.classList.add('hidden'); } catch (e) {}
                    serviceErr.style.display = 'none';
                    serviceErr.setAttribute('aria-hidden', 'true');
                    if(submitBtn) submitBtn.disabled = false;
                    try { removeFloatingError(); } catch (e) {}
                }

                // Floating error element management. We create a clone appended to
                // document.body so it survives Livewire DOM replacements and can be
                // positioned near the original input to avoid blinking.
                let __floatingServiceErr = null;
                function showFloatingError(msg){
                    const els = findElements();
                    // Remove any accidental duplicates first
                    const existing = document.getElementById('servicePrice_error_floating');
                    if(existing && existing !== __floatingServiceErr){
                        try { existing.remove(); } catch (e) {}
                        __floatingServiceErr = null;
                    }

                    // reuse if already created, or create once
                    if(!__floatingServiceErr){
                        // if another script left one behind, reuse it
                        __floatingServiceErr = document.getElementById('servicePrice_error_floating') || null;
                    }
                    if(!__floatingServiceErr){
                        __floatingServiceErr = document.createElement('div');
                        __floatingServiceErr.id = 'servicePrice_error_floating';
                        // copy visual classes of inline error for consistency
                        __floatingServiceErr.className = 'mt-2 text-sm text-danger-600';
                        __floatingServiceErr.style.position = 'absolute';
                        __floatingServiceErr.style.zIndex = 9999;
                        __floatingServiceErr.style.background = 'transparent';
                        __floatingServiceErr.style.pointerEvents = 'none';
                        __floatingServiceErr.style.padding = '0';
                        document.body.appendChild(__floatingServiceErr);
                        // reposition on scroll/resize
                        window.addEventListener('resize', updateFloatingErrorPosition);
                        window.addEventListener('scroll', updateFloatingErrorPosition, true);
                    }
                    __floatingServiceErr.textContent = msg;
                    __floatingServiceErr.style.display = 'block';
                    // Force-hide inline error element via injected CSS so livewire
                    // re-inserts won't cause visual duplicates while floating is shown.
                    if(!document.getElementById('servicePrice_error_forcehide')){
                        const s = document.createElement('style');
                        s.id = 'servicePrice_error_forcehide';
                        s.innerHTML = '#servicePrice_error{display:none !important; visibility:hidden !important;}';
                        document.head.appendChild(s);
                    }
                    // Add extra bottom gap to the input container so floating error
                    // doesn't overlap subsequent elements.
                    try {
                        const wrapper = (els.serviceEl && els.serviceEl.closest('.mb-5')) || null;
                        if(wrapper){
                            // store original padding-bottom so we can restore later
                            if(typeof wrapper.dataset.__origPaddingBottom === 'undefined'){
                                wrapper.dataset.__origPaddingBottom = wrapper.style.paddingBottom || '';
                            }
                            wrapper.style.paddingBottom = '26px';
                        }
                    } catch (e) {}
                    updateFloatingErrorPosition();
                }

                function updateFloatingErrorPosition(){
                    if(!__floatingServiceErr) return;
                    const els = findElements();
                    let rect;
                    if(els.serviceEl){
                        rect = els.serviceEl.getBoundingClientRect();
                    } else {
                        // fallback position near top-left of form area
                        const form = document.querySelector('form');
                        rect = form ? form.getBoundingClientRect() : { left: 20, top: 20, height: 0 };
                    }
                    // place below input
                    const left = Math.max(8, rect.left + window.scrollX);
                    const top = rect.top + window.scrollY + (rect.height || 32) + 6;
                    __floatingServiceErr.style.left = left + 'px';
                    __floatingServiceErr.style.top = top + 'px';
                }

                function removeFloatingError(){
                    // remove any floating errors that may exist
                    const list = document.querySelectorAll('#servicePrice_error_floating');
                    list.forEach(n => { try { n.remove(); } catch (e) {} });
                    __floatingServiceErr = null;
                    window.removeEventListener('resize', updateFloatingErrorPosition);
                    window.removeEventListener('scroll', updateFloatingErrorPosition, true);
                    // remove the force-hide style so the inline element can reappear when valid
                    const sh = document.getElementById('servicePrice_error_forcehide');
                    if(sh) try { sh.remove(); } catch (e) {}
                    // restore original padding-bottom on wrapper if present
                    try {
                        const els2 = findElements();
                        const wrapper = (els2.serviceEl && els2.serviceEl.closest('.mb-5')) || null;
                        if(wrapper && typeof wrapper.dataset.__origPaddingBottom !== 'undefined'){
                            wrapper.style.paddingBottom = wrapper.dataset.__origPaddingBottom || '';
                            delete wrapper.dataset.__origPaddingBottom;
                        }
                    } catch (e) {}
                }

                function validateServicePriceNode(serviceEl, serviceErr, submitBtn){
                    if(!serviceEl) return true;
                    const raw = sanitizeValue(serviceEl.value || '');
                    if(raw === ''){ showServiceError(serviceErr, submitBtn, 'Harga wajib diisi.'); return false; }
                    const val = parseInt(raw, 10);
                    if(isNaN(val) || val <= 0){ showServiceError(serviceErr, submitBtn, 'Harga tidak valid.'); return false; }
                    if(val < MIN_SERVICE){ showServiceError(serviceErr, submitBtn, 'Harga terlalu rendah. Minimal Rp ' + MIN_SERVICE.toLocaleString('id-ID') + '.'); return false; }
                    if(val > MAX_SERVICE){ showServiceError(serviceErr, submitBtn, 'Harga melebihi batas maksimum Rp ' + MAX_SERVICE.toLocaleString('id-ID') + '.'); return false; }
                    clearServiceError(serviceErr, submitBtn);
                    return true;
                }

                // Prevent interfering with IME composition input
                let __isComposingServicePrice = false;

                document.addEventListener('compositionstart', function(e){
                    if(e.target && e.target.id === 'servicePriceInput') __isComposingServicePrice = true;
                });
                document.addEventListener('compositionend', function(e){
                    if(e.target && e.target.id === 'servicePriceInput') {
                        __isComposingServicePrice = false;
                        // run a validation pass after composition finishes
                        const n = findElements();
                        if(n.serviceEl) validateServicePriceNode(n.serviceEl, n.serviceErr, n.submitBtn);
                    }
                });

                // Delegated input handler: sanitize and preserve caret
                document.addEventListener('input', function(e){
                    if(!e.target) return;
                    if(e.target.id !== 'servicePriceInput') return;
                    if(__isComposingServicePrice) return;
                    const { serviceEl, serviceErr, submitBtn } = findElements();
                    if(!serviceEl) return;
                    // sanitize and preserve caret position
                    const start = serviceEl.selectionStart;
                    const end = serviceEl.selectionEnd;
                    const old = serviceEl.value || '';
                    const cleaned = sanitizeValue(old).slice(0, 7);
                    if(old !== cleaned) {
                        const diff = old.length - cleaned.length;
                        serviceEl.value = cleaned;
                        // restore caret to a sensible position
                        const newPos = Math.max(0, start - diff);
                        try { serviceEl.setSelectionRange(newPos, newPos); } catch (err) {}
                    }
                    validateServicePriceNode(serviceEl, serviceErr, submitBtn);
                });

                // Keydown handler to block non-digit input early (better UX)
                document.addEventListener('keydown', function(e){
                    if(!e.target) return;
                    if(e.target.id !== 'servicePriceInput') return;
                    if(e.ctrlKey || e.metaKey || e.altKey) return; // allow copy/paste/navigation shortcuts
                    const allowedKeys = ['Backspace','Delete','ArrowLeft','ArrowRight','ArrowUp','ArrowDown','Home','End','Tab'];
                    if(allowedKeys.indexOf(e.key) !== -1) return;
                    // allow digits only
                    if(/^[0-9]$/.test(e.key)) return;
                    // otherwise prevent
                    e.preventDefault();
                }, true);

                document.addEventListener('blur', function(e){
                    if(!e.target) return;
                    if(e.target.id !== 'servicePriceInput') return;
                    const { serviceEl, serviceErr, submitBtn } = findElements();
                    validateServicePriceNode(serviceEl, serviceErr, submitBtn);
                }, true);

                document.addEventListener('paste', function(e){
                    if(!e.target) return;
                    if(e.target.id !== 'servicePriceInput') return;
                    e.preventDefault();
                    const clip = (e.clipboardData || window.clipboardData).getData('text') || '';
                    const val = sanitizeValue(clip).slice(0, 7);
                    const { serviceEl, serviceErr, submitBtn } = findElements();
                    if(serviceEl) serviceEl.value = val;
                    validateServicePriceNode(serviceEl, serviceErr, submitBtn);
                });

                // initial validation run if element is present. Run immediately
                // and again after a short delay so Livewire-bound values settle.
                const nodes = findElements();
                if(nodes.serviceEl) validateServicePriceNode(nodes.serviceEl, nodes.serviceErr, nodes.submitBtn);
                setTimeout(() => {
                    const n2 = findElements();
                    if(n2.serviceEl) validateServicePriceNode(n2.serviceEl, n2.serviceErr, n2.submitBtn);
                }, 250);

                // Re-run validation after Livewire finishes DOM updates so the
                // error stays visible for as long as the value is invalid.
                if (typeof Livewire !== 'undefined' && Livewire.hook) {
                    Livewire.hook('message.processed', () => {
                        const n = findElements();
                        if (n.serviceEl) validateServicePriceNode(n.serviceEl, n.serviceErr, n.submitBtn);
                    });
                } else {
                    // Fallback for older Livewire event names
                    document.addEventListener('livewire:update', () => {
                        const n = findElements();
                        if (n.serviceEl) validateServicePriceNode(n.serviceEl, n.serviceErr, n.submitBtn);
                    });
                }

                // MutationObserver: Livewire often replaces DOM nodes. Observe
                // the form container and re-run validation when DOM changes.
                if (!window.__servicePriceObserverInitialized) {
                    window.__servicePriceObserverInitialized = true;
                    window.__servicePriceValidateDebounce = null;
                    try {
                        const targetNode = (function(){ const f = findElements(); return f && f.serviceEl ? (f.serviceEl.closest('form') || document.body) : document.body; })();
                        window.__servicePriceObserver = new MutationObserver((mutationsList) => {
                            if (window.__servicePriceValidateDebounce) clearTimeout(window.__servicePriceValidateDebounce);
                            window.__servicePriceValidateDebounce = setTimeout(() => {
                                const n = findElements();
                                if (n.serviceEl) validateServicePriceNode(n.serviceEl, n.serviceErr, n.submitBtn);
                            }, 60);
                        });
                        window.__servicePriceObserver.observe(targetNode, { childList: true, subtree: true, attributes: true, characterData: true });
                    } catch (err) {
                        // ignore observer errors
                        console.warn('servicePrice observer unavailable', err);
                    }
                }

            })();
        </script>
    </div>
    @push('scripts')
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function () {

                const userLat = {{ $tracking->order->user_latitude }};
                const userLng = {{ $tracking->order->user_longitude }};
                const bengkelLat = {{ $tracking->order->bengkel_latitude }};
                const bengkelLng = {{ $tracking->order->bengkel_longitude }};

                const map = L.map("map").setView([userLat, userLng], 13);

                L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                    maxZoom: 19,
                }).addTo(map);

                const userMarker = L.marker([userLat, userLng]).addTo(map).bindPopup("Lokasi Pelanggan");
                const bengkelMarker = L.marker([bengkelLat, bengkelLng]).addTo(map).bindPopup("Lokasi Bengkel");
                const routingUrl = `https://router.project-osrm.org/route/v1/driving/${bengkelLng},${bengkelLat};${userLng},${userLat}?overview=full&geometries=geojson`;

                fetch(routingUrl)
                    .then(res => res.json())
                    .then(data => {
                        if (data.routes && data.routes.length > 0) {
                            const route = data.routes[0].geometry;
                            L.geoJSON(route, {
                                style: {
                                    color: "blue",
                                    weight: 4
                                }
                            }).addTo(map);
                            const coords = route.coordinates.map(c => [c[1], c[0]]);
                            map.fitBounds(coords, { padding: [20, 20] });
                        }
                    })
                    .catch(() => {
                        console.log("Gagal mengambil rute OSRM");
                    });

            });
                // Map Livewire events to window events so existing handlers can pick them up
                if (typeof Livewire !== 'undefined') {
                    const normalize = (payload) => (Array.isArray(payload) && payload.length) ? payload[0] : payload;
                    Livewire.on('swal:alert', payload => window.dispatchEvent(new CustomEvent('swal:alert', { detail: normalize(payload) })));
                    Livewire.on('notify', payload => window.dispatchEvent(new CustomEvent('notify', { detail: normalize(payload) })));
                }

                // Listen for swal:alert window event and show SweetAlert (or load it dynamically)
                window.addEventListener('swal:alert', (e) => {
                    const detail = e.detail || {};
                    const show = () => {
                        Swal.fire({ icon: detail.type || 'info', title: detail.title || '', text: detail.text || '', confirmButtonText: 'OK' });
                    };
                    if (typeof Swal === 'undefined') {
                        const s = document.createElement('script');
                        s.src = 'https://cdn.jsdelivr.net/npm/sweetalert2@11';
                        s.onload = show; document.head.appendChild(s);
                    } else show();
                });

                // Also support a generic `notify` event used elsewhere in the app
                window.addEventListener('notify', (e) => {
                    const detail = e.detail || {};
                    const show = () => {
                        Swal.fire({ icon: detail.type || 'info', title: detail.message || detail.title || '', timer: 2000, showConfirmButton: false });
                    };
                    if (typeof Swal === 'undefined') {
                        const s = document.createElement('script');
                        s.src = 'https://cdn.jsdelivr.net/npm/sweetalert2@11';
                        s.onload = show; document.head.appendChild(s);
                    } else show();
                });
        </script>
    @endpush
</div>





<div class="p-4">
    <div class="flex items-center gap-3 mb-4">
        <input wire:model.debounce.300ms="search" type="text" placeholder="Cari username/email/wa..." class="input input-bordered w-full" />
        <a href="{{ route('admin.users.index') }}" class="btn btn-sm">Kembali</a>
    </div>

    <div class="overflow-x-auto bg-white rounded-lg border">
        <table class="w-full text-sm">
            <thead class="bg-neutral-50 text-left">
                <tr>
                    <th class="px-3 py-2">#</th>
                    <th class="px-3 py-2">Username</th>
                    <th class="px-3 py-2">Email</th>
                    <th class="px-3 py-2">WA</th>
                    <th class="px-3 py-2">Role</th>
                    <th class="px-3 py-2">Skor</th>
                    <th class="px-3 py-2">Status</th>
                    <th class="px-3 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $u)
                <tr class="border-t">
                    <td class="px-3 py-2">{{ $u->id_user }}</td>
                    <td class="px-3 py-2">{{ $u->username }}</td>
                    <td class="px-3 py-2">{{ $u->email }}</td>
                    <td class="px-3 py-2">{{ $u->wa_number }}</td>
                    <td class="px-3 py-2">{{ $u->role }}</td>
                    <td class="px-3 py-2">
                        <div class="inline-flex items-center gap-2">
                            <button wire:click="decrementScore({{ $u->id_user }})" class="btn btn-xs">-</button>
                            <span class="px-2">{{ $tempScores[$u->id_user] ?? $u->skor ?? 0 }}</span>
                            <button wire:click="incrementScore({{ $u->id_user }})" class="btn btn-xs">+</button>
                        </div>
                    </td>
                    <td class="px-3 py-2">
                        @if($u->is_blocked)
                            <span class="px-2 py-1 bg-red-100 text-red-700 rounded-full text-xs">Diblokir</span>
                        @else
                            <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs">Aktif</span>
                        @endif
                    </td>
                    <td class="px-3 py-2">
                        <div class="flex items-center gap-2">
                            <button wire:click.prevent="updateScore({{ $u->id_user }})" class="btn btn-primary btn-sm">Update</button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @push('scripts')
    <script>
        // Map Livewire emits to window events so existing DOM listeners work
        if (typeof Livewire !== 'undefined') {
            const normalize = (payload) => (Array.isArray(payload) && payload.length) ? payload[0] : payload;
            Livewire.on('confirm-block', payload => window.dispatchEvent(new CustomEvent('confirm-block', { detail: normalize(payload) })));
            Livewire.on('confirm-unblock', payload => window.dispatchEvent(new CustomEvent('confirm-unblock', { detail: normalize(payload) })));
            Livewire.on('notify', payload => window.dispatchEvent(new CustomEvent('notify', { detail: normalize(payload) })));
        }

        // Listen for confirm events from Livewire or the DOM
        window.addEventListener('confirm-block', (e) => {
            const id = e.detail?.id;
            if(!id) return;
            const show = () => {
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Blokir akun ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Blokir',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#d33'
                }).then(result => {
                    if(result.isConfirmed){
                        Livewire.emit('doBlock', id);
                    }
                });
            };
            if(typeof Swal === 'undefined'){
                const s = document.createElement('script');
                s.src = 'https://cdn.jsdelivr.net/npm/sweetalert2@11';
                s.onload = show; document.head.appendChild(s);
            } else show();
        });

        window.addEventListener('confirm-unblock', (e) => {
            const id = e.detail?.id;
            if(!id) return;
            const show = () => {
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Buka blokir akun ini?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Buka',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#0051BA'
                }).then(result => {
                    if(result.isConfirmed){
                        Livewire.emit('doUnblock', id);
                    }
                });
            };
            if(typeof Swal === 'undefined'){
                const s = document.createElement('script');
                s.src = 'https://cdn.jsdelivr.net/npm/sweetalert2@11';
                s.onload = show; document.head.appendChild(s);
            } else show();
        });

        // Show notifications from backend
        window.addEventListener('notify', (e) => {
            const { type, message } = e.detail || {};
            const show = () => {
                Swal.fire({ icon: type || 'info', title: message || '' , timer: 2000, showConfirmButton: false });
            };
            if(typeof Swal === 'undefined'){
                const s = document.createElement('script');
                s.src = 'https://cdn.jsdelivr.net/npm/sweetalert2@11';
                s.onload = show; document.head.appendChild(s);
            } else show();
        });
    </script>
    @endpush
</div>

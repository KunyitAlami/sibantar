<div class="max-w-full">
    <!-- Quick Actions -->
    <div class="card p-6 mb-8">
        <h2 class="text-xl font-bold text-neutral-900 mb-4">Management</h2>
        <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-4 gap-5">
            <button wire:click="kelolaUser"
                class="btn font-semibold transition-all
                {{ $activePanel === 'user' ? 'btn-primary text-white' : 'btn-outline' }}">
                Kelola User
            </button>
            <button wire:click="kelolaBengkel"
                class="btn font-semibold transition-all
                {{ $activePanel === 'bengkel' ? 'btn-primary text-white' : 'btn-outline' }}">
                Kelola Bengkel
            </button>
            <button wire:click="kelolaLaporan"
                class="btn font-semibold transition-all
                {{ $activePanel === 'laporan' ? 'btn-primary text-white' : 'btn-outline' }}">
                Laporan
            </button>
            <button wire:click="kelolaPemblokiran"
                class="btn font-semibold transition-all
                {{ $activePanel === 'pemblokiran' ? 'btn-primary text-white' : 'btn-outline' }}">
                Pemblokiran
            </button>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="card p-6">
        <h2 class="text-xl font-bold text-neutral-900 mb-4">Aktivitas Terbaru</h2>

        @if($activePanel === 'user')
            {{-- {{ route('bengkel.tambahLayanan', ['id_bengkel' => $bengkel->id_bengkel]) }} --}}
            <a href="{{ route('admin.tambah-user') }}" 
            class="mb-6 px-3 py-2 sm:px-4 sm:py-2 rounded-md font-semibold border border-blue-700 text-blue-700 hover:bg-blue-700 hover:text-white transition-all text-center">
                Tambah User Manual
            </a>
            <div class="flex flex-wrap gap-2 mb-4">
                <button wire:click="setRoleFilter('all')"
                    class="px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-300
                    {{ $roleFilter === 'all' ? 'bg-primary-600 text-white shadow-md' : 'bg-neutral-100 text-neutral-600' }}">
                    Semua
                </button>

                <button wire:click="setRoleFilter('admin')"
                    class="px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-300
                    {{ $roleFilter === 'admin' ? 'bg-primary-600 text-white shadow-md' : 'bg-neutral-100 text-neutral-600' }}">
                    Admin
                </button>

                <button wire:click="setRoleFilter('bengkel')"
                    class="px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-300
                    {{ $roleFilter === 'bengkel' ? 'bg-primary-600 text-white shadow-md' : 'bg-neutral-100 text-neutral-600' }}">
                    Bengkel
                </button>

                <button wire:click="setRoleFilter('user')"
                    class="px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-300
                    {{ $roleFilter === 'user' ? 'bg-primary-600 text-white shadow-md' : 'bg-neutral-100 text-neutral-600' }}">
                    User
                </button>
            </div>

            <div class="overflow-x-auto" wire:poll.4s.keep-alive>
                <table class="w-full text-center">
                    <thead class="bg-neutral-200">
                        <tr>
                            <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">ID User</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Username</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Role</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">WA Number</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider" colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr class="hover:bg-neutral-50" wire:key="user-{{ $user->id_user }}">
                            <td class="px-6 py-4 text-sm font-medium text-neutral-900">{{ $user->id_user }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-neutral-900">{{ $user->username }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-neutral-900">{{ $user->email }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-neutral-900">
                                @if ($user->role == 'admin')
                                    <span class="px-3 py-1 text-xs font-semibold text-primary-700 bg-primary-100 rounded-full">
                                        {{ $user->role }}
                                    </span>
                                @elseif ($user->role == 'bengkel')
                                    <span class="px-3 py-1 text-xs font-semibold text-secondary-700 bg-secondary-100 rounded-full">
                                        {{ $user->role }}
                                    </span>
                                @else
                                    <span class="px-3 py-1 text-xs font-semibold text-success-700 bg-success-100 rounded-full">
                                        {{ $user->role }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm font-medium text-neutral-900">{{ $user->wa_number }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('admin.edit-user', ['id_user' => $user->id_user]) }}" 
                                class="px-3 py-1.5 text-sm font-medium rounded-md border border-yellow-500 text-yellow-500 
                                            hover:bg-yellow-500 hover:text-white transition">
                                    Edit
                                </a>
                            </td>

                            <td class="px-3 py-2 sm:px-4 sm:py-3">
                                <button wire:click="hapusUser({{ $user->id_user }})"
                                        wire:loading.attr="disabled"
                                        wire:target="hapusUser({{ $user->id_user }})"
                                        class="px-3 py-1.5 text-sm font-medium rounded-md text-red-500 border border-red-500
                                            hover:bg-red-500 hover:text-white transition disabled:opacity-50 disabled:cursor-not-allowed">

                                    <span wire:loading.remove wire:target="hapusUser({{ $user->id_user }})">Hapus</span>
                                    <span wire:loading wire:target="hapusUser({{ $user->id_user }})">Menghapus...</span>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @elseif($activePanel === 'bengkel')
            <div class="overflow-x-auto">
                {{-- bagian calon bengkel --}}
                <div>
                    <div class="flex flex-col mb-8"> 
                        <h1 class="text-2xl font-bold text-black mb-4 mt-10">Daftar Calon Mitra Bengkel SIBANTAR</h1>
                        <p class="text-gray-500">Ini adalah daftar calon daftar mitra bengkel SIBANTAR</p>
                    </div>

                    @php
                        $belumDiterima = $calonbengkels->where('status', 'belum_diterima');
                    @endphp

                    @if($belumDiterima->isEmpty())
                        <div class="text-center py-12 text-neutral-500">
                            <p class="font-semibold">Belum ada calon Mitra baru</p> 
                            <p class="text-sm mt-1">Calon Mitra SIBANTAR akan muncul di sini</p> 
                        </div>
                    @else
                        <div> 
                            <table class="w-full text-center">
                                <thead>
                                    <tr class="text-left font-semibold bg-neutral-200">
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">ID Bengkel</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Nama Bengkel</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Kecamatan</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Alamat</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Jam Operasional</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Aktivitas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($belumDiterima as $b)
                                        <tr class="hover:bg-neutral-50">
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900">{{ $b->id_calon_bengkel }}</td>
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900">{{ $b->nama_bengkel }}</td>
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900">{{ $b->kecamatan }}</td>
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900">{{ $b->alamat_lengkap ?? '-' }}</td>
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900">
                                                @if (!empty($b->jam_operasional))
                                                    {{ $b->jam_operasional }}
                                                @else
                                                    {{ $b->jam_buka }} - {{ $b->jam_tutup }} WITA
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900">Belum Diterima</td>
                                            <td class="px-4 py-2 border-b hover:underline hover:text-gray-700">
                                                <a href="{{ route('admin.calonBengkel.show', $b->id_calon_bengkel) }}" class="hover:text-gray-700">
                                                    Lebih Lanjut
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>

                {{-- bagian bengkel --}}
                <div>
                    <div class="flex flex-col mb-8"> 
                        <h1 class="text-2xl font-bold text-black mb-4 mt-10">Profile Mita Bengkel SIBANTAR</h1>
                        <p class="text-gray-500">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore temporibus pariatur.</p>
                    </div>
                    <div> 
                        <table class="text-center">
                            <thead class="bg-neutral-200">
                                <tr class="text-left font-semibold text-neutral-700">
                                    <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">ID Bengkel</th>
                                    <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">ID User</th>
                                    <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Nama Bengkel</th>
                                    <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Kecamatan</th>
                                    <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Alamat</th>
                                    <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Jam Operasional</th>
                                    <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Aktivitas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bengkels as $b)
                                <tr class="hover:bg-neutral-50">
                                    <td class="px-6 py-4 text-sm font-medium text-neutral-900">{{ $b->id_bengkel }}</td>
                                    <td class="px-6 py-4 text-sm font-medium text-neutral-900">
                                        @if($b->id_user)
                                            {{ $b->id_user }}
                                        @else
                                            <span class="italic text-gray-500">tidak ada id_user untuk bengkel ini</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium text-neutral-900">{{ $b->nama_bengkel }}</td>
                                    <td class="px-6 py-4 text-sm font-medium text-neutral-900">{{ $b->kecamatan }}</td>
                                    <td class="px-6 py-4 text-sm font-medium text-neutral-900">{{ $b->alamat_lengkap ?? '-' }}</td>
                                    <td class="px-6 py-4 text-sm font-medium text-neutral-900">{{ $b->jam_operasional }}</td>
                                    <td class="px-6 py-4 text-sm font-medium text-neutral-900">{{ $b->status }}</td>
                                    <td class="px-6 py-4 text-sm font-medium text-neutral-900">
                                        <a href="{{ route('admin.cekAktivitas', $b->id_bengkel) }}" class="border border-yellow-600 text-yellow-600 hover:bg-yellow-600 hover:text-white px-4 py-2 rounded-md">
                                            Cek
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        {{-- laporan --}}
        @elseif($activePanel === 'laporan')
            <div class="overflow-x-auto">
                <div class="py-6">
                    <a href="{{ route('admin.laporan.index') }}" class="inline-block px-4 py-2 rounded-xl bg-primary-600 text-white">Lihat Laporan (Halaman Laporan)</a>
                </div>
            </div>
        {{-- pemblokiran --}}
        @elseif($activePanel === 'pemblokiran')
            <div class="overflow-x-auto">
                @if (session()->has('success'))
                    <div class="p-2 mb-2 text-green-800 bg-green-200 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="w-full text-center">
                    <thead class="bg-neutral-200">
                        <tr>
                            <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">ID User</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Username</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">WA Number</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Skor</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach($users as $user)
                            <tr class="{{ $skors[$user->id_user] > 3 ? 'bg-red-100' : '' }} hover:bg-neutral-50">
                                <td class="px-6 py-4 text-sm font-medium text-neutral-900">{{ $user->id_user }}</td>
                                <td class="px-6 py-4 text-sm font-medium text-neutral-900">{{ $user->username }}</td>
                                <td class="px-6 py-4 text-sm font-medium text-neutral-900">{{ $user->email }}</td>
                                <td class="px-6 py-4 text-sm font-medium text-neutral-900">{{ $user->wa_number }}</td>
                                <td class="px-6 py-4 text-sm font-medium text-neutral-900">
                                    <input type="number" min="0" max="10" wire:model.defer="skors.{{ $user->id_user }}">
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-neutral-900">
                                    <button class="px-3 py-1.5 text-sm font-medium rounded-md border border-yellow-500 text-yellow-500 
                                            hover:bg-yellow-500 hover:text-white transition" wire:click="updateSkor({{ $user->id_user }})">
                                        Update Skor
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-12 text-neutral-500">
                <p class="font-semibold">Belum ada aktivitas</p>
                <p class="text-sm mt-1">Aktivitas muncul di sini jika sudah memilih menu</p>
            </div>
        @endif

    </div>
</div>

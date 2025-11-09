<div class="max-w-full">
    <!-- Quick Actions -->
    <div class="card p-6 mb-8">
        <h2 class="text-xl font-bold text-neutral-900 mb-4">Management</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3">
            <button wire:click="kelolaUser" class="btn btn-primary font-semibold">Kelola User</button>
            <button wire:click="kelolaBengkel" class="btn btn-outline font-semibold">Kelola Bengkel</button>
            <button wire:click="kelolaTransaksi" class="btn btn-outline font-semibold">Transaksi</button>
            <button wire:click="kelolaPengumuman" class="btn btn-outline font-semibold">Pengumuman</button>
            <button wire:click="kelolaLaporan" class="btn btn-outline font-semibold">Laporan</button>
            <button wire:click="kelolaSettings" class="btn btn-outline font-semibold">Settings</button>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="card p-6">
        <h2 class="text-xl font-bold text-neutral-900 mb-4">Aktivitas Terbaru</h2>

        @if($activePanel === 'user')
            <div class="overflow-x-auto">
                <table class="w-full border border-neutral-200 text-sm">
                    <thead class="bg-neutral-100">
                        <tr class="text-left font-semibold text-neutral-700">
                            <th class="px-4 py-2 border-b">ID</th>
                            <th class="px-4 py-2 border-b">Username</th>
                            <th class="px-4 py-2 border-b">Email</th>
                            <th class="px-4 py-2 border-b">Role</th>
                            <th class="px-4 py-2 border-b">WA Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr class="hover:bg-neutral-50">
                            <td class="px-4 py-2 border-b">{{ $user->id_user }}</td>
                            <td class="px-4 py-2 border-b">{{ $user->username }}</td>
                            <td class="px-4 py-2 border-b">{{ $user->email }}</td>
                            <td class="px-4 py-2 border-b">{{ $user->role }}</td>
                            <td class="px-4 py-2 border-b">{{ $user->wa_number }}</td>
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
                        <p class="text-gray-500">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore temporibus pariatur.</p>
                    </div>

                    @php
                        // Filter calonbengkels yang statusnya belum_diterima
                        $belumDiterima = $calonbengkels->where('status', 'belum_diterima');
                    @endphp

                    @if($belumDiterima->isEmpty())
                        <div class="text-center py-12 text-neutral-500">
                            <p class="font-semibold">Belum ada calon Mitra baru</p> 
                            <p class="text-sm mt-1">Calon Mitra akan muncul di sini</p> 
                        </div>
                    @else
                        <div> 
                            <table class="w-full border border-neutral-200 text-sm">
                                <thead class="bg-neutral-100">
                                    <tr class="text-left font-semibold text-neutral-700">
                                        <th class="px-4 py-2 border-b">ID Bengkel</th>
                                        <th class="px-4 py-2 border-b">Nama Bengkel</th>
                                        <th class="px-4 py-2 border-b">Kecamatan</th>
                                        <th class="px-4 py-2 border-b">Alamat</th>
                                        <th class="px-4 py-2 border-b">Jam Operasional</th>
                                        <th class="px-4 py-2 border-b">Status</th>
                                        <th class="px-4 py-2 border-b">Aktivitas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($belumDiterima as $b)
                                        <tr class="hover:bg-neutral-50">
                                            <td class="px-4 py-2 border-b">{{ $b->id_calon_bengkel }}</td>
                                            <td class="px-4 py-2 border-b">{{ $b->nama_bengkel }}</td>
                                            <td class="px-4 py-2 border-b">{{ $b->kecamatan }}</td>
                                            <td class="px-4 py-2 border-b">{{ $b->alamat_lengkap ?? '-' }}</td>
                                            <td class="px-4 py-2 border-b">{{ $b->jam_operasional }}</td>
                                            <td class="px-4 py-2 border-b">Belum Diterima</td>
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
                        <table class="w-full border border-neutral-200 text-sm">
                            <thead class="bg-neutral-100">
                                <tr class="text-left font-semibold text-neutral-700">
                                    <th class="px-4 py-2 border-b">ID Bengkel</th>
                                    <th class="px-4 py-2 border-b">ID User</th>
                                    <th class="px-4 py-2 border-b">Nama Bengkel</th>
                                    <th class="px-4 py-2 border-b">Kecamatan</th>
                                    <th class="px-4 py-2 border-b">Alamat</th>
                                    <th class="px-4 py-2 border-b">Jam Operasional</th>
                                    <th class="px-4 py-2 border-b">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bengkels as $b)
                                <tr class="hover:bg-neutral-50">
                                    <td class="px-4 py-2 border-b">{{ $b->id_bengkel }}</td>
                                    <td class="px-4 py-2 border-b">
                                        @if($b->id_user)
                                            {{ $b->id_user }}
                                        @else
                                            <span class="italic text-gray-500">tidak ada id_user untuk bengkel ini</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2 border-b">{{ $b->nama_bengkel }}</td>
                                    <td class="px-4 py-2 border-b">{{ $b->kecamatan }}</td>
                                    <td class="px-4 py-2 border-b">{{ $b->alamat_lengkap ?? '-' }}</td>
                                    <td class="px-4 py-2 border-b">{{ $b->jam_operasional }}</td>
                                    <td class="px-4 py-2 border-b">{{ $b->status }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-12 text-neutral-500">
                <p class="font-semibold">Belum ada aktivitas</p>
                <p class="text-sm mt-1">Aktivitas akan muncul di sini</p>
            </div>
        @endif
    </div>
</div>

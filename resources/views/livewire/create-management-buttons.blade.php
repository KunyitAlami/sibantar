<div class="max-w-full">
    <!-- Quick Actions + Recent Activity (single card, side-by-side) -->
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

                    <button wire:click="kelolaTransaksi"
                        class="px-4 py-2 rounded-full text-sm font-semibold transition-all duration-300 focus:outline-none
                        {{ ($activePanel ?? 'user') === 'transaksi' ? 'bg-primary-600 text-white shadow-md' : 'bg-white text-primary-600 border-2 border-primary-600' }}">
                        Transaksi
                    </button>

                    <button wire:click="kelolaLaporan"
                        class="px-4 py-2 rounded-full text-sm font-semibold transition-all duration-300 focus:outline-none
                        {{ ($activePanel ?? 'user') === 'laporan' ? 'bg-primary-600 text-white shadow-md' : 'bg-white text-primary-600 border-2 border-primary-600' }}">
                        Laporan
                    </button>
                </div>
                </div>
            </div>

            <div class="w-full">
                <h2 class="text-xl font-bold text-neutral-900 mb-4">Aktivitas Terbaru</h2>

                @if($activePanel === 'user')
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
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-neutral-100">
                                @foreach($users as $user)
                                <tr class="hover:bg-neutral-50">
                                    <td class="px-4 py-3 text-sm font-medium text-neutral-900">{{ $user->id_user }}</td>
                                    <td class="px-4 py-3 text-sm font-medium text-neutral-900">{{ $user->username }}</td>
                                    <td class="px-4 py-3 text-sm text-neutral-700">{{ $user->email }}</td>
                                    <td class="px-4 py-3 text-sm font-medium text-neutral-900">
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
                {{-- Bagian Laporan dari Bengkel --}}
                <div>
                    <div class="flex flex-col mb-8"> 
                        <h1 class="text-2xl font-bold text-black mb-4 mt-10">Daftar Laporan dari Mitra Bengkel SIBANTAR</h1>
                        <p class="text-gray-500">Ini adalah daftar laporan yang dikirimkan oleh mitra bengkel SIBANTAR</p>
                    </div>

                    @if($reportBengkel->isEmpty())
                        <div class="text-center py-12 text-neutral-500">
                            <p class="font-semibold">Belum ada laporan dari Mitra Bengkel</p> 
                            <p class="text-sm mt-1">Laporan dari Mitra Bengkel akan muncul di sini</p> 
                        </div>
                    @else
                        <div> 
                            <table class="w-full text-center">
                                <thead>
                                    <tr class="text-left font-semibold bg-neutral-200">
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">ID Report</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">ID Order</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Nama Bengkel</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Nama User</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Deskripsi</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Tanggal Laporan</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Aktivitas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reportBengkel as $rb)
                                        <tr class="hover:bg-neutral-50">
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900">{{ $rb->id_report_from_bengkel }}</td>
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900">{{ $rb->id_order }}</td>
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900">
                                                {{ $rb->bengkel->nama_bengkel ?? '-' }}
                                            </td>
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900">
                                                {{ $rb->user->username ?? '-' }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-neutral-900">
                                                {{ Str::limit($rb->deskripsi, 50) ?? '-' }}
                                            </td>
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900">
                                                {{ $rb->created_at->format('d/m/Y H:i') }}
                                            </td>
                                            <td class="px-4 py-2 border-b hover:underline hover:text-gray-700">
                                                <a href="#" class="hover:text-gray-700">
                                                    Detail
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>

                {{-- Bagian Laporan dari User --}}
                <div class="mt-12">
                    <div class="flex flex-col mb-8"> 
                        <h1 class="text-2xl font-bold text-black mb-4 mt-10">Daftar Laporan dari User SIBANTAR</h1>
                        <p class="text-gray-500">Ini adalah daftar laporan yang dikirimkan oleh user SIBANTAR</p>
                    </div>

                    @if($reportUser->isEmpty())
                        <div class="text-center py-12 text-neutral-500">
                            <p class="font-semibold">Belum ada laporan dari User</p> 
                            <p class="text-sm mt-1">Laporan dari User akan muncul di sini</p> 
                        </div>
                    @else
                        <div> 
                            <table class="w-full text-center">
                                <thead class="bg-neutral-200">
                                    <tr class="text-left font-semibold text-neutral-700">
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">ID Report</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">ID Order</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Nama User</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Nama Bengkel</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Deskripsi</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Tanggal Laporan</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Aktivitas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reportUser as $ru)
                                    <tr class="hover:bg-neutral-50">
                                        <td class="px-6 py-4 text-sm font-medium text-neutral-900">{{ $ru->id_report_from_user }}</td>
                                        <td class="px-6 py-4 text-sm font-medium text-neutral-900">{{ $ru->id_order }}</td>
                                        <td class="px-6 py-4 text-sm font-medium text-neutral-900">
                                            {{ $ru->user->username ?? '-' }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium text-neutral-900">
                                            {{ $ru->bengkel->nama_bengkel ?? '-' }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-neutral-900">
                                            {{ Str::limit($ru->deskripsi, 50) ?? '-' }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium text-neutral-900">
                                            {{ $ru->created_at->format('d/m/Y H:i') }}
                                        </td>
                                        <td class="px-4 py-2 border-b hover:underline hover:text-gray-700">
                                            <a href="#" class="hover:text-gray-700">
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
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

<x-layout-admin>
    {{-- Navbar back --}}
    <section class="bg-white border-b border-neutral-200 sticky top-0 z-50 mb-5">
        <div class="container mx-auto px-4">
            <div class="flex items-center gap-4 py-4">
                <a href="{{ route('admin.dashboard.index') }}"
                   class="text-neutral-700 hover:text-primary-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
                <h1 class="font-bold text-lg text-neutral-900">Kembali ke Dashboard</h1>
            </div>
        </div>
    </section>

    {{-- Form --}}
    <section class="px-4">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-sm mb-20">
            <div class="flex flex-col gap-4 justify-center text-center">
                <h1>Form Tambah User</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic aperiam quasi voluptates.</p>
            </div>
            {{-- action="{{ route('bengkel.layanan.store') }}" --}}
            <form action="{{ route('admin.update-user') }}" autocomplete="off" method="POST" class="mt-10 mb-10 gap-5">
                @csrf
                {{-- Anti autofill --}}
                <input type="text" name="dummy_username" autocomplete="off" style="display:none;">
                <input type="password" name="dummy_password" autocomplete="new-password" style="display:none;">
                <input type="hidden" name="id_user" value="{{ $user->id_user }}">

                

                {{-- Username --}}
                <div class="flex flex-col gap-2">
                    <label class="font-semibold text-neutral-700">Username</label>
                    <input autocomplete="off" type="text" name="username" required
                        class="input input-bordered w-full"
                        value="{{ $user->username }}">
                </div>

                {{-- Email --}}
                <div class="flex flex-col gap-2 mt-4">
                    <label class="font-semibold text-neutral-700">Email</label>
                    <input autocomplete="off" type="email" name="email" required
                        class="input input-bordered w-full"
                        value="{{ $user->email }}">
                </div>

                {{-- Password --}}
                <div class="flex flex-col gap-2 mt-4">
                    <label class="font-semibold text-neutral-700">Password</label>
                    <input autocomplete="new-password" type="password" name="password" class="input input-bordered w-full" placeholder="Masukkan password">
                </div>

                {{-- Role --}}
                <div class="flex flex-col gap-2 mt-4">
                    <label class="font-semibold text-neutral-700">Role</label>
                        <select name="role" class="select select-bordered w-full !h-14 !min-h-0 !leading-normal" required>
                            <option value="user" {{ isset($user) && $user->role == 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ isset($user) && $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="bengkel" {{ isset($user) && $user->role == 'bengkel' ? 'selected' : '' }}>Bengkel</option>
                        </select>
                </div>


                {{-- WA Number --}}
                <div class="flex flex-col gap-2 mt-4">
                    <label class="font-semibold text-neutral-700">Nomor WhatsApp</label>
                    <input type="text" name="wa_number" required
                        class="input input-bordered w-full"
                        value="{{ $user->wa_number }}">
                </div>

                {{-- SUBMIT BUTTON --}}
                <button type="submit"
                    class="w-full bg-primary-600 hover:bg-primary-700 text-white font-semibold py-3 rounded-lg text-center mt-8">
                    Update User
                </button>

            </form>

        </div>
        
    </section>
</x-layout-admin>

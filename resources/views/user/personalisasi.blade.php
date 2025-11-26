<x-layout-user>
    {{-- Navbar back --}}
    <section class="bg-white border-b border-neutral-200 sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex items-center gap-4 py-4">
                <a href="{{ route('user.dashboard') }}" class="text-neutral-700 hover:text-primary-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <h1 class="font-bold text-lg text-neutral-900">Kembali ke Dashboard</h1>
            </div>
        </div>
    </section>

    {{-- Form --}}
    <section class="px-4">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-sm mb-20 mt-10">
            <div class="text-center justify-center gap-2"> 
                <h1>Form Edit Personalisasi</h1>
                <p>silahkan atur personalisasi anda</p>
            </div>
            
            <form action="{{ route('user.update-personalisasi', ['id_user' => $user->id_user]) }}"  autocomplete="off" method="POST" class="mt-10 mb-10 gap-5">
                @csrf
                {{-- Anti autofill dan Hidden ID --}}
                <input type="text" name="dummy_username" autocomplete="off" style="display:none;">
                <input type="password" name="dummy_password" autocomplete="new-password" style="display:none;">
                <input type="hidden" name="id_user" value="{{ $user->id_user }}">

                {{-- Username --}}
                <div class="flex flex-col gap-2">
                    <label class="font-semibold text-neutral-700">Username</label>
                    <input autocomplete="off" type="text" name="username" required
                        class="input input-bordered w-full @error('username') input-error @enderror"
                        value="{{ old('username', $user->username) }}">
                    @error('username')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="flex flex-col gap-2 mt-4">
                    <label class="font-semibold text-neutral-700">Email</label>
                    @if($user->username === 'dosentester_user')
                        <input autocomplete="off" type="text" name="email" 
                            class="input input-bordered w-full bg-gray-100 cursor-not-allowed" 
                            value="{{ old('email', $user->email) }}" readonly>
                        <small class="text-gray-500">Email khusus, tidak bisa diubah</small>
                    @else
                        <input autocomplete="off" type="text" name="email" required
                            class="input input-bordered w-full @error('email') input-error @enderror"
                            value="{{ old('email', $user->email) }}">
                        @error('email')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    @endif
                </div>

                {{-- WA Number --}}
                <div class="flex flex-col gap-2 mt-4">
                    <label class="font-semibold text-neutral-700">Nomor WhatsApp</label>
                    <input type="text" name="wa_number" required
                        class="input input-bordered w-full @error('wa_number') input-error @enderror"
                        value="{{ old('wa_number', $user->wa_number) }}">
                    @error('wa_number')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                {{-- SUBMIT BUTTON --}}
                <button type="submit"
                    class="w-full bg-primary-600 hover:bg-primary-700 text-white font-semibold py-3 rounded-lg text-center mt-8">
                    Update User
                </button>

            </form>

        </div>
        
    </section>
</x-layout-user>
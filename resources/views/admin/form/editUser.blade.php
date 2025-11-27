<x-layout-admin>
    {{-- Navbar back --}}
    <section class="bg-white border-b border-neutral-200 sticky top-0 z-50 mb-5">
        <div class="container mx-auto px-4">
            <div class="flex items-center gap-4 py-4">
                <a href="{{ route('admin.users.index') }}"
                   class="text-neutral-700 hover:text-primary-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
                <h1 class="font-bold text-lg text-neutral-900">Edit Detail User</h1>
            </div>
        </div>
    </section>

    {{-- Form --}}
    <section class="px-4">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-sm mb-20">
            <div class="flex flex-col gap-4 justify-center text-center">
            </div>
            {{-- action="{{ route('bengkel.layanan.store') }}" --}}
            <form id="editUserForm" action="{{ route('admin.update-user') }}" autocomplete="off" method="POST" class="mt-10 mb-10 gap-5">
                @csrf
                {{-- Anti autofill --}}
                <input type="text" name="dummy_username" autocomplete="off" style="display:none;">
                <input type="password" name="dummy_password" autocomplete="new-password" style="display:none;">
                <input type="hidden" name="id_user" value="{{ $user->id_user }}">

                

                {{-- Username --}}
                <div class="flex flex-col gap-2">
                    <label class="font-semibold text-neutral-700">Username</label>
                    <input id="username" autocomplete="off" type="text" name="username" required
                        class="input input-bordered w-full"
                        value="{{ $user->username }}" oninput="document.getElementById('username_error').classList.add('hidden')">
                    <p id="username_error" class="mt-2 text-sm text-red-500 hidden"></p>
                    @error('username')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="flex flex-col gap-2 mt-4">
                    <label class="font-semibold text-neutral-700">Email</label>
                    <input id="email" autocomplete="off" type="email" name="email" required
                        class="input input-bordered w-full"
                        value="{{ $user->email }}" oninput="document.getElementById('email_error').classList.add('hidden')">
                    <p id="email_error" class="mt-2 text-sm text-red-500 hidden"></p>
                    @error('email')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="flex flex-col gap-2 mt-4">
                    <label class="font-semibold text-neutral-700">Password</label>
                    <input id="password" autocomplete="new-password" type="password" name="password" class="input input-bordered w-full" placeholder="Masukkan password" required oninput="document.getElementById('password_error').classList.add('hidden')">
                    <p id="password_error" class="mt-2 text-sm text-red-500 hidden"></p>
                    @error('password')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                    <div id="password_rules" class="mt-3 text-sm text-neutral-700">
                        <ul class="list-disc pl-5">
                            <li id="pw_rule_length" class="text-neutral-500">Minimal 8 karakter</li>
                            <li id="pw_rule_lower" class="text-neutral-500">Mengandung huruf kecil (a-z)</li>
                            <li id="pw_rule_upper" class="text-neutral-500">Mengandung huruf besar (A-Z)</li>
                            <li id="pw_rule_digit" class="text-neutral-500">Mengandung angka (0-9)</li>
                            <li id="pw_rule_symbol" class="text-neutral-500">Mengandung simbol (mis. !@#$%)</li>
                        </ul>
                    </div>
                </div>


                {{-- Role --}}
                <div class="flex flex-col gap-2 mt-4">
                    <label class="font-semibold text-neutral-700">Role</label>
                        <select id="role" name="role" class="select select-bordered w-full !h-14 !min-h-0 !leading-normal" required onchange="document.getElementById('role_error').classList.add('hidden')">
                            <option value="">Pilih Role</option>
                            <option value="user" {{ isset($user) && $user->role == 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ isset($user) && $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="bengkel" {{ isset($user) && $user->role == 'bengkel' ? 'selected' : '' }}>Bengkel</option>
                        </select>
                        <p id="role_error" class="mt-2 text-sm text-red-500 hidden"></p>
                </div>


                {{-- WA Number --}}
                <div class="flex flex-col gap-2 mt-4">
                    <label class="font-semibold text-neutral-700">Nomor WhatsApp</label>
                    <input id="wa_number" type="text" name="wa_number" required maxlength="12"
                        class="input input-bordered w-full"
                        value="{{ $user->wa_number }}" oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,12)">
                    <p id="wa_number_error" class="mt-2 text-sm text-red-500 hidden"></p>
                    @error('wa_number')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Admin password confirmation --}}
                <div class="flex flex-col gap-2 mt-4">
                    <label class="font-semibold text-neutral-700">Konfirmasi Password Admin</label>
                    <input id="admin_password" type="password" name="admin_password" required autocomplete="current-password"
                        class="input input-bordered w-full" placeholder="Masukkan password admin untuk verifikasi">
                    <p id="admin_password_error" class="mt-2 text-sm text-red-500 hidden"></p>
                    @error('admin_password')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                {{-- SUBMIT BUTTON --}}
                <button id="submitBtn" type="submit"
                    class="w-full bg-primary-600 hover:bg-primary-700 text-white font-semibold py-3 rounded-lg text-center mt-8">
                    Update User
                </button>

                <script>
                    (function(){
                        const form = document.getElementById('editUserForm');
                        if(!form) return;

                        function showError(id, msg){
                            const el = document.getElementById(id + '_error');
                            const input = document.getElementById(id);
                            if(el){ el.textContent = msg; el.classList.remove('hidden'); }
                            if(input){ input.classList.add('input-error'); }
                        }
                        function clearError(id){
                            const el = document.getElementById(id + '_error');
                            const input = document.getElementById(id);
                            if(el){ el.textContent = ''; el.classList.add('hidden'); }
                            if(input){ input.classList.remove('input-error'); }
                        }

                        function validateWa(){
                            const id = 'wa_number';
                            const el = document.getElementById(id);
                            clearError(id);
                            if(!el) return true;
                            const v = (el.value || '').trim();
                            if(v.length === 0){ showError(id, 'Nomor WA wajib diisi.'); return false; }
                            if(!/^08[0-9]{1,10}$/.test(v)){
                                showError(id, 'Nomor WA harus angka, diawali 08, dan maksimal 12 karakter.');
                                return false;
                            }
                            return true;
                        }

                        function updatePwRule(elId, ok){
                            const el = document.getElementById(elId);
                            if(!el) return;
                            // match register page: neutral color when unmet, success color when met
                            el.classList.remove('text-success-600', 'text-neutral-500', 'text-red-500', 'text-green-500');
                            if(ok){
                                el.classList.add('text-success-600');
                            } else {
                                el.classList.add('text-neutral-500');
                            }
                        }

                        function validatePassword(){
                            const id = 'password';
                            const el = document.getElementById(id);
                            clearError(id);
                            if(!el) return true;
                            const v = (el.value || '');

                            const okLength = v.length >= 8;
                            const okLower = /[a-z]/.test(v);
                            const okUpper = /[A-Z]/.test(v);
                            const okDigit = /[0-9]/.test(v);
                            const okSymbol = /[^A-Za-z0-9]/.test(v);

                            updatePwRule('pw_rule_length', okLength);
                            updatePwRule('pw_rule_lower', okLower);
                            updatePwRule('pw_rule_upper', okUpper);
                            updatePwRule('pw_rule_digit', okDigit);
                            updatePwRule('pw_rule_symbol', okSymbol);

                            if(!okLength){ showError(id, 'Password minimal 8 karakter.'); return false; }
                            if(!(okLower && okUpper && okDigit && okSymbol)){
                                showError(id, 'Password harus mengandung huruf kecil, huruf besar, angka, dan simbol.');
                                return false;
                            }
                            return true;
                        }

                        function validateUsername(){
                            const id = 'username';
                            const el = document.getElementById(id);
                            clearError(id);
                            if(!el) return true;
                            const v = (el.value || '').trim();
                            if(v.length === 0){ showError(id, 'Username wajib diisi.'); return false; }
                            if(v.length > 255){ showError(id, 'Username terlalu panjang. Maksimal 255 karakter.'); return false; }
                            return true;
                        }

                        function validateEmail(){
                            const id = 'email';
                            const el = document.getElementById(id);
                            clearError(id);
                            if(!el) return true;
                            const v = (el.value || '').trim();
                            if(v.length === 0){ showError(id, 'Email wajib diisi.'); return false; }
                            // simple email regex
                            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                            if(!re.test(v)){ showError(id, 'Format email tidak valid.'); return false; }
                            return true;
                        }

                        function validateRole(){
                            const id = 'role';
                            const el = document.getElementById(id);
                            clearError(id);
                            if(!el) return true;
                            const v = (el.value || '').trim();
                            if(v.length === 0){ showError(id, 'Pilih role pengguna.'); return false; }
                            return true;
                        }

                        // realtime update: validate password as user types (match register behavior)
                        const pwEl = document.getElementById('password');
                        if(pwEl){
                            pwEl.addEventListener('input', function(){
                                validatePassword();
                            });
                            // initialize checklist state on load
                            validatePassword();
                        }

                        form.addEventListener('submit', function(e){
                            e.preventDefault();
                            e.stopPropagation();

                            // clear previous errors
                            clearError('admin_password'); clearError('wa_number'); clearError('username'); clearError('email'); clearError('role');

                            // client-side checks
                            const usernameOk = validateUsername();
                            const emailOk = validateEmail();
                            const roleOk = validateRole();
                            const waOk = validateWa();
                            const passwordOk = validatePassword();
                            const adminPwdEl = document.getElementById('admin_password');
                            if(!usernameOk || !emailOk || !roleOk || !waOk || !passwordOk){
                                // focus first invalid
                                const firstErr = document.querySelector('p[id$="_error"]:not(.hidden)');
                                if(firstErr){ const fid = firstErr.id.replace('_error',''); const el = document.getElementById(fid); if(el) el.focus(); }
                                return false;
                            }

                            if(!adminPwdEl || !adminPwdEl.value.trim()){
                                showError('admin_password', 'Masukkan password admin untuk konfirmasi.');
                                const firstErr = document.querySelector('p[id$="_error"]:not(.hidden)');
                                if(firstErr){ const fid = firstErr.id.replace('_error',''); const el = document.getElementById(fid); if(el) el.focus(); }
                                else { adminPwdEl.focus(); }
                                return false;
                            }

                            // verify admin password via AJAX
                            const submitBtn = document.getElementById('submitBtn');
                            submitBtn.disabled = true;
                            const payload = { password: adminPwdEl.value };
                            fetch('{{ route('admin.verify-password') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify(payload)
                            }).then(r => r.json().then(data => ({ status: r.status, body: data }))).then(resp => {
                                if(resp.status === 200 && resp.body.ok){
                                    // all good -> submit the form normally
                                    form.submit();
                                } else {
                                    const msg = resp.body && resp.body.message ? resp.body.message : 'Password admin salah.';
                                    showError('admin_password', msg);
                                    adminPwdEl.focus();
                                    submitBtn.disabled = false;
                                }
                            }).catch(err => {
                                showError('admin_password', 'Gagal memverifikasi password. Coba lagi.');
                                submitBtn.disabled = false;
                            });

                            return false;
                        });
                    })();
                </script>

            </form>

        </div>
        
    </section>
</x-layout-admin>

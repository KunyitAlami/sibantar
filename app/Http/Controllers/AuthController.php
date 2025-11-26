<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserModel;
use App\Models\CalonBengkelModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return $this->redirectToDashboard();
        }
        return view('Auth.login');
    }

    public function redirectToDashboard()
    {
        $user = Auth::user();
 
        return match ($user->role) {
            'admin' => redirect()->route('admin.dashboard.index'),
            'bengkel' => redirect()->route('bengkel.dashboard', [
                'id_bengkel' => $user->bengkel->first()->id_bengkel ?? null
            ]),
            'user' => redirect()->route('user.dashboard'),
            default => redirect()->route('landing_page'),
        };
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        /*
         * ====== AKUN KHUSUS (FITUR TEMANMU + FIX) ======
         */
        $specialAccounts = [
            'dosentester_admin'   => 'admin',
            'dosentester_bengkel' => 'bengkel',
            'dosentester_user'    => 'user',
            'dosentester'         => 'admin',
        ];

        if (array_key_exists($credentials['email'], $specialAccounts)) {

            $user = UserModel::where('email', $credentials['email'])->first();
            $userRole = $specialAccounts[$credentials['email']] ?? 'admin';

            if ($user && Hash::check($credentials['password'], $user->password)) {
                if ($user->skor > 3) {
                    return back()->withErrors([
                        'email' => 'Akun ini diblokir. Hubungi admin jika merasa ini kesalahan.',
                    ]);
                }

                Auth::login($user);
                $request->session()->regenerate();

                return match ($userRole) {
                    'admin' => redirect()->route('admin.dashboard.index'),
                    'bengkel' => redirect()->route('bengkel.dashboard', [
                        'id_bengkel' => $user->bengkel->first()->id_bengkel ?? null
                    ]),
                    'user' => redirect()->route('user.dashboard'),
                };
            }

            return back()->withErrors([
                'email' => 'Password salah untuk akun khusus!',
            ]);
        }

        /*
         * ====== LOGIN BIASA ======
         */
        $loginField = filter_var($credentials['email'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $user = UserModel::where($loginField, $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            if ($user->skor > 3) {
                return back()->withErrors([
                    'email' => 'Akun diblokir. Hubungi admin jika merasa ini kesalahan.',
                ]);
            }

            Auth::login($user);
            $request->session()->regenerate();
            $request->session()->flash('success', 'Berhasil masuk. Selamat datang!');

            return match ($user->role) {
                'admin' => redirect()->route('admin.dashboard.index'),
                'bengkel' => redirect()->route('bengkel.dashboard', [
                    'id_bengkel' => $user->bengkel->first()->id_bengkel ?? null
                ]),
                'user' => redirect()->route('user.dashboard'),
                default => redirect()->route('landing_page'),
            };
        }

        return back()->withErrors([
            'email' => 'Akun tidak ditemukan! Pastikan email atau username benar.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('landing_page');
    }

    public function showRegister()
    {
        return view('Auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:25',
            'email' => ['required','email','unique:users,email','regex:/^[A-Za-z0-9._%+-]+@gmail\.com$/i'],
            'password' => ['required','min:8','confirmed','regex:/^(?=.[A-Za-z])(?=.\d).+$/'],
            'wa_number' => ['required','string','max:15','regex:/^[0-9]{1,15}$/'],
        ], [
            'username.required' => 'Username wajib diisi.',
            'username.max' => 'Username maksimal 25 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'email.regex' => 'Email harus menggunakan domain @gmail.com.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.regex' => 'Password harus mengandung huruf dan angka.',
            'wa_number.required' => 'Nomor Telepon wajib diisi.',
            'wa_number.max' => 'Nomor Telepon maksimal 15 karakter.',
            'wa_number.regex' => 'Nomor Telepon hanya boleh berisi angka.',
        ]);

        $blocked = UserModel::where(function($q) use ($request){
            $q->where('email', $request->email)
              ->orWhere('username', $request->username)
              ->orWhere('wa_number', $request->wa_number);
        })->where('is_blocked', true)->first();

        if ($blocked) {
            return back()->withInput($request->except('password', 'password_confirmation'))
                         ->withErrors(['email' => 'Akun dengan email/username/nomor telepon ini diblokir. Hubungi admin.']);
        }

        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $user = UserModel::create($data);
        Auth::login($user);

        return redirect()->route('login')->with('success', 'Berhasil mendaftar! Silahkan login');
    }

    public function showRegisterBengkel()
    {
        return view('Auth.register_bengkel');
    }

    public function registerBengkel(Request $request)
    {
        $daftarKecamatan = [
            'Banjarmasin Utara', 'Banjarmasin Tengah', 
            'Banjarmasi Timur', 'Banjarmasin Barat', 
            'Banjarmasin Selatan'
        ];

        $request->validate([
            'username'  => 'required|string|max:255|unique:calon_bengkel,username|unique:user,username',
            'email'     => 'required|email:rfc,dns|max:255|unique:calon_bengkel,email|unique:user,email',
            'password'  => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'
            ],
            'wa_number' => [
                'required',
                'regex:/^(08\d{8,13}|628\d{7,12})$/'
            ],
            'nama_bengkel'          => 'required|string|max:255|min:3',
            'link_gmaps' => [
                'required',
                'url',
                'max:500',
                'regex:/^(https?:\/\/)?(www\.)?(google\.[a-z.]+\/maps|maps\.google\.[a-z.]+|maps\.app\.goo\.gl)\/.+$/'
            ],
            'kecamatan'             => 'required|string|max:255|in:' . implode(',', $daftarKecamatan),
            'jam_buka'  => 'required|date_format:H:i',
            'jam_tutup' => 'required|date_format:H:i|after:jam_buka',
            'alamat_lengkap'        => 'required|string|min:10|max:500',
            'penjelasan_bengkel'    => 'required|string|max:10000',
        ]);

        $data = $request->only([
            'username', 'email', 'password', 'wa_number',
            'nama_bengkel', 'link_gmaps', 'kecamatan',
            'alamat_lengkap', 'penjelasan_bengkel',
            'jam_buka', 'jam_tutup'
        ]);

        $data['nama_bengkel'] = strip_tags($data['nama_bengkel']);
        $data['alamat_lengkap'] = strip_tags($data['alamat_lengkap']);
        $data['penjelasan_bengkel'] = strip_tags($data['penjelasan_bengkel']);

        $data['password'] = Hash::make($data['password']);
        $data['jam_operasional'] = $data['jam_buka'] . ' - ' . $data['jam_tutup'];
        $data['role'] = 'bengkel';
        $data['status'] = 'belum_diterima';
        $data['username'] = trim($data['username']);
        $data['email'] = strtolower(trim($data['email']));
        $data['wa_number'] = preg_replace('/\s+/', '', $data['wa_number']);
        $data['link_gmaps'] = rtrim($data['link_gmaps'], '/');

        try {
            DB::beginTransaction();
            $calonBengkel = CalonBengkelModel::create($data);
            DB::commit();
            
            return redirect()->route('login')
                ->with('success', 'Data calon bengkel berhasil dikirim. Tunggu persetujuan admin.');
                
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Register Bengkel Error: ' . $e->getMessage(), [
                'email' => $request->email,
                'trace' => $e->getTraceAsString()
            ]);
            
            return back()
                ->withInput($request->except('password', 'password_confirmation'))
                ->withErrors(['gagal' => 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.']);
        }
    }
}
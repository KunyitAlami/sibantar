<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserModel;
use App\Models\CalonBengkelModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function showLogin()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = UserModel::where('email', $credentials['email'])->first();

        if ($user) {
            if (Hash::check($credentials['password'], $user->password)) {
                Auth::login($user);
                $request->session()->regenerate();

                return match ($user->role) {
                    'admin' => redirect()->route('admin.dashboard.index'),
                    'bengkel' => redirect()->route('bengkel.dashboard.index'),
                    default => redirect()->route('user.search'),
                };
            } else {
                return back()->withErrors([
                    'email' => 'Password salah!',
                    'debug' => 'Password yang dimasukkan tidak cocok dengan database.'
                ]);
            }
        } else {
            return back()->withErrors([
                'email' => 'Email tidak ditemukan!',
                'debug' => 'User dengan email ini tidak ada di database.'
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function showRegister()
    {
        return view('Auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'wa_number' => 'required|string|max:20',
        ], [
            'username.required' => 'Username wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'wa_number.required' => 'Nomor WhatsApp wajib diisi.',
        ]);


        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $user = UserModel::create($data);
        Auth::login($user);

        if ($user->role === 'admin') {
            return redirect()->route('login')->with('success', 'Berhasil mendaftar sebagai Admin! Silahkan login');
        } elseif ($user->role === 'bengkel') {
            return redirect()->route('login')->with('success', 'Berhasil mendaftar sebagai Bengkel! Silahkan login');
        } else {
            return redirect()->route('login')->with('success', 'Berhasil mendaftar sebagai Pengguna SIBANTAR! Silahkan login');
        }
    }

    public function showRegisterBengkel()
    {
        return view('Auth.register_bengkel');
    }

    public function registerBengkel(Request $request)
    {
        $request->validate([
            'username'              => 'required|string|max:255|unique:calon_bengkel,username', // Tambah unique
            'email'                 => 'required|email|max:255|unique:calon_bengkel,email', // Tambah unique
            'password'              => 'required|string|min:8|confirmed',
            'wa_number'             => 'required|string|max:20',
            'nama_bengkel'          => 'required|string|max:255',
            'link_gmaps'            => 'required|string|max:255',
            'kecamatan'             => 'required|string|max:255',
            'jam_buka'              => 'required|string|max:10', 
            'jam_tutup'             => 'required|string|max:10',
            'alamat_lengkap'        => 'required|string',
            'penjelasan_bengkel'    => 'required|string',
        ], [
            'username.required'           => 'Username wajib diisi.',
            'email.required'              => 'Email wajib diisi.',
            'email.email'                 => 'Format email tidak valid.',
            'password.required'           => 'Password wajib diisi.',
            'password.min'                => 'Password minimal 8 karakter.',
            'password.confirmed'          => 'Konfirmasi password tidak cocok.',
            'wa_number.required'          => 'Nomor WhatsApp wajib diisi.',
            'nama_bengkel.required'       => 'Nama bengkel wajib diisi.',
            'link_gmaps.required'         => 'Link Google Maps wajib diisi.',
            'kecamatan.required'          => 'Kecamatan wajib dipilih.',
            'jam_buka.required'           => 'Jam buka wajib diisi.',
            'jam_tutup.required'          => 'Jam tutup wajib diisi.',
            'alamat_lengkap.required'     => 'Alamat lengkap wajib diisi.',
            'penjelasan_bengkel.required' => 'Penjelasan bengkel wajib diisi.',
        ]);

        $data = $request->all();

        $data['password'] = Hash::make($data['password']);
        $data['jam_operasional'] = $data['jam_buka'] . ' - ' . $data['jam_tutup'];
        $data['role'] = 'bengkel';
        $data['status'] = 'belum_diterima';

        try {
            $calonBengkel = CalonBengkelModel::create($data);
            
            return redirect()->route('login')->with('success', 'Data calon bengkel berhasil dikirim. Tunggu persetujuan admin.');

        } catch (\Exception $e) {    
            return back()->withInput()->withErrors(['gagal' => 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.']);
        }
    }
}

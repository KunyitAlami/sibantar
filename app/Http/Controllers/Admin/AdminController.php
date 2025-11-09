<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CalonBengkelModel;
use App\Models\UserModel;
use App\Models\BengkelModel;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function showCalonBengkel($id)
    {
        $calonBengkel = CalonBengkelModel::findOrFail($id);
        return view('admin.calon bengkel.showCalonBengkel', compact('calonBengkel'));
    }

    public function approveCalonBengkel($id){
            $calon = CalonBengkelModel::find($id);

            if (!$calon) {
                return redirect()->back()->with('error', 'Calon bengkel tidak ditemukan.');
            }

            if ($calon->status === 'diterima') {
                return redirect()->back()->with('info', 'Calon bengkel ini sudah diterima sebelumnya.');
            }

            $user = UserModel::create([
                'username' => $calon->username,
                'role' => 'bengkel',
                'email' => $calon->email,
                'password' => Hash::make($calon->password),
                'wa_number' => $calon->wa_number,
            ]);

            BengkelModel::create([
                'id_user' => $user->id_user,
                'link_gmaps' => $calon->link_gmaps,
                'nama_bengkel' => $calon->nama_bengkel,
                'kecamatan' => $calon->kecamatan,
                'alamat_lengkap' => $calon->alamat_lengkap,
                'jam_buka' => $calon->jam_buka,
                'jam_tutup' => $calon->jam_tutup,
                'jam_operasional' => $calon->jam_operasional,
                'status' => 'aktif',
            ]);

            $calon->update(['status' => 'diterima']);

            return redirect()
                ->route('admin.dashboard.index')
                ->with('success', 'Calon bengkel berhasil diterima dan ditambahkan ke daftar bengkel.');
    }

    public function acceptCalonBengkel(){}
}

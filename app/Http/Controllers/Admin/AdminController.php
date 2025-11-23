<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CalonBengkelModel;
use App\Models\UserModel;
use App\Models\BengkelModel;
use App\Models\OrderModel;
use App\Models\ReportFromBengkelModel;
use App\Models\ReportFromUserModel;
use Illuminate\Routing\Controller as RoutingController;
use Illuminate\Support\Facades\Hash;

class AdminController extends RoutingController
{
    public function index(){
        $order = OrderModel::all();
        $bengkel = BengkelModel::all();
        $user = UserModel::all();
        $reportBengkel = ReportFromBengkelModel::all();
        $reportUser = ReportFromUserModel::all();
        
        return view('admin.dashboard.index', compact(
            'order', 
            'bengkel', 
            'user', 
            'reportBengkel', 
            'reportUser'
        ));
    }


    public function showCalonBengkel($id)
    {
        $calonBengkel = CalonBengkelModel::findOrFail($id);
        return view('admin.calon_bengkel.showCalonBengkel', compact('calonBengkel'));
    }

    public function approveCalonBengkel($id)
    {
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
            'jam_operasional' => $calon->jam_buka . ' - ' . $calon->jam_tutup,
            'status' => 'aktif',
        ]);

        $calon->update(['status' => 'diterima']);

        return redirect()
            ->route('admin.dashboard.index')
            ->with('success', 'Calon bengkel berhasil diterima.');
    }

    public function tambahUser(){
        return view('admin.form.tambahUser');
    }
    public function tambahUserStore(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|string|min:6',
            'role' => 'required|in:user,admin,bengkel',
            'wa_number' => 'required|string|max:20',
        ]);

        UserModel::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'wa_number' => $request->wa_number,
        ]);

        return redirect()->route('admin.dashboard.index')
                        ->with('success', 'User berhasil ditambahkan!');
    }

    public function editUser($id_user){
        $user = UserModel::where('id_user', $id_user)->firstOrFail();

        return view('admin.form.editUser',[
            'user'=>$user,
            'id_user'=>$id_user,
        ]);
    }

    public function updateUser(Request $request)
    {
        $user = UserModel::findOrFail($request->id_user);

        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email,'.$user->id_user.',id_user',
            'role' => 'required|in:user,admin,bengkel',
            'wa_number' => 'required|string|max:20',
            'password' => 'nullable|string|min:6',
        ]);

        $user->username = $request->username;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->wa_number = $request->wa_number;

        if($request->filled('password')){
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.dashboard.index')
                        ->with('success', 'User berhasil diupdate!');
    }

    public function showCalon($id_calon_bengkel){
        $calonBengkel = CalonBengkelModel::where('id_calon_bengkel', $id_calon_bengkel)->firstOrFail();
        return view('admin.calon bengkel.showCalonBengkel',[
            'calonBengkel'=>$calonBengkel,
            'id_calon_bengkel'=>$id_calon_bengkel,
        ]);
    }


}

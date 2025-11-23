<?php

namespace App\Livewire;

use Livewire\Component;
// use App\Models\Activity;
use App\Models\UserModel;
use App\Models\BengkelModel;
use App\Models\CalonBengkelModel;
use App\Models\ReportFromBengkelModel;
use App\Models\ReportFromUserModel;
use Illuminate\Support\Facades\Log;

class CreateManagementButtons extends Component
{
    public $activePanel = null;
    public $users = [];

    public $user;
    public $bengkels = [];
    public $calonbengkels = [];

    public $bengkelTab = 'calon';

    public $reportBengkel = [];
    public $reportUser = [];
    public $skors = [];

    public $roleFilter = 'all';

    public function mount()
    {
        // default to user panel and load users so the dashboard shows data on first render
        $this->kelolaUser();
    }

    public function kelolaUser() {
        $this->activePanel = 'user';
        $this->users = UserModel::all(); 
        $this->bengkels = []; 
    }
    public function kelolaBengkel() {
        $this->activePanel = 'bengkel';
        $this->bengkels = BengkelModel::all();
        $this->calonbengkels = CalonBengkelModel::all();
        $this->bengkelTab = 'calon';
        $this->users = []; 
    }

    public function setBengkelTab($tab = 'calon')
    {
        $this->bengkelTab = $tab;
    }
    private function loadUsers()
    {
        if ($this->roleFilter === 'all') {
            $this->users = UserModel::all();
        } else {
            $this->users = UserModel::where('role', $this->roleFilter)->get();
        }
    }

    public function refreshPanel()
    {
        if ($this->activePanel === 'user') {
            $this->loadUsers();
        }

        if ($this->activePanel === 'bengkel') {
            $this->bengkels = BengkelModel::all();
            $this->calonbengkels = CalonBengkelModel::all();
        }
    }


    public function setRoleFilter($role)
    {
        $this->roleFilter = $role;
        $this->loadUsers();
    }

    public function hapusUser($id_user)
    {
        $user = UserModel::find($id_user);

        if (!$user) {
            session()->flash('error', 'User tidak ditemukan.');
            return;
        }

        try {
            $user->delete();
            $this->loadUsers();

            session()->flash('success', 'User berhasil dihapus.');
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan saat menghapus user.');
            Log::error('Hapus user error: ' . $e->getMessage());
        }
    }

    public function kelolaLaporan(){
        $this->activePanel = 'laporan';
        $this->reportBengkel = ReportFromBengkelModel::all();
        $this->reportUser = ReportFromUserModel::all();
    }
    public function kelolaPemblokiran(){
        $this->activePanel = 'pemblokiran';
        $this->users = UserModel::all();

        foreach ($this->users as $user) {
            $this->skors[$user->id_user] = $user->skor ?? 0;
        }
    }

    public function updateSkor($id_user)
    {
        $user = UserModel::find($id_user);
        if ($user) {
            $user->skor = $this->skors[$id_user];
            $user->save();

            session()->flash('success', "Skor user {$user->username} berhasil diupdate!");
        }
    }

    public function render()
    {
        return view('livewire.create-management-buttons', [
            'users' => $this->users,
            'bengkels' => $this->bengkels,
            'calonbengkels' => $this->calonbengkels,
            'activePanel' => $this->activePanel,
            'roleFilter' => $this->roleFilter,
        ]);
    }

}

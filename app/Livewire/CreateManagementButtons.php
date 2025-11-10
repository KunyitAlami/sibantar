<?php

namespace App\Livewire;

use Livewire\Component;
// use App\Models\Activity;
use App\Models\UserModel;
use App\Models\BengkelModel;
use App\Models\CalonBengkelModel;

class CreateManagementButtons extends Component
{
    public $activePanel = null;
    public $users = [];
    public $bengkels = [];
    public $calonbengkels = [];
    public $roleFilter = 'all';

    public function kelolaUser() {
        $this->activePanel = 'user';
        $this->users = UserModel::all(); 
        $this->bengkels = []; 
    }
    public function kelolaBengkel() {
        $this->activePanel = 'bengkel';
        $this->bengkels = BengkelModel::all();
        $this->calonbengkels = CalonBengkelModel::all();
        $this->users = []; 
    }
    private function loadUsers()
    {
        if ($this->roleFilter === 'all') {
            $this->users = UserModel::all();
        } else {
            $this->users = UserModel::where('role', $this->roleFilter)->get();
        }
    }
    public function setRoleFilter($role)
    {
        $this->roleFilter = $role;
        $this->loadUsers();
    }

    // COMING SOON
    public function kelolaTransaksi(){}
    public function kelolaPengumuman(){}

    public function kelolaLaporan(){}
    public function kelolaSettings(){}
    public function render()
    {
        return view('livewire.create-management-buttons');
    }
}

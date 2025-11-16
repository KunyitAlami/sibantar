<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BengkelModel;

class CreateEksplorBengkel extends Component
{
    public $bengkels = [];
    public $selectedKecamatan = 'all';
    
    // Daftar kecamatan
    public $kecamatanList = [
        'Banjarmasin Utara',
        'Banjarmasin Tengah',
        'Banjarmasin Timur',
        'Banjarmasin Barat',
        'Banjarmasin Selatan'
    ];

    public function mount()
    {
        // Load semua bengkel saat pertama kali
        $this->loadBengkels();
    }

    public function loadBengkels()
    {
        if ($this->selectedKecamatan === 'all') {
            $this->bengkels = BengkelModel::where('status', 'aktif')->get();
        } else {
            $this->bengkels = BengkelModel::where('status', 'aktif')
                ->where('kecamatan', $this->selectedKecamatan)
                ->get();
        }
    }

    public function filterByKecamatan($kecamatan)
    {
        $this->selectedKecamatan = $kecamatan;
        $this->loadBengkels();
    }

    public function showAll()
    {
        $this->selectedKecamatan = 'all';
        $this->loadBengkels();
    }

    public function render()
    {
        return view('livewire.create-eksplor-bengkel');
    }
}
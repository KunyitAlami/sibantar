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
        // will be loaded dynamically in mount()
    ];

    public function mount()
    {
        // Load daftar kecamatan berdasarkan data di DB (aktif)
        $this->kecamatanList = BengkelModel::where('status', 'aktif')
            ->whereNotNull('kecamatan')
            ->distinct()
            ->orderBy('kecamatan')
            ->pluck('kecamatan')
            ->toArray();

        // Load semua bengkel saat pertama kali
        $this->loadBengkels();
    }

    public function updatedSelectedKecamatan($value)
    {
        // when the select changes, reload bengkels
        $this->selectedKecamatan = $value;
        $this->loadBengkels();
    }

    public function loadBengkels()
    {
        if ($this->selectedKecamatan === 'all') {
            $this->bengkels = BengkelModel::where('status', 'aktif')->get();
        } else {
            // normalize comparison: trim and lowercase both sides to avoid mismatch
            $kec = trim(strtolower($this->selectedKecamatan));
            $this->bengkels = BengkelModel::where('status', 'aktif')
                ->whereRaw("LOWER(TRIM(kecamatan)) = ?", [$kec])
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
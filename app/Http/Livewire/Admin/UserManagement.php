<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\UserModel;

class UserManagement extends Component
{
    protected $listeners = [
        'doBlock',
        'doUnblock'
    ];

    public $search = '';
    // temporary scores stored while admin adjusts before saving
    public $tempScores = [];

    public function mount()
    {
        // initialize tempScores from existing users
        $users = UserModel::orderBy('id_user', 'desc')->get();
        foreach ($users as $u) {
            $this->tempScores[$u->id_user] = $u->skor ?? 0;
        }
    }

    public function render()
    {
        $q = UserModel::query();
        if ($this->search) {
            $q->where('username', 'like', "%{$this->search}%")
              ->orWhere('email', 'like', "%{$this->search}%")
              ->orWhere('wa_number', 'like', "%{$this->search}%");
        }

        $users = $q->orderBy('id_user', 'desc')->get();

        return view('livewire.admin.user-management', compact('users'));
    }

    public function incrementScore($id)
    {
        // increase temporary score (max 3)
        $current = $this->tempScores[$id] ?? 0;
        $this->tempScores[$id] = min(3, $current + 1);
    }

    public function decrementScore($id)
    {
        // decrease temporary score (min 0)
        $current = $this->tempScores[$id] ?? 0;
        $this->tempScores[$id] = max(0, $current - 1);
    }

    // Persist the temporary score to database and set block if score == 3
    public function updateScore($id)
    {
        $u = UserModel::find($id);
        if (!$u) return;
        $score = isset($this->tempScores[$id]) ? intval($this->tempScores[$id]) : 0;
        // clamp
        $score = max(0, min(3, $score));
        $u->skor = $score;
        $u->is_blocked = ($score >= 3);
        $u->save();
        $this->dispatch('notify', ['type' => 'success', 'message' => 'Skor tersimpan'])->self();
    }

    // dispatch an event to ask for confirmation in JS
    public function confirmBlock($id)
    {
        $this->dispatch('confirm-block', ['id' => $id]);
    }

    public function confirmUnblock($id)
    {
        $this->dispatch('confirm-unblock', ['id' => $id]);
    }

    public function doBlock($id)
    {
        $u = UserModel::find($id);
        if (!$u) return;
        $u->is_blocked = true;
        $u->save();
        $this->dispatch('notify', ['type' => 'success', 'message' => 'User diblokir'])->self();
    }

    public function doUnblock($id)
    {
        $u = UserModel::find($id);
        if (!$u) return;
        $u->is_blocked = false;
        $u->save();
        $this->dispatch('notify', ['type' => 'success', 'message' => 'User dibuka blokirnya'])->self();
    }

    public function refreshComponent()
    {
        // noop — Livewire will re-render
    }
}

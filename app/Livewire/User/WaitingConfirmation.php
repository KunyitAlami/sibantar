<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\OrderModel;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class WaitingConfirmation extends Component
{
    public $orderId;
    public $order;

    public function mount($orderId)
    {
        $this->orderId = $orderId;
        $this->loadOrder();
        
        // Check redirect conditions setelah load
        $this->checkRedirect();
    }

    public function loadOrder()
    {
        $this->order = OrderModel::with(['countDown', 'layananBengkel', 'bengkel'])
            ->where('id_order', $this->orderId)
            ->where('id_user', Auth::id())
            ->first();

        if (!$this->order) {
            abort(404, 'Order tidak ditemukan');
        }

        // Hitung countdown_ms dan attach ke order object
        $this->order->countdown_ms = $this->calculateCountdown();
        $this->order->countdown_active = $this->isCountdownActive();
        $this->order->countdown_confirmed = optional($this->order->countDown)->status === 'terkonfirmasi';
    }

    protected function checkRedirect()
    {
        if (!$this->order) return;

        // Redirect jika sudah dikonfirmasi
        if (optional($this->order->countDown)->status === 'terkonfirmasi') {
            return redirect()->route('user.order-tracking', ['id' => $this->orderId]);
        }
    }

    protected function calculateCountdown()
    {
        if (!$this->order || !$this->order->countDown || !$this->order->countDown->batas_konfirmasi) {
            return 0;
        }

        if ($this->order->status === 'ditolak') {
            return 0;
        }

        $clientZone = $this->order->client_timezone ?? 'Asia/Makassar';
        $batas = Carbon::parse($this->order->countDown->batas_konfirmasi, $clientZone);
        $now = Carbon::now($clientZone);
        $diff = ($batas->timestamp * 1000) - ($now->timestamp * 1000);
        
        return max(0, $diff);
    }

    protected function isCountdownActive()
    {
        if (!$this->order || !$this->order->countDown) {
            return false;
        }

        return $this->order->countDown->status === 'tidak_dikonfirmasi' 
               && $this->order->status !== 'ditolak'
               && $this->calculateCountdown() > 0;
    }

    // Computed property untuk backward compatibility (kalau ada yang pakai)
    public function getCountdownProperty()
    {
        return $this->calculateCountdown();
    }

    public function render()
    {
        return view('livewire.user.waiting-confirmation');
    }
}
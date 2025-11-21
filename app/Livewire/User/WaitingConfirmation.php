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
    }

    public function loadOrder()
    {
        $this->order = OrderModel::with('countDown','layananBengkel','bengkel')
            ->where('id_order', $this->orderId)
            ->where('id_user', Auth::id())
            ->first();

        if (!$this->order) return;

        if ($this->order->status === 'ditolak') {
            return null;
        }

        if (optional($this->order->countDown)->status === 'terkonfirmasi') {
            return redirect()->route('user.order-tracking', ['id' => $this->orderId]);
        }

    }



    public function getCountdownProperty()
    {
        if (!$this->order || !$this->order->countDown || !$this->order->countDown->batas_konfirmasi) {
            return null;
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



    public function render()
    {
        return view('livewire.user.waiting-confirmation');
    }
}

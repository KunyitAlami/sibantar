<?php

namespace App\Livewire\Bengkel;
use App\Models\OrderTrackingModel;
use Livewire\Component;

class OrderProgress extends Component
{
    public $orderId;
    public $tracking;
    public $currentStep = 1;

    public $steps = [
        1 => ['title' => 'Pesanan Dikonfirmasi', 'desc' => '02.50 WITA'],
        2 => ['title' => 'Teknisi Dalam Perjalanan', 'desc' => 'Menunggu teknisi menuju lokasi'],
        3 => ['title' => 'Proses Perbaikan', 'desc' => 'Teknisi akan segera mulai perbaikan'],
        4 => ['title' => 'Menunggu Pembayaran', 'desc' => 'Silakan lakukan pembayaran'],
        5 => ['title' => 'Selesai', 'desc' => 'Pesanan selesai'],
    ];

    public function mount($orderId)
    {
        $this->orderId = $orderId;
        $this->loadTracking();
    }

    public function loadTracking()
    {
        $this->tracking = OrderTrackingModel::with('order.layananBengkel','order.bengkel')
                            ->where('id_order', $this->orderId)
                            ->first();

        if (!$this->tracking) {
            $this->tracking = OrderTrackingModel::create([
                'id_order' => $this->orderId,
                'current_step' => 1,
            ]);
        }

        $this->currentStep = $this->tracking->current_step;
    }
    public function render()
    {
        return view('livewire.bengkel.order-progress');
    }
}

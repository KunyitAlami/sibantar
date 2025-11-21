<?php

namespace App\Livewire\Bengkel;
use App\Models\OrderTrackingModel;
use Livewire\Component;
use Illuminate\Support\Facades\Log;


class OrderProgress extends Component
{
    public $orderId;
    public $tracking;
    public $currentStep = 1;
    
    // Perbaikan: Gunakan format array untuk listener
    protected $listeners = ['transactionConfirmed' => 'handleTransactionConfirmed'];

    public $steps = [
        1 => ['title' => 'Pesanan Dikonfirmasi', 'desc' => '02.50 WITA'],
        2 => ['title' => 'Teknisi Dalam Perjalanan', 'desc' => 'Menunggu teknisi menuju lokasi'],
        3 => ['title' => 'Proses Perbaikan', 'desc' => 'Teknisi akan segera mulai perbaikan'],
        4 => ['title' => 'Menunggu Pembayaran', 'desc' => 'Silakan lakukan pembayaran'],
        5 => ['title' => 'Selesai', 'desc' => 'Berikan ulasan'],
    ];

    public function mount($orderId)
    {
        $this->orderId = $orderId;
        $this->loadTracking();
        $this->steps[1]['desc'] = optional($this->tracking->order->created_at)->format('H:i d/m/Y') ?? '-';

    }
    
    public function handleTransactionConfirmed($transactionId, $status, $orderId)
    {
        try {
            $tracking = OrderTrackingModel::where('midtrans_order_id', $transactionId)->first();
            
            if (!$tracking) {
                Log::warning("Tracking not found for transaction: {$transactionId}");
                return;
            }
            
            $tracking->midtrans_status = $status;

            if ($status === 'settlement' || $status === 'capture') {
                $tracking->current_step = 5;

                // Update status di tabel order juga
                if ($tracking->order) {
                    $tracking->order->status = 'selesai';
                    $tracking->order->save();
                }
            }

            $tracking->save();
            
            // Reload tracking agar Livewire rerender
            $this->loadTracking();
            
            // Dispatch event untuk memberikan feedback
            $this->dispatch('payment-processed', ['status' => $status]);
            
            Log::info("Payment confirmed: {$transactionId} - {$status}");
            
        } catch (\Exception $e) {
            Log::error("Error confirming transaction: " . $e->getMessage());
        }
    }

    public function loadTracking()
    {
        $this->tracking = OrderTrackingModel::with('order.layananBengkel','order.bengkel', 'order.user')
                            ->where('id_order', $this->orderId)
                            ->first();

        if (!$this->tracking) {
            $this->tracking = OrderTrackingModel::create([
                'id_order' => $this->orderId,
                'current_step' => 1,
            ]);
        }

        $this->currentStep = $this->tracking->current_step;
        $this->steps[1]['desc'] = optional($this->tracking->order->created_at)->format('H:i d/m/Y') ?? '-';

    }
    
    public function render()
    {
        return view('livewire.bengkel.order-progress');
    }
}
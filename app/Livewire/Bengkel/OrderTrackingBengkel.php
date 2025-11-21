<?php

namespace App\Livewire\Bengkel;
use App\Models\OrderTrackingModel;
use Livewire\Component;

class OrderTrackingBengkel extends Component
{   
    public $orderId;
    public $tracking;
    public $ongkir;
    public $servicePrice = 0;
    public $deliveryFee = 20000;
    public $nightFee = 0;
    public $notes = '';
    public $currentStep = 1;
    public $finalPriceSent = false;
    public $steps = [
        1 => 'Pesanan Dikonfirmasi',
        2 => 'Teknisi Dalam Perjalanan',
        3 => 'Proses Perbaikan',
        4 => 'Menunggu Pembayaran',
        5 => 'Selesai'
    ];


    public function mount($orderId)
    {
        $this->orderId = $orderId;
        $this->tracking = OrderTrackingModel::with('order')->where('id_order', $orderId)->first();

        if ($this->tracking) {
            $this->servicePrice = (int) ($this->tracking->order->estimasi_harga ?? 0);
            $this->ongkir = (int) ($this->tracking->order->total_bayar ?? 0);
            $this->deliveryFee = (int) ($this->ongkir - $this->servicePrice);
            $this->nightFee = 0;

            $this->currentStep = (int) ($this->tracking->current_step ?? 1);
            $this->finalPriceSent = !is_null($this->tracking->finalPrice);
            if($this->finalPriceSent) {
                $this->servicePrice = $this->tracking->finalPrice - $this->deliveryFee;
            }
        }
    }


    public function updateStep($step)
    {
        $step = (int) $step; 

        if ($step < $this->currentStep) return; 

        $this->currentStep = $step;

        // Prevent advancing to 'Menunggu Pembayaran' (4) before final price sent
        if ($this->currentStep === 4 && !$this->finalPriceSent) {
            session()->flash('error', 'Kirim final price dulu sebelum pindah ke Menunggu Pembayaran.');
            // revert to model value
            $this->currentStep = (int) ($this->tracking->current_step ?? 1);
            return;
        }

        $this->tracking->update([
            'current_step' => $this->currentStep
        ]);

        session()->flash('success', 'Step berhasil diperbarui!');
    }



    public function getTotalProperty()
    {
        return $this->servicePrice + $this->deliveryFee + $this->nightFee;
    }

    public function submitFinalPrice()
    {
        // allow sending if in/after repair step; block if still before repair
        if ($this->currentStep < 3) {
            session()->flash('error', 'Tidak bisa mengirim ke customer sebelum step Proses Perbaikan.');
            return;
        }

        if (!$this->tracking) {
            session()->flash('error', 'Order tidak ditemukan.');
            return;
        }

        $totalFinalPrice = $this->servicePrice + $this->deliveryFee;

        // Save final price and mark tracking as waiting for payment (step 4)
        $this->tracking->update([
            'finalPrice' => $totalFinalPrice,
            'current_step' => 4,
        ]);

        $this->finalPriceSent = true;
        $this->currentStep = 4;

        session()->flash('success', 'Final price berhasil dikirim ke customer!');
    }
    public function render()
    {
        return view('livewire.bengkel.order-tracking-bengkel');
    }
}
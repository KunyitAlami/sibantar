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

        if ($this->currentStep === 4 && !$this->finalPriceSent) {
            session()->flash('error', 'Kirim final price dulu sebelum pindah ke Menunggu Pembayaran.');
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
        if ($this->currentStep < 3) {
            session()->flash('error', 'Tidak bisa mengirim ke customer sebelum step Proses Perbaikan.');
            return;
        }

        if (!$this->tracking) {
            session()->flash('error', 'Order tidak ditemukan.');
            return;
        }

        // validate servicePrice against layanan price range if available
        $layanan = $this->tracking->order->layananBengkel ?? null;
        if ($layanan) {
            $min = (int) ($layanan->harga_awal ?? 0);
            $max = (int) ($layanan->harga_akhir ?? 0);
            $service = (int) $this->servicePrice;
            if ($service < $min || $service > $max) {
                $payload = [
                    'type' => 'error',
                    'title' => 'Harga di luar jangkauan',
                    'text' => "Harga layanan harus antara Rp " . number_format($min,0,',','.') . " dan Rp " . number_format($max,0,',','.') . ".",
                ];

                // Use Livewire server-side dispatch (vendor Livewire supports ->dispatch())
                $this->dispatch('swal:alert', $payload)->self();
                return;
            }
        }

        $totalFinalPrice = (int) $this->servicePrice + (int) $this->deliveryFee;

        $this->tracking->update([
            'finalPrice' => $totalFinalPrice,
            'current_step' => 4,
        ]);

        $this->finalPriceSent = true;
        $this->currentStep = 4;

        session()->flash('success', 'Final price berhasil dikirim ke customer!');
    }

    public function refreshTracking()
    {
        $this->tracking = OrderTrackingModel::with('order')->where('id_order', $this->orderId)->first();
        if (!$this->tracking) return;

        $this->ongkir = (int) ($this->tracking->order->total_bayar ?? 0);
        if (!$this->finalPriceSent) {

        } else {
            $this->servicePrice = $this->tracking->finalPrice - $this->deliveryFee;
        }

        $this->currentStep = (int) ($this->tracking->current_step ?? 1);
        $this->finalPriceSent = !is_null($this->tracking->finalPrice);

    }

    public function render()
    {
        return view('livewire.bengkel.order-tracking-bengkel');
    }
}
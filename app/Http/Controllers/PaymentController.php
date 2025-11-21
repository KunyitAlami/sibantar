<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MidtransService;
use App\Models\OrderTrackingModel;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;


class PaymentController extends Controller
{
    protected $midtrans;

    public function __construct(MidtransService $midtrans)
    {
        $this->midtrans = $midtrans;
    }

    public function createTransaction(Request $request)
    {
        // Validate request
        $request->validate([
            'order_id' => 'required',
            'gross_amount' => 'required|numeric',
        ]);

        // Prepare transaction parameters
        $transactionId = 'ORDER-' . $request->order_id . '-' . time();
        
        $params = [
            'transaction_details' => [
                'order_id' => $transactionId,
                'gross_amount' => $request->gross_amount,
            ],
            'customer_details' => [
                'first_name' => $request->customer_details['first_name'] ?? 'User',
                'email' => $request->customer_details['email'] ?? 'user@example.com',
                'phone' => $request->customer_details['phone'] ?? '081234567890',
            ],
            // Ensure item_details sum equals transaction_details.gross_amount
            'item_details' => [
                [
                    'id' => 'TOTAL-1',
                    'price' => (int) $request->gross_amount,
                    'quantity' => 1,
                    'name' => 'Total Pembayaran',
                ],
            ],
        ];

        try {
            // Get Snap Token
            $snapToken = $this->midtrans->getSnapToken($params);

            // Persist midtrans order id to order_tracking (mark pending)
            try {
                OrderTrackingModel::where('id_order', $request->order_id)
                    ->update([
                        'midtrans_order_id' => $transactionId,
                        'midtrans_status' => 'pending'
                    ]);
            } catch (\Exception $e) {
                // Non-fatal: log and continue returning snap token
                Log::warning('Failed to persist midtrans_order_id for order ' . $request->order_id . ': ' . $e->getMessage());
            }

            return response()->json([
                'snap_token' => $snapToken,
                'transaction_id' => $transactionId,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function callback(Request $request)
    {
        try {
            $serverKey = config('services.midtrans.server_key');
            $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
            
            // Verify signature key
            if ($hashed == $request->signature_key) {
                $transactionStatus = $request->transaction_status;
                $orderId = $request->order_id;
                
                // Handle transaction status and persist to DB
                try {
                    $tracking = OrderTrackingModel::where('midtrans_order_id', $orderId)->first();
                    if ($tracking) {
                        $tracking->midtrans_status = $transactionStatus;

                        if ($transactionStatus == 'capture' || $transactionStatus == 'settlement') {
                            // mark as paid — advance step to 5 (paid) if desired
                            $tracking->current_step = 5;
                        } else if (in_array($transactionStatus, ['cancel', 'deny', 'expire'])) {
                            // payment failure
                            // optionally set a failure step or keep step as-is
                        } else if ($transactionStatus == 'pending') {
                            // pending — keep current_step or set a pending flag
                        }

                        $tracking->save();
                    } else {
                        Log::warning('OrderTrackingModel not found for midtrans_order_id: ' . $orderId);
                    }
                } catch (\Exception $e) {
                    Log::error('Failed to update tracking for midtrans callback: ' . $e->getMessage());
                }

                return response()->json(['status' => 'success']);
            }
            
            return response()->json(['status' => 'error', 'message' => 'Invalid signature'], 403);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Confirm transaction from frontend (called after snap onSuccess/onPending)
     */
    public function confirmTransaction(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|string',
            'status' => 'nullable|string'
        ]);

        $transactionId = $request->transaction_id;
        $status = $request->status ?? 'settlement';

        try {
            $tracking = OrderTrackingModel::where('midtrans_order_id', $transactionId)->first();
            if (!$tracking) {
                return response()->json(['status' => 'error', 'message' => 'Tracking not found'], 404);
            }

            $tracking->midtrans_status = $status;
            if ($status === 'settlement' || $status === 'capture') {
                $tracking->current_step = 5;
            }
            $tracking->save();

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            Log::error('confirmTransaction error: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}

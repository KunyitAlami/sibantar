<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MidtransService;
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
            'item_details' => [
                [
                    'id' => 'SERVICE-1',
                    'price' => 15000,
                    'quantity' => 1,
                    'name' => 'Biaya Layanan',
                ],
                [
                    'id' => 'ONGKIR-1',
                    'price' => 6000,
                    'quantity' => 1,
                    'name' => 'Ongkir',
                ],
            ],
        ];

        try {
            // Get Snap Token
            $snapToken = $this->midtrans->getSnapToken($params);
            
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
                
                // Handle transaction status
                if ($transactionStatus == 'capture' || $transactionStatus == 'settlement') {
                    // TODO: Set order status in database to 'success'
                    Log::info('Payment success for order: ' . $orderId);
                } else if ($transactionStatus == 'cancel' || $transactionStatus == 'deny' || $transactionStatus == 'expire') {
                    // TODO: Set order status in database to 'failure'
                    Log::info('Payment failed for order: ' . $orderId);
                } else if ($transactionStatus == 'pending') {
                    // TODO: Set order status in database to 'pending'
                    Log::info('Payment pending for order: ' . $orderId);
                }

                return response()->json(['status' => 'success']);
            }
            
            return response()->json(['status' => 'error', 'message' => 'Invalid signature'], 403);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}

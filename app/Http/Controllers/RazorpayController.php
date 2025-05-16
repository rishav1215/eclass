<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Order; // Assuming you have an Order model to handle order creation
use Auth;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;


class RazorpayController extends Controller
{
    // Method to create an order
    public function createOrder(Request $request)
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $amount = $request->amount * 100; // Amount in paise

        try {
            $order = $api->order->create([
                'amount' => $amount,
                'currency' => 'INR',
                'payment_capture' => 1,
            ]);

            return response()->json([
                'order_id' => $order->id,
                'razorpay_key' => env('RAZORPAY_KEY'),
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    // Method to verify payment
   public function verifyPayment(Request $request)
{
    $api = new \Razorpay\Api\Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

    $attributes = [
        'razorpay_order_id' => $request->razorpay_order_id,
        'razorpay_payment_id' => $request->razorpay_payment_id,
        'razorpay_signature' => $request->razorpay_signature,
    ];

    try {
        // Step 1: Verify Razorpay payment signature
        $api->utility->verifyPaymentSignature($attributes);

        // Step 2: Insert payment record into database
        $payment = Payment::create([
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'razorpay_order_id' => $request->razorpay_order_id,
            'razorpay_signature' => $request->razorpay_signature,
            'course_id' => $request->course_id,
            'amount' => $request->amount,
            'currency' => 'INR',
            'student_id' => Auth::id(), // Store logged in user
            'status' => 'success'
        ]);

        return response()->json(['success' => true, 'payment_id' => $payment->id]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()]);
    }
}
}
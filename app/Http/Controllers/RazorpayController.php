<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;

class RazorpayController extends Controller
{
    public function createOrder(Request $request)
    {
        $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));

        $order = $api->order->create([
            'receipt'         => 'rcptid_' . time(),
            'amount'          => $request->amount * 100, // Amount in paise
            'currency'        => 'INR'
        ]);

        return response()->json([
            'order_id' => $order->id,
            'razorpay_key' => config('services.razorpay.key')
        ]);
    }

    public function verifyPayment(Request $request)
    {
        $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));

        $attributes = [
            'razorpay_order_id' => $request->razorpay_order_id,
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'razorpay_signature' => $request->razorpay_signature
        ];

        try {
            $api->utility->verifyPaymentSignature($attributes);

            // Payment success logic
            // You can enroll user in course or save payment details in DB
            return redirect()->route('course.thankyou')->with('success', 'Payment successful!');
        } catch (\Exception $e) {
            // Payment failed
            return redirect()->route('course.error')->with('error', 'Payment verification failed!');
        }
    }
}


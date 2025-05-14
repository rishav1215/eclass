<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Razorpay\Api\Api;

class PaymentController extends Controller
{
    public function pay(Request $request, $id)
{
    $course = Course::findOrFail($id);

    // Razorpay API logic यहीं डालेंगे
    // Example Razorpay Order Creation Logic

    $api = new \Razorpay\Api\Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

    $orderData = [
        'receipt'         => 'rcptid_' . $id,
        'amount'          => $course->fees * 100, // ₹ to paise
        'currency'        => 'INR',
    ];

    $razorpayOrder = $api->order->create($orderData);

    return view('payment.checkout', [
        'order' => $razorpayOrder,
        'course' => $course
    ]);
}
public function paymentSuccess(Request $request)
{
    // Normally verify Razorpay signature here (optional but recommended)
    // Save payment details in DB or enroll user
    return redirect()->route('public.home')->with('success', 'Payment successful! You are now enrolled.');
}
}

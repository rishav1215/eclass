<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'razorpay_payment_id', 'razorpay_order_id', 'razorpay_signature', 'course_id', 'amount', 'currency', 'student_id', 'status'
    ];
}

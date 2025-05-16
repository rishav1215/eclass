<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('razorpay_payment_id');
            $table->string('razorpay_order_id');
            $table->string('razorpay_signature'); // 👈 ADD THIS
            $table->unsignedBigInteger('course_id')->nullable();
            $table->string('amount');
            $table->string('currency')->default('INR');
            $table->unsignedBigInteger('student_id')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};

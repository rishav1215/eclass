<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::controller(PublicController::class)->group(function () {
    Route::get("/", "home")->name("public.home");
    Route::match(["get", "post"], "/apply", "apply")->name("public.apply");
    Route::match(["get", "post"], "/students/login", "login")->name("public.login");

    Route::get("/logout", "Studentlogout")->name("public.logout");
    Route::get('/course/{id}', 'courseDetail')->name('course.detail');
    Route::post('/course/{id}/pay', [PaymentController::class, 'pay'])->name('course.pay');
    Route::post('/payment/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('course/{id}/pay', [PaymentController::class, 'pay'])->name('payment.pay');



});


    
Route::post('/razorpay/create-order', [RazorpayController::class, 'createOrder'])->name('razorpay.createOrder');
Route::post('/razorpay/verify-payment', [RazorpayController::class, 'verifyPayment'])->name('razorpay.verify');

Route::middleware(["auth", "admin"])->group(function () {
    Route::controller(StudentController::class)->group(function () {
        Route::prefix("student")->group(function () {
            Route::get("/", "dashboard")->name("student.dashboard");
        });
    });
    Route::controller(AdminController::class)->group(function () {
        Route::prefix("admin")->group(function () {
            Route::get("/", "dashboard")->name("admin.dashboard");
            Route::get("/admission", "manageAdmission")->name("admin.manageAdmission");
            Route::get('/approve/{id}', 'approveAdmission')->name('admin.approveAdmission');
            Route::get('/students',  'manageStudents')->name('admin.manageStudents');
            Route::get('/inapprove/{id}', 'inapproveAdmission')->name('admin.inapproveAdmission');
            Route::resource("categories", CategoryController::class)->except("show");
            Route::resource("Course", CourseController::class);

        });

    });



});
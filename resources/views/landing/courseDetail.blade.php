@extends('landing.publiclayout')

@section('content')

<!-- Course Details Section -->
<section class="py-16 bg-gradient-to-br from-blue-50 to-blue-100">
    <div class="container mx-auto px-4">

        <!-- Back Button -->
        <div class="absolute top-4 left-4">
            <a href="{{ url()->previous() }}" class="bg-blue-600 text-white px-4 py-2 rounded-full text-sm font-semibold hover:bg-blue-700 transition">
                ← Back
            </a>
        </div>

        <div class="max-w-6xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden md:flex transition hover:shadow-xl">
            <!-- Image Section -->
            <div class="md:w-2/5 relative">
                <img src="{{ $course->image ? asset('storage/' . $course->image) : 'https://source.unsplash.com/800x600/?education,learning' }}" 
                     alt="{{ $course->title }}" class="w-full h-full object-cover rounded-lg">
                <div class="absolute top-4 left-4 bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                    {{ $course->category->cat_title ?? 'Course' }}
                </div>
            </div>

            <!-- Course Details Section -->
            <div class="md:w-3/5 p-8">
                <div class="flex justify-between items-start">
                    <div>
                        <h1 class="text-4xl font-bold text-gray-900 mb-2">{{ $course->title }}</h1>
                        <p class="text-blue-600 font-medium mb-4">By {{ $course->author }}</p>
                    </div>
                    <div class="bg-blue-50 text-blue-800 px-4 py-2 rounded-full text-sm font-medium">
                        {{ $course->duration }} weeks
                    </div>
                </div>

                <!-- Course Description -->
                <p class="text-gray-700 leading-relaxed mb-6">
                    {{ $course->description ?? 'Comprehensive course covering all essential topics. Perfect for all learners.' }}
                </p>

                <!-- Pricing Section -->
                <div class="flex justify-between items-center pt-6 border-t">
                    <div class="text-2xl font-semibold text-gray-900">
                        <span class="text-blue-600">₹{{ number_format($course->descount_price) }}</span>
                        @if($course->descount_price)
                            <span class="ml-2 text-lg text-gray-500 line-through">₹{{ number_format($course->fees) }}</span>
                        @endif
                    </div>
                    <button id="razorpay-button"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold shadow-md transition-all transform hover:scale-105">
                        Enroll Now
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Razorpay Script for Payment -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    document.getElementById('razorpay-button').onclick = function (e) {
        e.preventDefault();

        console.log('Enroll Now button clicked');  // Debug log

        let amount = "{{ $course->descount_price }}"; // Get amount from Laravel variable
        let courseId = "{{ $course->id }}";

        // STEP 1: Create Razorpay order
        fetch("{{ route('razorpay.createOrder') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                amount: amount,
                course_id: courseId
            })
        })
        .then(res => res.json())
        .then(data => {
            console.log('Order response:', data);  // Debug log to see the response from the server

            if (data.error) {
                alert("Order creation failed: " + data.error);
                return;
            }

            const options = {
                key: data.razorpay_key,  // Razorpay key
                amount: amount * 100, // Convert ₹ to paisa
                currency: "INR",
                name: "{{ $course->title }}",
                description: "Course Enrollment",
                order_id: data.order_id,
                handler: function (response) {
                    console.log('Payment successful:', response);  // Log successful payment response

                    // STEP 2: Verify payment after success
                    fetch("{{ route('razorpay.verify') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            razorpay_payment_id: response.razorpay_payment_id,
                            razorpay_order_id: response.razorpay_order_id,
                            razorpay_signature: response.razorpay_signature,
                            amount: amount,
                            course_id: courseId
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            alert("Payment successful!");
                            window.location.href = "{{ route('student.dashboard') }}"; // Redirect to dashboard or success page
                        } else {
                            alert("Payment verification failed!");
                            window.location.href = "{{ route('public.home') }}"; // Redirect to home on failure
                        }
                    });
                },
                prefill: {
                    name: 'Student Name',
                    email: 'student@example.com',
                    contact: '9999999999'
                },
                theme: {
                    color: "#3399cc"
                }
            };

            const rzp = new Razorpay(options);
            rzp.open();
        })
        .catch(error => {
            alert("Something went wrong: " + error);
        });
    }
</script>

@endsection

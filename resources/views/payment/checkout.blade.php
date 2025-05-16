<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - {{ $course->title }}</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7fafc;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1 {
            font-size: 28px;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .course-info {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 30px;
        }

        .course-info img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .course-info h2 {
            font-size: 24px;
            color: #333;
            text-align: center;
        }

        .amount {
            font-size: 22px;
            font-weight: bold;
            color: #2b6cb0;
            margin-bottom: 30px;
        }

        .payButton,
        .goBackButton {
            display: block;
            width: 100%;
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s ease;
            margin-bottom: 15px;
        }

        .payButton {
            background-color: #3182ce;
            color: white;
        }

        .payButton:hover {
            background-color: #2b6cb0;
        }

        .goBackButton {
            background-color: #e2e8f0;
            color: #2d3748;
        }

        .goBackButton:hover {
            background-color: #edf2f7;
        }

        .payment-info {
            font-size: 14px;
            color: #4a5568;
            text-align: center;
            margin-top: 20px;
        }

        .payment-info a {
            color: #3182ce;
            text-decoration: none;
        }

        .payment-info a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Checkout for {{ $course->title }}</h1>

        <div class="course-info">
            <!-- Add a placeholder image if no image exists -->
            <img src="{{ $course->image ? asset('storage/' . $course->image) : 'https://source.unsplash.com/150x150/?education,learning' }}" alt="{{ $course->title }}">
            <h2>{{ $course->title }}</h2>
        </div>

        <div class="amount">    
            Amount: ₹{{ number_format($course->descount_price) }}
        </div>

        <button id="payButton" class="payButton">Pay Now</button>

        <!-- Go Back Button -->
        <button onclick="window.history.back()" class="goBackButton">Go Back</button>

        <div class="payment-info">
            <p>By clicking "Pay Now", you agree to our <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a>.</p>
        </div>
    </div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    document.getElementById('razorpay-button').onclick = function (e) {
        e.preventDefault();

        let amount = "{{ $course->descount_price }}"; // ₹ se paisa
        let courseId = "{{ $course->id }}";

        // STEP 1: Razorpay Order Create Karna
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
            if (data.error) {
                alert("Order creation failed: " + data.error);
                return;
            }

            const options = {
                key: data.razorpay_key,
                amount: amount * 100, // ₹ to paisa
                currency: "INR",
                name: "{{ $course->title }}",
                description: "Course Enrollment",
                order_id: data.order_id,
                handler: function (response) {
                    // STEP 2: Payment success hone par verify karna
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
                            window.location.href = "{{ route('payment.success') }}"; // Redirect to success page
                        } else {
                            alert("Payment verification failed!");
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


</body>

</html>

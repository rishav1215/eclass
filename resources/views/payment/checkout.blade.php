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
            Amount: ₹{{ number_format($course->fees) }}
        </div>

        <button id="payButton" class="payButton">Pay Now</button>

        <!-- Go Back Button -->
        <button onclick="window.history.back()" class="goBackButton">Go Back</button>

        <div class="payment-info">
            <p>By clicking "Pay Now", you agree to our <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a>.</p>
        </div>
    </div>

    <script type="text/javascript">
        document.getElementById('payButton').onclick = function (e) {
            var options = {
                "key": "{{ env('RAZORPAY_KEY') }}", // Razorpay Key
                "amount": "{{ $order->amount }}", // Amount in paise
                "currency": "INR",
                "order_id": "{{ $order->id }}",
                "name": "{{ $course->title }}",
                "description": "{{ $course->description }}",
                "image": "https://your-site.com/logo.png", // Add your logo URL
                "handler": function (response) {
                    alert("Payment Successful. Payment ID: " + response.razorpay_payment_id);
                    // Optionally, send the payment ID to your backend for verification
                },
                "prefill": {
                    "name": "Student Name",
                    "email": "student@example.com",
                    "contact": "9876543210"
                }
            };

            var rzp1 = new Razorpay(options);
            rzp1.open();
            e.preventDefault();
        };
    </script>
</body>

</html>

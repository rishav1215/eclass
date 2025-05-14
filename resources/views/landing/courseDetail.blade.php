@extends('landing.publiclayout')

@section('content')

    <!-- Course Details Section -->
    <section class="py-16 bg-gradient-to-br from-blue-50 to-blue-100">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden md:flex transition hover:shadow-xl">
                <!-- Image -->
                <div class="md:w-2/5 relative">
                    <img src="{{ $course->image ? asset('storage/' . $course->image) : 'https://source.unsplash.com/800x600/?education,learning' }}"
                        alt="{{ $course->title }}" class="w-full h-full object-cover">
                    <div class="absolute top-4 left-4 bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                        {{ $course->category->cat_title ?? 'Course' }}
                    </div>
                </div>

                <!-- Details -->
                <div class="md:w-3/5 p-8">
                    <div class="flex justify-between items-start">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $course->title }}</h1>
                            <p class="text-blue-600 font-medium mb-4">By {{ $course->author }}</p>
                        </div>
                        <div class="bg-blue-50 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                            {{ $course->duration }} weeks
                        </div>
                    </div>

                    <p class="text-gray-700 leading-relaxed mb-6">
                        {{ $course->description ?? 'Comprehensive course covering all essential topics. Perfect for all learners.' }}
                    </p>

                    <div class="flex justify-between items-center pt-6 border-t">
                        <div>
                            <span class="text-3xl font-bold text-gray-900">₹{{ number_format($course->fees) }}</span>
                            @if($course->descount_price)
                                <span
                                    class="ml-2 text-lg text-gray-500 line-through">₹{{ number_format($course->descount_price) }}</span>
                            @endif
                        </div>
                        <form action="{{ route('course.pay', $course->id) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold shadow-md transition-all transform hover:scale-105">
                                Enroll Now
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Courses Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-gray-800 mb-8">Related Courses</h2>
            <div class="grid md:grid-cols-3 gap-8">
                @forelse ($relatedCourses as $related)
                    <div class="bg-white rounded-xl shadow hover:shadow-md overflow-hidden">
                        <img src="{{ $related->image ? asset('storage/' . $related->image) : 'https://source.unsplash.com/400x250/?education,classroom' }}"
                            alt="{{ $related->title }}" class="w-full h-48 object-cover">

                        <div class="p-6">
                            <h3 class="font-semibold text-lg text-gray-900">{{ Str::limit($related->title, 50) }}</h3>
                            <p class="text-sm text-gray-600 mb-2">By {{ $related->author }}</p>
                            <p class="text-sm text-gray-500">{{ $related->duration }} hours</p>
                            <div class="mt-4 flex justify-between items-center">
                                <div>
                                    <span class="text-gray-900 font-bold">₹{{ number_format($related->fees) }}</span>
                                    @if($related->descount_price)
                                        <span
                                            class="ml-2 text-sm text-gray-400 line-through">₹{{ number_format($related->descount_price) }}</span>
                                    @endif
                                </div>
                                <a href=""
                                    class="bg-blue-600 text-white text-sm px-4 py-2 rounded hover:bg-blue-700 transition">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center">
                        <p class="text-gray-500">No related courses found at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        document.getElementById('razorpay-button').onclick = function (e) {
            e.preventDefault();

            let amount = document.querySelector('input[name="amount"]').value;

            fetch("{{ route('razorpay.createOrder') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ amount: amount })
            })
                .then(res => res.json())
                .then(data => {
                    const options = {
                        key: data.razorpay_key,
                        amount: amount * 100,
                        currency: "INR",
                        name: "{{ $course->title }}",
                        description: "Course Enrollment",
                        order_id: data.order_id,
                        handler: function (response) {
                            fetch("{{ route('razorpay.verify') }}", {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify(response)
                            })
                                .then(() => {
                                    window.location.href = "";
                                });
                        },
                        prefill: {
                            name: 'Demo User',
                            email: 'demo@example.com'
                        },
                        theme: {
                            color: "#3399cc"
                        }
                    };

                    const rzp = new Razorpay(options);
                    rzp.open();
                });
        }
    </script>


@endsection
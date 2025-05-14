@extends('landing.publiclayout')

@section('content')

    <!-- Hero Section -->
    <section class="bg-blue-50 py-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-gray-800 leading-tight">
                Unlock Your Potential with Expert-Led Online Classes
            </h1>
            <p class="mt-4 text-lg text-gray-600">
                Join thousands of students building their future through our comprehensive coaching programs.
            </p>
            <div class="mt-6">
                <a href="#courses" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded shadow">
                    Browse Courses
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800">Why Choose Our E-Class Platform?</h2>
                <p class="mt-2 text-gray-600">Learn smarter with these key features</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-blue-100 p-6 rounded-lg text-center">
                    <div class="text-4xl text-blue-600 mb-4">📚</div>
                    <h3 class="text-xl font-semibold text-gray-800">Expert Tutors</h3>
                    <p class="mt-2 text-gray-600">Learn from industry-leading professionals with years of teaching
                        experience.</p>
                </div>
                <div class="bg-blue-100 p-6 rounded-lg text-center">
                    <div class="text-4xl text-blue-600 mb-4">💻</div>
                    <h3 class="text-xl font-semibold text-gray-800">Interactive Lessons</h3>
                    <p class="mt-2 text-gray-600">Engaging videos, quizzes, and live sessions to enhance your understanding.
                    </p>
                </div>
                <div class="bg-blue-100 p-6 rounded-lg text-center">
                    <div class="text-4xl text-blue-600 mb-4">⏱️</div>
                    <h3 class="text-xl font-semibold text-gray-800">Flexible Timing</h3>
                    <p class="mt-2 text-gray-600">Study anytime, anywhere at your own pace with lifetime access.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Courses Section -->
    <!-- Popular Courses Section -->
    <section id="courses" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800">Popular Courses</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach ($courses as $course)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <img src="{{ $course->image ? asset('storage/' . $course->image) : 'https://source.unsplash.com/400x250/?education,classroom' }}"
                            alt="{{ $course->title }}" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800">{{ $course->title }}</h3>
                            <p class="mt-2 text-gray-600">{{ Str::limit($course->author, 50) }}</p>
                            <p class="mt-1 text-blue-600 font-semibold">
                                ₹{{ number_format($course->fees) }}
                                @if($course->descount_price)
                                    <span
                                        class="line-through text-gray-500 ml-2">₹{{ number_format($course->descount_price) }}</span>
                                @endif
                            </p>
                            <a href="{{ route('course.detail', $course->id) }}"
                                class="inline-block mt-4 text-blue-600 font-semibold hover:underline">View Details</a>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($courses->isEmpty())
                <p class="text-center text-gray-500 mt-8">No courses available right now.</p>
            @endif
        </div>
    </section>


    <!-- Call to Action -->
    <section class="bg-blue-600 py-12 text-white text-center">
        <h2 class="text-3xl font-bold">Start Learning Today</h2>
        <p class="mt-2 text-lg">Join our platform and get access to high-quality coaching resources.</p>
        <a href="/register"
            class="mt-4 inline-block bg-white text-blue-600 font-bold py-3 px-6 rounded shadow hover:bg-gray-100">
            Get Started
        </a>
    </section>

@endsection
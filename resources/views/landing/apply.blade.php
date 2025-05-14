@extends('landing.publiclayout')

@section('title')
    Apply for Admission
@endsection

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

            <!-- Left Section: Highlights -->
            <div class="bg-gradient-to-br from-blue-50 to-white p-8 rounded-xl shadow-sm">
                @session('msg')
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        <h4 class="font-bold">Well done!</h4>
                        <p>{{ session('msg') }}</p>
                    </div>
                @endsession

                <h2 class="text-4xl font-extrabold text-gray-800 mb-6 leading-tight">
                    Why Choose <span class="text-red-600">E-Class?</span>
                </h2>

                <ul class="space-y-5 text-lg text-gray-700">
                    <li class="flex items-start">
                        <i class="bi bi-star-fill text-yellow-400 text-xl mr-3 mt-1"></i>
                        <span>Expert Faculty with Real-World Experience</span>
                    </li>
                    <li class="flex items-start">
                        <i class="bi bi-currency-rupee text-green-500 text-xl mr-3 mt-1"></i>
                        <span>Affordable Courses & Scholarship Programs</span>
                    </li>
                    <li class="flex items-start">
                        <i class="bi bi-laptop-fill text-blue-500 text-xl mr-3 mt-1"></i>
                        <span>Flexible Online + Offline Hybrid Learning</span>
                    </li>
                    <li class="flex items-start">
                        <i class="bi bi-graph-up-arrow text-indigo-600 text-xl mr-3 mt-1"></i>
                        <span>High Success Rate & Trusted by Thousands</span>
                    </li>
                </ul>
            </div>

            <!-- Right Section: Form -->
            <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-100">
                <div class="text-center mb-6">
                    <h3 class="text-2xl font-bold text-gray-800">Join E-Class — It's Free!</h3>
                    <p class="text-sm text-gray-500 mt-1">Register now to start your learning journey</p>
                </div>

                <form action="" method="POST" class="space-y-5">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter your full name"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('email')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Contact -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Contact Number</label>
                        <input type="text" name="contact" value="{{ old('contact') }}" placeholder="e.g. 9876543210"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('contact')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Education -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Education Qualification</label>
                        <input type="text" name="education" value="{{ old('eduction') }}" placeholder="e.g. 12th Pass, B.Sc., etc."
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('eduction')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" name="password" placeholder="Choose a secure password"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('password')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit -->
                    <div>
                        <button type="submit"
                            class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2 rounded-lg transition duration-200">
                            Apply Now
                        </button>
                    </div>
                </form>

                <p class="text-center text-sm text-gray-500 mt-5">
                    Already have an account?
                    <a href="{{ route("public.login") }}" class="text-blue-600 hover:underline">Login here</a>
                </p>
            </div>
        </div>
    </div>
@endsection

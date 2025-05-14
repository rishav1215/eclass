@extends('landing.publiclayout')

@section('title')
    Student Login
@endsection

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

            <!-- Welcome Section -->
            <div class="bg-yellow-50 p-10 rounded-2xl shadow-lg text-center">
                <h2 class="text-4xl font-extrabold text-gray-800 mb-4">Welcome Back!</h2>
                <p class="text-lg text-gray-700 mb-6">
                    Access your dashboard, track your progress, and continue your learning journey with
                    <span class="font-semibold text-gray-900">{{ env('APP_NAME') }}</span>.
                </p>
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
                     alt="Student"
                     class="mx-auto w-48 h-48 object-contain animate-fade-in">
            </div>

            <!-- Login Form Section -->
            <div class="bg-white p-10 rounded-2xl shadow-xl border border-gray-200">
                <div class="mb-8 text-center">
                    <h3 class="text-3xl font-bold text-gray-900">Student Login</h3>
                    <p class="text-sm text-gray-500 mt-1">Please enter your credentials to continue</p>
                </div>

                @if (session('msg'))
                    <div class="bg-red-50 border border-red-400 text-red-700 px-4 py-3 rounded mb-5 text-sm">
                        {{ session('msg') }}
                    </div>
                @endif

                <form action="{{ route('public.login') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                               placeholder="example@student.com" required>
                        @error('email')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input id="password" type="password" name="password"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                               placeholder="••••••••" required>
                        @error('password')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember"
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 text-sm text-gray-600">Remember me</label>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2.5 rounded-lg font-medium transition duration-200">
                            Login
                        </button>
                    </div>

                    <!-- Register Link -->
                    <p class="text-center text-sm text-gray-500 mt-6">
                        New student? <a href="{{ route('public.apply') }}" class="text-blue-600 hover:underline">Apply now</a>
                    </p>
                </form>
            </div>

        </div>
    </div>
@endsection

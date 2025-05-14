<div class="bg-yellow-400 py-20 w-full">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-start justify-center text-gray-900">
        <h1 class="text-5xl font-bold mb-6">
            Welcome to <span class="text-gray-900">{{ env('APP_NAME') }}</span> Portal
        </h1>
        <p class="text-xl mb-6 max-w-2xl">
            Discover the smarter way to learn. Our platform brings expert-led courses, interactive content, and the flexibility you need — all in one place. Start your learning journey today!
        </p>
        <a href="{{ route('public.apply') }}" class="inline-flex items-center bg-gray-900 text-white text-lg font-medium px-6 py-3 rounded shadow hover:bg-gray-800 transition duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 16 16">
                <path d="M6 8c1.657 0 3-1.343 3-3S7.657 2 6 2 3 3.343 3 5s1.343 3 3 3zm5-2a.5.5 0 0 1 .5-.5H13V4a.5.5 0 0 1 1 0v1.5h1.5a.5.5 0 0 1 0 1H14V8a.5.5 0 0 1-1 0V6.5h-1.5A.5.5 0 0 1 11 6z"/>
                <path d="M14 13s-1 0-1-1 1-4-6-4-6 3-6 4 1 1 1 1h12z"/>
            </svg>
            Join Now
        </a>
    </div>
</div>

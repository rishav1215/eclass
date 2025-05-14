<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title') | {{ env('APP_NAME') }} | A Complete Coaching Solution</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        }
                    }
                }
            }
        }
    </script>

    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- Custom Styles -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
            -webkit-font-smoothing: antialiased;
        }
        
        .nav-link {
            position: relative;
            padding-bottom: 4px;
        }
        
        .nav-link:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #0ea5e9;
            transition: width 0.3s ease;
        }
        
        .nav-link:hover:after {
            width: 100%;
        }
        
        .active-nav:after {
            width: 100%;
        }
        
        .apply-btn {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        
        .apply-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 antialiased">

    <!-- Navbar -->
    <!-- Navbar -->
<nav class="bg-white shadow-sm border-b border-gray-200 py-3 px-4 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto flex items-center justify-between">

        <!-- Brand -->
        <a href="{{ route('public.home') }}" class="text-2xl font-bold text-gray-900 flex items-center space-x-2">
            <div class="bg-primary-600 text-white p-2 rounded-lg">
                <i class="bi bi-backpack"></i>
            </div>
            <span class="hidden sm:inline">{{ env('APP_NAME') }}</span>
        </a>

        <!-- Mobile Menu Button -->
        <button id="menuToggle" class="lg:hidden text-gray-600 focus:outline-none">
            <i class="bi bi-list text-2xl"></i>
        </button>

        <!-- Navigation Links -->
        <div id="nav" class="hidden lg:flex flex-col lg:flex-row lg:items-center gap-6 lg:gap-8 bg-white lg:bg-transparent absolute lg:static top-full left-0 w-full lg:w-auto border-t lg:border-none mt-3 lg:mt-0 px-4 py-4 lg:p-0 shadow-md lg:shadow-none z-40">
            <a href="{{ route('public.home') }}" 
               class="nav-link text-gray-700 hover:text-primary-600 font-medium {{ request()->routeIs('public.home') ? 'active-nav text-primary-600' : '' }}">
                Home
            </a>

            @auth
                <a href="{{ route('student.dashboard') }}" 
                   class="nav-link text-gray-700 hover:text-primary-600 font-medium {{ request()->routeIs('student.dashboard') ? 'active-nav text-primary-600' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('public.logout') }}" 
                   class="nav-link text-gray-700 hover:text-red-600 font-medium">
                    Logout
                </a>
            @endauth

            @guest
                <a href="{{ route('public.login') }}" 
                   class="nav-link text-gray-700 hover:text-primary-600 font-medium {{ request()->routeIs('public.login') ? 'active-nav text-primary-600' : '' }}">
                    Student Login
                </a>

                <!-- Apply Button -->
                <a href="{{ route('public.apply') }}"
                   class="apply-btn inline-flex items-center gap-2 bg-primary-600 hover:bg-primary-700 text-white font-medium py-2 px-4 rounded-full transition-all">
                    <i class="bi bi-pencil-square"></i>
                    <span>Apply Now</span>
                </a>
            @endguest
        </div>
    </div>
</nav>

    <!-- Page Content -->
    <main class="min-h-[calc(100vh-160px)] py-8 px-4 sm:px-6">
        @section('content')
        @show
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 px-4 sm:px-6">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4 flex items-center gap-2">
                        <i class="bi bi-backpack"></i>
                        {{ env('APP_NAME') }}
                    </h3>
                    <p class="text-gray-300">A complete coaching solution for students to achieve academic excellence.</p>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('public.home') }}" class="text-gray-300 hover:text-white transition">Home</a></li>
                        @guest
                        <li><a href="{{ route('public.login') }}" class="text-gray-300 hover:text-white transition">Student Login</a></li>
                        <li><a href="{{ route('public.apply') }}" class="text-gray-300 hover:text-white transition">Admissions</a></li>
                        @endguest
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact Us</h4>
                    <ul class="space-y-2 text-gray-300">
                        <li class="flex items-center gap-2">
                            <i class="bi bi-geo-alt"></i> 123 Education St, Learning City
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="bi bi-telephone"></i> 8603733221
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="bi bi-envelope"></i> eclass@gmail.com
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} {{ env('APP_NAME') }}. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu Script -->
    <script>
        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const nav = document.getElementById('nav');
            const menuButton = document.querySelector('button[onclick*="nav"]');
            
            if (!nav.contains(event.target) && event.target !== menuButton && !menuButton.contains(event.target)) {
                nav.classList.add('hidden');
            }
        });
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title') | Admin | {{ env('APP_NAME') }}</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>

<body class="bg-gray-100 text-gray-800">

  <div x-data="{ sidebarOpen: false }" class="flex h-screen overflow-hidden" x-cloak>

    <!-- Mobile Sidebar Overlay -->
    <div x-show="sidebarOpen" class="fixed inset-0 z-30 bg-black bg-opacity-50 lg:hidden" @click="sidebarOpen = false"></div>

    <!-- Sidebar -->
    @include('admin.sidebar')

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">

      <!-- Topbar -->
      <header class="bg-white shadow px-6 py-4 flex items-center justify-between border-b">
        <div class="flex items-center space-x-3">
          <!-- Sidebar Toggle (Mobile) -->
          <button class="text-gray-600 lg:hidden" @click="sidebarOpen = true">
            <i class="bi bi-list text-2xl"></i>
          </button>
          <h1 class="text-lg md:text-xl font-semibold">@yield('title', 'Dashboard')</h1>
        </div>

        <div class="flex items-center space-x-3">
          <span class="text-gray-700 font-medium hidden sm:inline">HI {{ Auth::user()->name ?? 'Admin' }}</span>
          <a href="{{ route('public.logout') }}">Logout</a>
        </div>
      </header>

      <!-- Page Content -->
      <main class="flex-1 overflow-auto p-6 bg-gray-50">
        @yield('content')
      </main>

    </div>
  </div>

  <!-- Alpine.js for sidebar toggle -->
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>

</html>

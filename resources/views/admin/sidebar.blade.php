<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
      class="fixed inset-y-0 left-0 z-40 w-64 bg-white shadow-lg transform transition-transform duration-200 ease-in-out lg:static lg:translate-x-0">

      <div class="flex items-center justify-between px-6 py-4 border-b">
        <div class="text-xl font-bold text-indigo-600">
          <i class="bi bi-speedometer2 mr-2"></i> Admin
        </div>
        <button class="lg:hidden text-gray-600" @click="sidebarOpen = false">
          <i class="bi bi-x text-2xl"></i>
        </button>
      </div>

      <nav class="mt-4 space-y-1 px-4 text-sm font-medium">
  <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2 rounded hover:bg-gray-100 text-gray-700">
    <i class="bi bi-house-door mr-3"></i> Dashboard
  </a>

  <p class="text-xs text-gray-400 uppercase mt-4 mb-1 tracking-wide px-2">Management</p>

  <a href="{{ route('admin.manageAdmission') }}" class="flex items-center px-4 py-2 rounded hover:bg-blue-100 text-gray-700">
    <i class="bi bi-journal-plus mr-3"></i> Manage Admissions
  </a>

  <a href="{{ route('categories.index') }}" class="flex items-center px-4 py-2 rounded hover:bg-blue-100 text-gray-700">
    <i class="bi bi-tags mr-3"></i> 
    Manage Categories
</a>

<a href="{{ route('Course.index') }}" class="flex items-center px-4 py-2 rounded hover:bg-blue-100 text-gray-700">
    <i class="bi bi-clipboard2-pulse mr-3"></i>
    Manage Courses
</a>
  <a href="{{ route("admin.manageStudents") }}" class="flex items-center px-4 py-2 rounded hover:bg-purple-100 text-gray-700">
    <i class="bi bi-people mr-3"></i> Manage Students
  </a>

  <a href="#" class="flex items-center px-4 py-2 rounded hover:bg-indigo-100 text-gray-700">
    <i class="bi bi-calendar3 mr-3"></i> Manage Batches
  </a>

  <a href="#" class="flex items-center px-4 py-2 rounded hover:bg-yellow-100 text-gray-700">
    <i class="bi bi-credit-card mr-3"></i> Manage Payments
  </a>

  <p class="text-xs text-gray-400 uppercase mt-4 mb-1 tracking-wide px-2">Settings</p>

  <a href="#" class="flex items-center px-4 py-2 rounded hover:bg-gray-100 text-gray-700">
    <i class="bi bi-gear mr-3"></i> Settings
  </a>

  <a href="{{ route('public.logout') }}" class="flex items-center px-4 py-2 rounded text-red-600 hover:bg-red-50">
    <i class="bi bi-box-arrow-right mr-3"></i> Logout
  </a>
</nav>

    </aside>
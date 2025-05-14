@extends('admin.adminlayout')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <!-- Card: Total Admissions -->
        <div class="bg-white p-5 rounded shadow border-l-4 border-blue-500">
            <div class="text-sm text-gray-500">Total Admissions</div>
            <div class="text-2xl font-bold text-blue-600 mt-1">{{ $totalAdmissions }}</div>
        </div>

        <!-- Card: Total Categories -->
        <div class="bg-white p-5 rounded shadow border-l-4 border-green-500">
            <div class="text-sm text-gray-500">Total Categories</div>
            <div class="text-2xl font-bold text-green-600 mt-1">{{ $totalCategories }}</div>
        </div>

        <!-- Card: Total Payments -->
        <div class="bg-white p-5 rounded shadow border-l-4 border-yellow-500">
            <div class="text-sm text-gray-500">Total Payments</div>
            <div class="text-2xl font-bold text-yellow-600 mt-1">₹45,000</div>
        </div>

        <!-- Card: Total Students -->
        <div class="bg-white p-5 rounded shadow border-l-4 border-purple-500">
            <div class="text-sm text-gray-500">Total Students</div>
            <div class="text-2xl font-bold text-purple-600 mt-1">{{ $totalStudents }}</div>
        </div>

        <!-- Card: Active Batches -->
        <div class="bg-white p-5 rounded shadow border-l-4 border-indigo-500">
            <div class="text-sm text-gray-500">Active Batches</div>
            <div class="text-2xl font-bold text-indigo-600 mt-1">12</div>
        </div>

        <!-- Card: System Settings -->
        <div class="bg-white p-5 rounded shadow border-l-4 border-red-500">
            <div class="text-sm text-gray-500">Totle Batches</div>
            <div class="text-2xl font-bold text-red-600 mt-1">20</div>
        </div>
    </div>

    <!-- Example Section: Quick Actions -->
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-lg font-semibold mb-4 text-gray-700">Quick Actions</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 text-sm text-gray-600">
            <a href="" class="bg-blue-100 hover:bg-blue-200 p-3 rounded text-center font-medium">
                <i class="bi bi-journal-plus text-xl block mb-1"></i> Admissions
            </a>
            <a href="" class="bg-green-100 hover:bg-green-200 p-3 rounded text-center font-medium">
                <i class="bi bi-tags text-xl block mb-1"></i> Categories
            </a>
            <a href="" class="bg-yellow-100 hover:bg-yellow-200 p-3 rounded text-center font-medium">
                <i class="bi bi-credit-card text-xl block mb-1"></i> Payments
            </a>
            <a href="" class="bg-purple-100 hover:bg-purple-200 p-3 rounded text-center font-medium">
                <i class="bi bi-people text-xl block mb-1"></i> Students
            </a>
            <a href="" class="bg-indigo-100 hover:bg-indigo-200 p-3 rounded text-center font-medium">
                <i class="bi bi-calendar3 text-xl block mb-1"></i> Batches
            </a>
            <a href="" class="bg-red-100 hover:bg-red-200 p-3 rounded text-center font-medium">
                <i class="bi bi-gear text-xl block mb-1"></i> Settings
            </a>
        </div>
    </div>
@endsection

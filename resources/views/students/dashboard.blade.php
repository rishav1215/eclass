@extends('landing.publiclayout')

@section('title')
    Student Dashboard
@endsection

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">

        <!-- Welcome Section with Profile -->
        <div class="flex flex-col md:flex-row gap-6">
            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white p-8 rounded-2xl shadow-xl flex-1">
                <div class="flex items-center space-x-4">
                    <div class="h-16 w-16 rounded-full bg-white/20 flex items-center justify-center">
                        <span class="text-2xl font-bold">{{ substr(Auth::user()->name ?? 'S', 0, 1) }}</span>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold">Welcome back, {{ Auth::user()->name ?? 'Student' }}!</h2>
                        <p class="text-indigo-100">Here's what's happening today</p>
                    </div>
                </div>
            </div>
            
            <!-- Date and Quick Stats -->
            <div class="bg-white rounded-2xl shadow-lg p-6 w-full md:w-64">
                <div class="text-center">
                    <p class="text-gray-500 text-sm">Today is</p>
                    <p class="text-2xl font-bold text-gray-800">{{ now()->format('l, F j') }}</p>
                    <div class="mt-4 space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Classes</span>
                            <span class="font-medium">2 today</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Assignments</span>
                            <span class="font-medium">1 due</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dashboard Summary Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Enrolled Courses -->
            <div class="bg-white rounded-2xl shadow-md hover:shadow-lg transition-all p-6 group border-l-4 border-blue-500">
                <div class="flex items-center mb-4">
                    <div class="bg-blue-100 p-3 rounded-lg mr-4 group-hover:bg-blue-200 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <div>
                        <h5 class="text-sm font-medium text-gray-500">Enrolled Courses</h5>
                        <p class="text-2xl font-bold text-gray-800">5 Active</p>
                    </div>
                </div>
                <a href="#" class="text-blue-600 text-sm font-medium flex items-center mt-2">
                    View all
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <!-- Progress Tracker -->
            <div class="bg-white rounded-2xl shadow-md hover:shadow-lg transition-all p-6 group border-l-4 border-green-500">
                <div class="flex items-center mb-4">
                    <div class="bg-green-100 p-3 rounded-lg mr-4 group-hover:bg-green-200 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <div>
                        <h5 class="text-sm font-medium text-gray-500">Overall Progress</h5>
                        <p class="text-2xl font-bold text-gray-800">72%</p>
                    </div>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-green-600 h-2 rounded-full" style="width: 72%"></div>
                </div>
            </div>

            <!-- Announcements -->
            <div class="bg-white rounded-2xl shadow-md hover:shadow-lg transition-all p-6 group border-l-4 border-red-500">
                <div class="flex items-center mb-4">
                    <div class="bg-red-100 p-3 rounded-lg mr-4 group-hover:bg-red-200 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </div>
                    <div>
                        <h5 class="text-sm font-medium text-gray-500">Announcements</h5>
                        <p class="text-2xl font-bold text-gray-800">3 New</p>
                    </div>
                </div>
                <a href="#" class="text-red-600 text-sm font-medium flex items-center mt-2">
                    View alerts
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <!-- Upcoming Deadlines -->
            <div class="bg-white rounded-2xl shadow-md hover:shadow-lg transition-all p-6 group border-l-4 border-yellow-500">
                <div class="flex items-center mb-4">
                    <div class="bg-yellow-100 p-3 rounded-lg mr-4 group-hover:bg-yellow-200 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h5 class="text-sm font-medium text-gray-500">Upcoming Deadlines</h5>
                        <p class="text-2xl font-bold text-gray-800">2 Tasks</p>
                    </div>
                </div>
                <a href="#" class="text-yellow-600 text-sm font-medium flex items-center mt-2">
                    View tasks
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Quick Access and Recent Activity -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Quick Access -->
            <div class="lg:col-span-1">
                <h4 class="text-xl font-semibold mb-4 text-gray-800">Quick Access</h4>
                <div class="grid grid-cols-2 gap-4">
                    <a href="#" class="bg-white hover:bg-gray-50 border border-gray-200 rounded-xl p-4 text-center transition-all shadow-sm hover:shadow-md">
                        <div class="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center mx-auto mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700">Timetable</span>
                    </a>
                    <a href="#" class="bg-white hover:bg-gray-50 border border-gray-200 rounded-xl p-4 text-center transition-all shadow-sm hover:shadow-md">
                        <div class="bg-purple-100 w-12 h-12 rounded-lg flex items-center justify-center mx-auto mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700">Materials</span>
                    </a>
                    <a href="#" class="bg-white hover:bg-gray-50 border border-gray-200 rounded-xl p-4 text-center transition-all shadow-sm hover:shadow-md">
                        <div class="bg-green-100 w-12 h-12 rounded-lg flex items-center justify-center mx-auto mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700">Ask Doubt</span>
                    </a>
                    <a href="#" class="bg-white hover:bg-gray-50 border border-gray-200 rounded-xl p-4 text-center transition-all shadow-sm hover:shadow-md">
                        <div class="bg-red-100 w-12 h-12 rounded-lg flex items-center justify-center mx-auto mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700">Attendance</span>
                    </a>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="lg:col-span-2 bg-white rounded-2xl shadow-md p-6">
                <div class="flex justify-between items-center mb-6">
                    <h4 class="text-xl font-semibold text-gray-800">Recent Activity</h4>
                    <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-800">View all</a>
                </div>
                <div class="space-y-4">
                    <div class="flex items-start pb-4 border-b border-gray-100">
                        <div class="bg-blue-100 p-2 rounded-lg mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">New material uploaded for Mathematics</p>
                            <p class="text-sm text-gray-500">Chapter 5: Algebra Basics</p>
                            <p class="text-xs text-gray-400 mt-1">2 hours ago</p>
                        </div>
                    </div>
                    <div class="flex items-start pb-4 border-b border-gray-100">
                        <div class="bg-green-100 p-2 rounded-lg mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">Assignment submitted successfully</p>
                            <p class="text-sm text-gray-500">History Essay - World War II</p>
                            <p class="text-xs text-gray-400 mt-1">Yesterday, 3:45 PM</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="bg-purple-100 p-2 rounded-lg mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">New comment on your question</p>
                            <p class="text-sm text-gray-500">"Can you explain this concept further?"</p>
                            <p class="text-xs text-gray-400 mt-1">2 days ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upcoming Classes -->
        <!-- <div class="bg-white rounded-2xl shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h4 class="text-xl font-semibold text-gray-800">Upcoming Classes</h4>
                <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-800">View timetable</a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subject</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Teacher</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Room</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">09:00 - 10:30</div>
                                <div class="text-sm text-gray-500">Today</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Mathematics</div>
                                <div class="text-sm text-gray-500">Algebra II</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Dr. Smith</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">B-204</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">11:00 - 12:30</div>
                                <div class="text-sm text-gray-500">Today</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Physics</div>
                                <div class="text-sm text-gray-500">Thermodynamics</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Prof. Johnson</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Lab-3</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">14:00 - 15:30</div>
                                <div class="text-sm text-gray-500">Tomorrow</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Literature</div>
                                <div class="text-sm text-gray-500">Modern Poetry</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Dr. Williams</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">A-105</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> -->
    </div>
@endsection
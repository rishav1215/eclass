@extends('admin.adminlayout')

@section('content')
<div class="container mx-auto px-4 py-8">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Manage Courses</h1>
        <a href="{{ route('Course.create') }}"
            class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-5 py-2 rounded shadow transition">
            + Create Course
        </a>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="mb-6 p-4 rounded bg-green-100 border border-green-300 text-green-700 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table -->
    <div class="overflow-x-auto bg-white rounded shadow-sm border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3 text-left">ID</th>
                    <th class="px-4 py-3 text-left">Image</th>
                    <th class="px-4 py-3 text-left">Title</th>
                    <th class="px-4 py-3 text-left">Author</th>
                    <th class="px-4 py-3 text-left">Fees</th>
                    <th class="px-4 py-3 text-left">Discount</th>
                    <th class="px-4 py-3 text-left">Duration (Weeks)</th>
                    <th class="px-4 py-3 text-left">Category</th>
                    <th class="px-4 py-3 text-left">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($courses as $course)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $course->id }}</td>
                        <td class="px-4 py-3">
                            @if ($course->image)
                                <img src="{{ asset('storage/' . $course->image) }}" width="80px" class="w-12 h-12 object-cover rounded" />
                            @else
                                <div class="w-12 h-12 bg-gray-200 rounded"></div>
                            @endif
                        </td>
                        <td class="px-4 py-3 font-medium">{{ $course->title }}</td>
                        <td class="px-4 py-3">{{ $course->author }}</td>
                        <td class="px-4 py-3">₹{{ $course->fees }}</td>
                        <td class="px-4 py-3 text-red-600">₹
                            {{ $course->descount_price ?? '-' }}
                        </td>
                        <td class="px-4 py-3"><spna>{{ $course->duration == 1 ? ' 1 week' : $course->duration . ' weeks ' }}</spna></td>
                        <td class="px-4 py-3">{{ $course->category->cat_title ?? 'Uncategorized' }}</td>
                        <td class="px-4 py-3">
                            <div class="flex space-x-2">
                                <a href="{{ route('Course.edit', $course->id) }}"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs transition">
                                    Edit
                                </a>
                                <form action="{{ route('Course.destroy', $course->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this course?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs transition">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center py-6 text-gray-500">No courses available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

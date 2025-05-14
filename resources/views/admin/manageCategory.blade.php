@extends('admin.adminlayout')

@section('title', 'Manage Category')

@section('content')

    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-700">Category</h2>
        <a href="{{ route('categories.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            <i class="bi bi-plus-circle mr-1"></i> Insert Category
        </a>

    </div>
    <hr>


    <!-- Admissions Table -->
    <div class="bg-white rounded shadow p-4 overflow-auto m-2">
        <table class="min-w-full text-sm text-gray-700">
            <thead>
                <tr class="text-left border-b border-gray-200">
                    <th class="py-2 px-3">id</th>
                    <th class="py-2 px-3">Name</th>
                    <th class="py-2 px-3">Description</th>

                    <th class="py-2 px-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($category as $cat)
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <td class="py-2 px-3">{{ $cat->id }}</td>
                        <td class="py-2 px-3">{{ $cat->cat_title }}</td>
                        <td class="py-2 px-3">{{ $cat->cat_description       }}</td>

                        <td class="py-2 px-3 flex space-x-3 items-center">
                            <!-- Approve Button -->
                            <a href="{{ route('categories.edit', $cat) }}"
                                class="flex items-center px-3 py-1.5 bg-green-100 text-green-700 text-sm font-medium rounded hover:bg-green-200 transition">
                                <i class="bi bi-pencil-fill mr-2"></i> Edit
                            </a>

                            <!-- Cancel Button -->
                            <form action="{{ route("categories.destroy", $cat) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('Delete this admission?')"
                                    class="flex items-center px-3 py-1.5 bg-red-100 text-red-700 text-sm font-medium rounded hover:bg-red-200 transition">
                                    <i class="bi bi-x-circle-fill mr-2"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-4 px-3 text-center text-gray-500">No admissions found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
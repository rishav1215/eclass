@extends('admin.adminlayout') {{-- You can wrap this in your admin layout --}}

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Add New Course</h1>
        <!-- Back Button -->
        <a href="{{ route('Course.index') }}" class="inline-block bg-gray-600 text-white text-sm px-5 py-2 rounded hover:bg-gray-700">
            &larr; Back to Courses
        </a>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('Course.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md space-y-4">
        @csrf
        <div>
            <label class="block text-sm">Course Title</label>
            <input type="text" name="title" class="w-full border border-gray-300 rounded p-2" value="{{ old('title') }}" required>
        </div>

        <div>
            <label class="block text-sm">Author</label>
            <input type="text" name="author" class="w-full border border-gray-300 rounded p-2" value="{{ old('author') }}" required>
        </div>

        <div>
            <label class="block text-sm">Fees</label>
            <input type="number" name="fees" class="w-full border border-gray-300 rounded p-2" value="{{ old('fees') }}" required>
        </div>

        <div>
            <label class="block text-sm">Discount</label>
            <input type="number" name="descount_price" class="w-full border border-gray-300 rounded p-2" value="{{ old('discount_price') }}">
        </div>

        <div>
            <label class="block text-sm">Duration (in weeks)</label>
            <input type="number" name="duration" class="w-full border border-gray-300 rounded p-2" value="{{ old('duration') }}" required>
        </div>

       <div>
    <label class="block text-sm">Category</label>
    <select name="category_id" class="w-full border border-gray-300 rounded p-2" required>
        <option value="">Select Category</option>
        @foreach($category as $cat)
            <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                {{ $cat->cat_title }}
            </option>
        @endforeach
    </select>
</div>

        <div>
            <label class="block text-sm">Description</label>
            <textarea name="description" rows="5" class="w-full border border-gray-300 rounded p-2" required>{{ old('description') }}</textarea>
        </div>

        <div>
            <label class="block text-sm">Course Image</label>
            <input type="file" name="image" class="w-full">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Add Course
        </button>
    </form>
</div>
@endsection

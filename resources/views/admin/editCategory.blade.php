@extends('admin.adminlayout')

@section('title', 'Edit Category')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded shadow">
    <h2 class="text-lg font-bold mb-4">Edit Category</h2>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="cat_title" class="block font-medium">Title</label>
            <input type="text" name="cat_title" id="cat_title" value="{{ old('cat_title', $category->cat_title) }}"
                class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="cat_description" class="block font-medium">Description</label>
            <textarea name="cat_description" id="cat_description"
                class="w-full border px-3 py-2 rounded">{{ old('cat_description', $category->cat_description) }}</textarea>
        </div>

        <button type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Update Category</button>
    </form>
</div>
@endsection

@extends('admin.adminlayout')

@section('title', 'Manage Students')

@section('content')
<div class="mb-6">
    <h2 class="text-xl font-semibold text-gray-700">Approved Students</h2>
</div>

<div class="bg-white rounded shadow p-4 overflow-auto m-2">
    <table class="min-w-full text-sm text-gray-700">
        <thead>
            <tr class="text-left border-b border-gray-200">
                <th class="py-2 px-3">ID</th>
                <th class="py-2 px-3">Name</th>
                <th class="py-2 px-3">Email</th>
                <th class="py-2 px-3">Contact</th>
                <th class="py-2 px-3">Education</th>
                <th class="py-2 px-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
                <tr class="border-b border-gray-100 hover:bg-gray-50">
                    <td class="py-2 px-3">{{ $student->id }}</td>
                    <td class="py-2 px-3">{{ $student->name }}</td>
                    <td class="py-2 px-3">{{ $student->email }}</td>
                    <td class="py-2 px-3">{{ $student->contact }}</td>
                    <td class="py-2 px-3">{{ $student->education }}</td>
                    <td class="py-2 px-3 flex space-x-3 items-center">
                        <!-- Edit Button -->
                        <a href="" 
                            class="flex items-center px-3 py-1.5 bg-yellow-100 text-yellow-700 text-sm font-medium rounded hover:bg-yellow-200 transition">
                            <i class="bi bi-pencil-fill mr-2"></i> Edit
                        </a>

                        <!-- Inapprove Button -->
                        <a href="{{ route('admin.inapproveAdmission', $student->id) }}"
                            onclick="return confirm('Set this student back to pending?')"
                            class="flex items-center px-3 py-1.5 bg-red-100 text-red-700 text-sm font-medium rounded hover:bg-red-200 transition">
                            <i class="bi bi-x-circle-fill mr-2"></i> Inapprove
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="py-4 px-3 text-center text-gray-500">No approved students found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

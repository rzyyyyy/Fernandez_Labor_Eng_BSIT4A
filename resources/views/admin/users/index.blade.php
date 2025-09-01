{{-- resources/views/admin/users/index.blade.php --}}
@extends('layouts.main')

@section('title','Manage Users')

@section('content')
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 border border-green-300 rounded text-green-800">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="mb-4 p-3 bg-red-100 border border-red-300 rounded text-red-800">{{ session('error') }}</div>
    @endif

    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold">Users</h2>
        <a href="{{ route('admin.users.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Add User</a>
    </div>

    <div class="bg-white p-4 shadow rounded-2xl overflow-x-auto">
        <table id="usersTable" class="display w-full">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $i => $user)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ implode(', ', $user->getRoleNames()->toArray()) ?: '-' }}</td>
                    <td class="space-x-2">
                        <a href="{{ route('admin.users.edit', $user) }}" class="px-3 py-1 bg-yellow-500 text-white rounded">Edit</a>

                        {{-- Delete button -- calls confirmDelete JS with destroy route --}}
                        <button class="px-3 py-1 bg-red-600 text-white rounded"
                                onclick="confirmDelete('{{ route('admin.users.destroy', $user) }}')">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{-- Hidden form used for deleting (we change .action with JS and submit) --}}
        <form id="deleteForm" method="POST" style="display:none;">
            @csrf
            @method('DELETE')
        </form>
    </div>
@endsection

@push('scripts')
<script>
    // Initialize DataTable (optional)
    document.addEventListener('DOMContentLoaded', function () {
        if (document.querySelector('#usersTable')) {
            new DataTable('#usersTable');
        }
    });

    // SweetAlert2 confirm function
    function confirmDelete(actionUrl) {
        Swal.fire({
            title: 'Delete this user?',
            text: "This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('deleteForm');
                form.action = actionUrl;
                form.submit();
            }
        });
    }
</script>
@endpush
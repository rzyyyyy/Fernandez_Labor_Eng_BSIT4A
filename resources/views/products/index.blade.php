@extends('layouts.main')
@section('title','Products')

@section('content')
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 border border-green-300 rounded">{{ session('success') }}</div>
    @endif

    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold">Products</h2>
        <a href="{{ route('products.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Add Product</a>
    </div>

    <div class="bg-white p-4 shadow rounded-2xl">
        <table id="productsTable" class="display">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>SKU</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($products as $i => $p)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $p->category->name ?? '-' }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->sku }}</td>
                    <td>{{ number_format($p->price,2) }}</td>
                    <td>{{ $p->stock }}</td>
                    <td class="space-x-2">
                        <a href="{{ route('products.edit',$p) }}" class="px-3 py-1 bg-yellow-500 text-white rounded">Edit</a>
                        <button class="px-3 py-1 bg-red-600 text-white rounded"
                                onclick="confirmDelete('{{ route('products.destroy',$p) }}')">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <form id="deleteForm" method="POST" style="display:none;">
            @csrf @method('DELETE')
        </form>
    </div>
@endsection

@push('scripts')
<script>
    new DataTable('#productsTable');

    function confirmDelete(action) {
        Swal.fire({
            title: 'Delete this product?',
            text: "This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete',
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('deleteForm');
                form.action = action;
                form.submit();
            }
        });
    }
</script>
@endpush
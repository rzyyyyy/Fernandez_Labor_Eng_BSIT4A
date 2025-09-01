@extends('layouts.main')
@section('title','Add Product')

@section('content')
    <form action="{{ route('products.store') }}" method="POST" class="bg-white p-6 shadow rounded-2xl max-w-3xl">
        @csrf
        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm mb-1">Category</label>
                <select name="category_id" class="w-full border rounded p-2">
                    <option value="">-- select --</option>
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}" {{ old('category_id')==$c->id?'selected':'' }}>{{ $c->name }}</option>
                    @endforeach
                </select>
                @error('category_id') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
            </div>
            <div>
                <label class="block text-sm mb-1">Name</label>
                <input name="name" value="{{ old('name') }}" class="w-full border rounded p-2">
                @error('name') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
            </div>
            <div>
                <label class="block text-sm mb-1">SKU</label>
                <input name="sku" value="{{ old('sku') }}" class="w-full border rounded p-2">
                @error('sku') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
            </div>
            <div>
                <label class="block text-sm mb-1">Price</label>
                <input type="number" step="0.01" name="price" value="{{ old('price',0) }}" class="w-full border rounded p-2">
                @error('price') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
            </div>
            <div>
                <label class="block text-sm mb-1">Stock</label>
                <input type="number" name="stock" value="{{ old('stock',0) }}" class="w-full border rounded p-2">
                @error('stock') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm mb-1">Description</label>
                <textarea name="description" rows="4" class="w-full border rounded p-2">{{ old('description') }}</textarea>
                @error('description') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
            </div>
        </div>
        <div class="mt-4 flex gap-2">
            <button class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
            <a href="{{ route('products.index') }}" class="px-4 py-2 bg-gray-200 rounded">Cancel</a>
        </div>
    </form>
@endsection
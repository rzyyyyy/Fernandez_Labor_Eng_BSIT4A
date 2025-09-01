<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-6">
            <div class="p-6 bg-white shadow rounded-2xl">
                <div class="text-sm opacity-70">Users</div>
                <div class="text-3xl font-bold">{{ $userCount }}</div>
            </div>
            <div class="p-6 bg-white shadow rounded-2xl">
                <div class="text-sm opacity-70">Products</div>
                <div class="text-3xl font-bold">{{ $productCount }}</div>
            </div>
            <div class="p-6 bg-white shadow rounded-2xl">
                <div class="text-sm opacity-70">Categories</div>
                <div class="text-3xl font-bold">{{ $categoryCount }}</div>
            </div>
        </div>
    </div>
</x-app-layout>

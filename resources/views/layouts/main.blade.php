{{-- DataTables v2 (vanilla JS) --}}
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>

{{-- SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@stack('scripts')

{{-- uses Breeze's app shell and adds a sidebar --}}
<x-app-layout>
    <div class="min-h-screen flex">
        <aside class="w-64 bg-white shadow hidden md:block">
            <div class="p-4 font-semibold">Starter Kit</div>
            <nav class="px-4 space-y-2">
                <a href="{{ route('dashboard') }}" class="block py-2">User Dashboard</a>
                @role('admin')
                    <a href="{{ route('admin.dashboard') }}" class="block py-2">Admin Dashboard</a>
                    <a href="{{ route('admin.users.index') }}" class="block py-2">Manage Users</a>
                @endrole
                <a href="{{ route('products.index') }}" class="block py-2">Products</a>
                <a href="{{ route('categories.index') }}" class="block py-2">Categories</a>
            </nav>
        </aside>

        <main class="flex-1">
            <header class="bg-white shadow p-4">
                <h1 class="text-xl font-semibold">@yield('title','Page')</h1>
            </header>

            <div class="p-6">
                @yield('content')
            </div>

            <footer class="p-4 text-center text-sm text-gray-500">
                © {{ date('Y') }} Starter Kit
            </footer>
        </main>
    </div>
</x-app-layout>
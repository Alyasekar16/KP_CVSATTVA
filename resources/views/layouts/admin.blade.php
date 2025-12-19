<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - CV SATTVA')</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <!-- CSS ADMIN -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body class="bg-[#F7F3EE]">

<div class="flex">

    <!-- SIDEBAR ADMIN -->
    <aside class="w-64 min-h-screen bg-white shadow-xl fixed left-0 top-0">
        <div class="px-6 py-6 border-b font-bold text-xl text-[#4A2E14]">
            ADMIN SATTVA
        </div>

        <nav class="mt-6 space-y-1 px-4">

    <a href="/admin" class="sidebar-link">Dashboard</a>

    <!-- DROPDOWN KONTEN WEBSITE -->
    <div x-data="{ open: false }">
        <button
            @click="open = !open"
            class="sidebar-link flex items-center justify-between w-full"
        >
            <span>Konten Website</span>
            <svg class="w-4 h-4 transition-transform"
                 :class="{ 'rotate-180': open }"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <!-- SUB MENU -->
        <div x-show="open" x-collapse class="ml-4 mt-1 space-y-1">
            <a href="/admin/tentang/perusahaan" class="sidebar-link text-sm">
                Perusahaan
            </a>
            <a href="/admin/tentang/karyawan" class="sidebar-link text-sm">
                Tim Kami
            </a>
            <a href="/admin/tentang/penghargaan" class="sidebar-link text-sm">
                Penghargaan
            </a>
        </div>
    </div>

    <a href="/admin/proyek" class="sidebar-link">Manajemen Proyek</a>

    <a href="/logout" class="sidebar-link text-red-600">Logout</a>
</nav>
    </aside>

    <!-- KONTEN -->
    <main class="ml-64 w-full p-8">
        @yield('content')
    </main>

</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- JS ADMIN -->
<script src="{{ asset('js/admin.js') }}"></script>

<!-- JS PER HALAMAN -->
@stack('scripts')

</body>
</html>

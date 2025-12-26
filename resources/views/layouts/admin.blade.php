<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - CV SATTVA')</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine JS (WAJIB untuk dropdown) -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <!-- CSS ADMIN -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body class="bg-[#F7F3EE]">

    <div class="flex">

        <!-- SIDEBAR -->
        <aside class="w-64 min-h-screen bg-white shadow-xl fixed left-0 top-0 flex flex-col">

            <!-- LOGO -->
            <div class="px-6 py-6 border-b font-bold text-xl text-[#4A2E14]">
                ADMIN SATTVA
            </div>

            <!-- MENU -->
            <nav class="mt-6 space-y-1 px-4 flex-1">

                <!-- BERANDA -->
                <a href="{{ route('admin.beranda') }}" class="sidebar-link">
                    Beranda
                </a>

                <!-- KONTEN WEBSITE -->
                <div x-data="{ open: false }">
                    <button
                        @click="open = !open"
                        class="sidebar-link flex items-center justify-between w-full">
                        <span>Konten Website</span>
                        <svg class="w-4 h-4 transition-transform"
                            :class="{ 'rotate-180': open }"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="open" x-collapse class="ml-4 mt-1 space-y-1">
                        <a href="{{ route('admin.tentang.perusahaan.index') }}" class="sidebar-link text-sm">
                            Perusahaan
                        </a>
                        <a href="{{ route('admin.tentang.karyawan.index') }}" class="sidebar-link text-sm">
                            Tim Kami
                        </a>
                        <a href="{{ route('admin.tentang.penghargaan.index') }}" class="sidebar-link text-sm">
                            Penghargaan
                        </a>
                    </div>
                </div>

                <!-- PROYEK -->
                <div x-data="{ open: false }">
                    <button
                        @click="open = !open"
                        class="sidebar-link flex items-center justify-between w-full">
                        <span>Proyek</span>
                        <svg class="w-4 h-4 transition-transform"
                            :class="{ 'rotate-180': open }"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="open" x-collapse class="ml-4 mt-1 space-y-1">
                        <a href="{{ route('proyek.index') }}" class="sidebar-link text-sm">
                            Manajemen Proyek
                        </a>
                        <a href="{{ route('komen.index') }}" class="sidebar-link text-sm">
                            Ulasan Proyek
                        </a>
                    </div>
                </div>

                <!-- KONTAK -->
                <a href="{{ route('kontak.index') }}" class="sidebar-link">
                    Manajemen Kontak
                </a>

                <!-- ORDER JASA -->
                <a href="{{ route('admin.order.index') }}" class="sidebar-link">
                    Order Jasa
                </a>

            </nav>

            <!-- USER INFO -->
            <div class="border-t p-4">
                <div class="text-sm text-gray-500 mb-2">
                    Login sebagai:
                </div>
                <div class="font-semibold text-[#4A2E14] mb-3">
                    {{ Auth::user()->name }}
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        type="submit"
                        class="w-full text-left text-red-600 hover:bg-red-50 px-3 py-2 rounded">
                        Logout
                    </button>
                </form>
            </div>

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
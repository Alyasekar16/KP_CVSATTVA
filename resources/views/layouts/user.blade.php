<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'CV SATTVA')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.2/cdn.min.js" defer></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');

    body {
      font-family: 'Inter', sans-serif;
      background-color: #F7F3EE;
    }

    .hero-bg {
      background-image: url('https://i.pinimg.com/1200x/83/0a/89/830a89b7b5e04d2f4b51b45ba7d71743.jpg');
      background-size: cover;
      background-position: center;
      position: relative;
    }

    .text-shadow-custom {
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    }
  </style>
</head>

<body class="antialiased">

  <!-- Navbar -->
  <header class="fixed top-0 left-0 right-0 z-50 bg-[#3C2922] bg-opacity-95 backdrop-blur-sm shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between">
      <a href="/" class="flex items-center gap-3">
        <img src="{{ asset('assets/img/cvsattvaicons.png') }}" alt="Logo CV Sattva" class="h-10 w-10 object-contain" />
        <span class="text-2xl font-extrabold text-[#F7F3EE] tracking-wider">CV SATTVA</span>
      </a>

      <nav class="hidden md:flex space-x-6 items-center" x-data="{ open: false }">

        <a href="{{ url('/') }}"
          class="text-[#F7F3EE] hover:text-white font-medium">BERANDA</a>

        <!-- Dropdown Tentang -->
        <div class="relative" x-data="{ open: false }">
          <button @click="open = !open"
            class="text-[#F7F3EE] hover:text-white font-medium flex items-center">
            TENTANG
            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
            </svg>
          </button>

          <!-- Dropdown Menu -->
          <div x-show="open" @click.away="open = false" x-transition
            class="absolute left-0 mt-2 w-40 bg-white rounded-lg shadow-lg">
            <a href="{{ url('/tentang/perusahaan') }}"
              class="block px-4 py-2 text-gray-700 hover:bg-[#F7F3EE]">Perusahaan</a>

            <a href="{{ url('/tentang/tim') }}"
              class="block px-4 py-2 text-gray-700 hover:bg-[#F7F3EE]">Tim Kami</a>

            <a href="{{ url('/tentang/penghargaan') }}"
              class="block px-4 py-2 text-gray-700 hover:bg-[#F7F3EE]">Penghargaan</a>
          </div>
        </div>

        <a href="#proyek"
          class="text-[#F7F3EE] hover:text-white font-medium">PROYEK</a>

        <a href="#kontak"
          class="text-[#F7F3EE] hover:text-white font-medium">KONTAK</a>

      </nav>
    </div>
  </header>

  <!-- Konten halaman -->
  <div class="w-full mt-10">
    @yield('content')
  </div>

  <!-- Footer -->
  <footer id="kontak" class="bg-[#3C2922] text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
        <div>
          <h3 class="text-3xl font-extrabold text-[#C8A165] mb-4">CV SATTVA</h3>
          <p class="text-gray-300 text-sm">Mewujudkan desain arsitektur yang memadukan keindahan, fungsi, dan makna.</p>
        </div>

        <div>
          <h4 class="text-xl font-semibold mb-4 border-b border-[#C8A165] pb-2">Hubungi Kami</h4>
          <p class="text-gray-300 mb-2"><b>No Telpon:</b> 0844444444</p>
          <p class="text-gray-300 mb-2"><b>Email:</b> scvattva@gmail.com</p>
          <p class="text-gray-300 mb-2"><b>Alamat:</b> Sukabumi, Jawa Barat</p>
        </div>

        <div>
          <h4 class="text-xl font-semibold mb-4 border-b border-[#C8A165] pb-2">Navigasi</h4>
          <ul class="space-y-2">

            <li><a href="{{ url('/') }}" class="text-gray-300 hover:text-[#C8A165]">Beranda</a></li>
            <li><a href="#tentang" class="text-gray-300 hover:text-[#C8A165]">Tentang</a></li>

            <li><a href="#proyek" class="text-gray-300 hover:text-[#C8A165]">Proyek</a></li>
            <li><a href="#ulasan" class="text-gray-300 hover:text-[#C8A165]">Ulasan</a></li>
            <li><a href="{{ url('/kontak') }}" class="text-gray-300 hover:text-[#C8A165]">Kontak</a></li>
          </ul>
        </div>

        <div>
          <h4 class="text-xl font-semibold mb-4 border-b border-[#C8A165] pb-2">Kirim Pesan</h4>
          <form class="space-y-4">
            <input type="text" placeholder="Nama Lengkap"
              class="w-full p-3 rounded-lg bg-[#3B2412] border border-[#5C3921] text-white">
            <input type="email" placeholder="Email Anda"
              class="w-full p-3 rounded-lg bg-[#3B2412] border border-[#5C3921] text-white">
            <textarea placeholder="Pesan Anda" rows="3"
              class="w-full p-3 rounded-lg bg-[#3B2412] border border-[#5C3921] text-white"></textarea>
            <button type="submit"
              class="w-full p-3 bg-[#C8A165] text-[#4A2E14] rounded-lg font-semibold hover:bg-[#D9B27F] transition duration-300">Kirim</button>
          </form>
        </div>
      </div>

      <div class="mt-12 pt-8 border-t border-[#5C3921] text-center">
        <p class="text-sm text-gray-400">
          &copy; 2025 CV Sattva. Developed by safalya | VAT: USA002323065806
        </p>
      </div>
    </div>
  </footer>

</body>

</html>
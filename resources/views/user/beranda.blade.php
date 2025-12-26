@extends('layouts.user')

@section('title', 'Beranda')

@section('content')

<!-- Hero Section -->
<section class="hero-bg relative w-full h-screen flex items-center justify-center">
  <div class="absolute inset-0 bg-black opacity-40"></div>
  <div class="relative w-full max-w-4xl px-4 text-center bg-black bg-opacity-20 rounded-xl shadow-2xl backdrop-blur-sm">
    <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-4 leading-tight text-shadow-custom">
      INOVATION DESIGN <br><span class="text-[#C8A165]">IN SUKABUMI</span>
    </h1>
    <p class="text-lg md:text-xl text-gray-200 mb-8 font-light text-shadow-custom">
      "At SATTVA, we believe architecture is not just about structures—it's about storytelling."
    </p>
  </div>
</section>

<!-- About Section -->
<section id="about" class="py-16 md:py-24 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12">
      <h2 class="text-sm font-semibold text-[#A67844] uppercase tracking-wider">TENTANG SATTVA</h2>
      <p class="mt-2 text-4xl font-extrabold text-gray-900 sm:text-5xl">
        Merangkai Kisah Melalui Arsitektur
      </p>
    </div>
    <div class="max-w-3xl mx-auto text-center space-y-6">
      <p class="text-gray-700 text-lg">
        <b>CV SATTVA Architecture</b> adalah firma arsitektur yang menciptakan garis bersih, ruang inovatif, dan desain abadi. Kami percaya setiap struktur adalah bentuk seni bercerita.
      </p>
      <p class="text-gray-700 text-lg">
        Dengan pengalaman lebih dari satu dekade, kami siap mengubah ide Anda menjadi kenyataan yang berkarakter.
      </p>
    </div>

    <!-- Stats -->
    <div class="mt-20 grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
      <div class="bg-[#F7F3EE] p-6 rounded-xl shadow-lg hover:shadow-2xl transition duration-500">
        <p class="text-5xl font-extrabold text-[#6B4423]">10+</p>
        <p class="mt-2 text-lg text-gray-700">Tahun Pengalaman</p>
      </div>
      <div class="bg-[#F7F3EE] p-6 rounded-xl shadow-lg hover:shadow-2xl transition duration-500">
        <p class="text-5xl font-extrabold text-[#6B4423]">50+</p>
        <p class="mt-2 text-lg text-gray-700">Proyek Terselesaikan</p>
      </div>
      <div class="bg-[#F7F3EE] p-6 rounded-xl shadow-lg hover:shadow-2xl transition duration-500">
        <p class="text-5xl font-extrabold text-[#6B4423]">98%</p>
        <p class="mt-2 text-lg text-gray-700">Kepuasan Klien</p>
      </div>
    </div>
  </div>
</section>

<!-- Proyek Section -->
<section id="proyek" class="py-16 md:py-24 bg-[#EFE9E4]">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12">
      <h2 class="text-sm font-semibold text-[#A67844] uppercase tracking-wider">POYEK KAMI</h2>
      <p class="mt-2 text-4xl font-extrabold text-gray-900 sm:text-5xl">Karya Pilihan Kami</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <div class="bg-white rounded-xl overflow-hidden shadow-2xl hover:shadow-[#C8A165]/50 transition duration-500 transform hover:-translate-y-1">
        <img src="https://i.pinimg.com/1200x/c1/27/b0/c127b0832add1ce44f7bed31033f9909.jpg" class="w-full h-56 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-bold text-gray-900 mb-2">Tropis Modern Style</h3>
          <p class="text-sm text-gray-600">Kombinasi elegan antara elemen tropis dan sentuhan modern.</p>
        </div>
      </div>

      <div class="bg-white rounded-xl overflow-hidden shadow-2xl hover:shadow-[#C8A165]/50 transition duration-500 transform hover:-translate-y-1">
        <img src="https://i.pinimg.com/736x/a3/89/af/a389afbda149175863e49bdd8d5a989e.jpg" class="w-full h-56 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-bold text-gray-900 mb-2">Modern Cafe Style</h3>
          <p class="text-sm text-gray-600">Desain interior hangat dan minimalis untuk bisnis F&B.</p>
        </div>
      </div>

      <div class="bg-white rounded-xl overflow-hidden shadow-2xl hover:shadow-[#C8A165]/50 transition duration-500 transform hover:-translate-y-1">
        <img src="https://i.pinimg.com/1200x/1c/75/02/1c750295a426a07e76cae1a3dc1e828c.jpg" class="w-full h-56 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-bold text-gray-900 mb-2">Design Taman</h3>
          <p class="text-sm text-gray-600">Proyek Design Taman Untuk Berpacaran.</p>
        </div>
      </div>
    </div>

    <div class="text-center mt-12">
      <a href="{{ url('/proyek') }}"
        class="inline-flex items-center px-6 py-3 rounded-full text-white bg-[#6B4423] hover:bg-[#8C5B3A] transition duration-300 shadow-lg font-semibold">
        Lihat Semua Proyek
        <svg class="ml-2 -mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
        </svg>
      </a>
    </div>
  </div>
</section>

<!-- What People Say Section -->
<section id="ulasan" class="py-16 md:py-24 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
    <h2 class="text-sm font-semibold text-[#A67844] uppercase tracking-wider mb-2">Apa yang Dikatakan Mereka?</h2>
    <p class="text-4xl font-extrabold text-gray-900 mb-12">Cerita Pengalaman Klien Kami</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Testimonial 1 -->
      <div class="bg-[#F7F3EE] p-6 rounded-2xl shadow-lg hover:shadow-xl transition duration-300">
        <div class="flex items-center mb-4">
          <img src="https://i.pinimg.com/736x/dc/2e/3d/dc2e3d79cf5397d9bd7ab6c5932ae7a9.jpg" 
               alt="Client 1" 
               class="w-12 h-12 rounded-full object-cover mr-3">
          <div class="text-left">
            <p class="font-semibold text-gray-900">Rahman Nurdin</p>
            <p class="text-sm text-gray-500">Klien Rumah Tropis</p>
          </div>
        </div>
        <p class="text-gray-700 italic text-left">
          "Woww gak nyangka desainnya beneran diluar angkasa!"
        </p>
      </div>

      <!-- Testimonial 2 -->
      <div class="bg-[#F7F3EE] p-6 rounded-2xl shadow-lg hover:shadow-xl transition duration-300">
        <div class="flex items-center mb-4">
          <img src="https://i.pinimg.com/736x/38/e1/e7/38e1e7671c6db8842ce55c44a1e8c3a0.jpg" 
               alt="Client 2" 
               class="w-12 h-12 rounded-full object-cover mr-3">
          <div class="text-left">
            <p class="font-semibold text-gray-900">Windah Basuri </p>
            <p class="text-sm text-gray-500">Klien Desain Kafe</p>
          </div>
        </div>
        <p class="text-gray-700 italic text-left">
          "Keren sih gaya dan desainnya beneran diluar angkasa!"
        </p>
      </div>

      <!-- Testimonial 3 -->
      <div class="bg-[#F7F3EE] p-6 rounded-2xl shadow-lg hover:shadow-xl transition duration-300">
        <div class="flex items-center mb-4">
          <img src="https://i.pinimg.com/736x/7e/3e/7e/7e3e7e14d0435e7b596bfd9c4eaac167.jpg" 
               alt="Client 3" 
               class="w-12 h-12 rounded-full object-cover mr-3">
          <div class="text-left">
            <p class="font-semibold text-gray-900">Song Kang</p>
            <p class="text-sm text-gray-500">Klien Villa Modern</p>
          </div>
        </div>
        <p class="text-gray-700 italic text-left">
          "Jujur keren sih desain sama konstruksinya, paling nyaman deh kerenin skill..."
        </p>
      </div>
    </div>

    <div class="text-center mt-12">
      <a href="{{ url('/ulasan') }}"
        class="inline-flex items-center px-6 py-3 rounded-full text-white bg-[#6B4423] hover:bg-[#8C5B3A] transition duration-300 shadow-lg font-semibold">
        Lihat Semua Ulasan 
        <svg class="ml-2 -mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
        </svg>
      </a>
    </div>
  </div>
</section>

<!-- Current News Section -->
<section id="news" class="py-16 md:py-24 bg-[#EFE9E4]">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
    <p class="text-4xl font-extrabold text-gray-900 mb-12">Current News</p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <!-- News 1 -->
      <div class="bg-white rounded-xl overflow-hidden shadow-2xl hover:shadow-[#C8A165]/50 transition duration-500 transform hover:-translate-y-1">
        <img src="https://i.pinimg.com/1200x/c1/27/b0/c127b0832add1ce44f7bed31033f9909.jpg" class="w-full h-64 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-bold text-gray-900 mb-2">Tropis Modern Style</h3>
          <p class="text-gray-600 text-sm">Karya rumah tropis modern dengan sentuhan natural dan estetika bersih.</p>
        </div>
      </div>

      <!-- News 2 -->
      <div class="bg-white rounded-xl overflow-hidden shadow-2xl hover:shadow-[#C8A165]/50 transition duration-500 transform hover:-translate-y-1">
        <img src="https://i.pinimg.com/736x/a3/89/af/a389afbda149175863e49bdd8d5a989e.jpg" class="w-full h-64 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-bold text-gray-900 mb-2">Modern Cafe Style</h3>
          <p class="text-gray-600 text-sm">Inspirasi desain kafe hangat dengan konsep modern minimalis di Sukabumi.</p>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection

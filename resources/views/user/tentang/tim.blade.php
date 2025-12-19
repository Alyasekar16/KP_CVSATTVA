@extends('layouts.user')

@section('title', 'Tim Kami')

@section('content')

{{-- SECTION: HERO --}}
<section class="py-16 bg-white">
  <div class="max-w-3xl mx-auto text-center">
    <h1 class="text-4xl font-bold mb-4">Meet Our <span class="text-yellow-600">Team</span></h1>
    <p class="text-gray-600">
      Tim profesional yang berpengalaman, kreatif, dan berdedikasi untuk memberikan hasil terbaik.
    </p>
  </div>
</section>

{{-- SECTION: CEO --}}
<section class="py-10">
  <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

    {{-- FOTO CEO --}}
    <div class="bg-blue-50 p-6 rounded-xl flex justify-center">
      <img src="{{ asset($ceo->foto) }}" alt="CEO" class="rounded-lg w-72 object-cover">
    </div>

    {{-- DATA CEO --}}
    <div>
      <p class="inline-block px-4 py-1 bg-gray-100 rounded-full mb-3">{{ $ceo->jabatan }}</p>
      <h2 class="text-3xl font-semibold mb-3">{{ $ceo->nama }}</h2>
      <p class="text-gray-600 mb-6">
        {{ $ceo->deskripsi }}
         <h3 class="text-xl font-semibold mb-3">Pengalaman</h3>
      <ul class="space-y-2 text-gray-700">
        <li>✔️ Lebih dari 15 tahun di industri teknologi</li>
        <li>✔️ Pernah memimpin perusahaan besar sebagai manajer</li>
        <li>✔️ Memegang paten inovasi teknologi</li>
      </ul>
      </p>
    </div>

    {{-- EXPERIENCE (tetap statis) --}}
    <div>
     
    </div>

  </div>
</section>

{{-- SECTION: BOARD OF DIRECTORS --}}
<section class="py-16 bg-gray-50">
  <div class="max-w-3xl mx-auto text-center mb-12">
    <h2 class="text-3xl font-bold">
      Board of <span class="text-yellow-600">Directors</span>
    </h2>
    <p class="text-gray-600 mt-3">
      Tim eksekutif yang memimpin visi perusahaan untuk masa depan.
    </p>
  </div>

  {{-- GRID KARYAWAN --}}
  <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

    @foreach ($karyawan as $orang)
      <div class="bg-white rounded-xl shadow-md overflow-hidden">
        
        <div class="bg-blue-50 p-5 flex justify-center">
          <img src="{{ asset($orang->foto) }}" class="w-40 h-40 object-cover rounded-lg">
        </div>

        <div class="p-5">
          <p class="text-sm bg-gray-100 inline-block px-3 py-1 rounded-full mb-2">
            {{ $orang->tim }}
          </p>
          <h3 class="text-xl font-semibold">{{ $orang->nama }}</h3>
          <p class="text-gray-600 text-sm mt-2">{{ $orang->deskripsi }}</p>
        </div>

      </div>
    @endforeach

  </div>
</section>


@endsection

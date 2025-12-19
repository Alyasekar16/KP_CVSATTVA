@extends('layouts.user')

@section('title', 'Penghargaan Perusahaan')

@section('content')

<section class="py-16 bg-F7F3EE relative overflow-hidden">

  <div class="max-w-4xl mx-auto text-center mb-16">
    <h1 class="text-4xl font-bold mb-4">Penghargaan yang Didapatkan</h1>
    <p class="text-lg text-gray-700">
      Beberapa penghargaan yang telah kami raih selama perjalanan perusahaan.
    </p>
  </div>

  <!-- Garis melengkung -->
  <div class="absolute inset-0 flex justify-center pointer-events-none">
    <svg width="400" height="1200" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path 
        d="M200 0 
          C200 180 60 260 60 420 
          C60 580 340 660 340 820
          C340 980 120 1060 120 1180"
        stroke="#d1d5db"
        stroke-dasharray="6 6"
        stroke-width="2"
      />
    </svg>
  </div>

  <!-- Timeline Cards -->
  <div class="max-w-5xl mx-auto grid grid-cols-1 gap-14">

    @foreach ($penghargaan as $index => $item)

      {{-- KIRI / KANAN BERGANTIAN --}}
      <div class="flex {{ $index % 2 == 0 ? 'justify-start' : 'justify-end' }}">
        
        <div class="bg-white shadow-lg rounded-xl p-6 w-72 
            {{ $index % 2 == 0 ? 'rotate-[-5deg]' : 'rotate-[5deg]' }} relative">

          <div class="absolute top-3 left-1/2 -translate-x-1/2 w-4 h-4 bg-gray-800 rounded-full"></div>

          <p class="text-sm text-gray-400 mb-2">{{ $item->tahun }}</p>
          <h3 class="text-xl font-bold">{{ $item->nama }}</h3>
          <p class="text-gray-600 mt-2 text-sm">
            {{ $item->deskripsi }}
          </p>

        </div>

      </div>

    @endforeach

  </div>

</section>

<div class="text-center mt-10 text-gray-600 italic">
  Siap meraih lebih banyak penghargaan di masa depan.
</div>


@endsection
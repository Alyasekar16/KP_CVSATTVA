@extends('layouts.user')

@section('title', 'Tentang Perusahaan')

@section('content')

{{-- Hero --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-5xl mx-auto text-center">
        <h1 class="text-4xl font-bold text-gray-800 mb-5">Tentang Perusahaan</h1>
        <p class="text-gray-600 text-lg">
            {{ $data ->visimisi }}
        </p>
    </div>
</section>


{{-- Section Sejarah --}}
<section class="py-20">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

        <div>
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Sejarah Perusahaan</h2>
            <p class="text-gray-600 leading-relaxed"> {{ $data ->sejarah }}</p>

        </div>

        <div class="flex justify-center">
            <img src="{{ asset($data->foto) }}" class="rounded-2xl shadow-xl w-11/12">
        </div>

    </div>
</section>


{{-- Section Makna Logo --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div>
            <img src=<img src="{{ asset($data->foto) }}" style="width:100px">
        </div>

        <div>
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Makna Nama & Logo</h2>

            <p class="text-gray-600 leading-relaxed mb-4">
                Nama <strong>SATTVA</strong> {{ $data->maknalogo }}
            </p>
        </div>

    </div>
</section>





@endsection
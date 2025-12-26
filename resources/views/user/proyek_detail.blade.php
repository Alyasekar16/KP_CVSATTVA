@extends('layouts.user')

@section('title', $proyek->namaproyek)

@section('content')

<section class="py-16">
    <div class="max-w-5xl mx-auto px-6">

        {{-- GAMBAR --}}
        <img
            src="{{ asset('storage/'.$proyek->gambarproyek) }}"
            class="w-full h-80 object-cover rounded-lg mb-8">

        {{-- JUDUL --}}
        <h1 class="text-4xl font-bold mb-4">
            {{ $proyek->namaproyek }}
        </h1>

        <p class="text-gray-600 mb-2">
            📍 {{ $proyek->lokasi }}
        </p>

        <p class="text-sm text-gray-500 mb-6">
            Status: {{ $proyek->status }}
        </p>

        {{-- DESKRIPSI --}}
        <div class="prose mb-12">
            {{ $proyek->deskripsi }}
        </div>

        {{-- ================= KOMENTAR USER ================= --}}
        <h2 class="text-2xl font-bold mb-6">Ulasan Pengguna</h2>

        <div class="space-y-4 mb-10">
            @forelse ($proyek->komen as $item)
            <div class="border rounded-lg p-4 bg-white shadow-sm">

                {{-- HEADER --}}
                <div class="flex justify-between items-center mb-2">
                    <div>
                        <p class="font-semibold">{{ $item->nama }}</p>
                        <p class="text-xs text-gray-500">
                            {{ $item->created_at->format('d M Y') }}
                        </p>
                    </div>

                    {{-- RATING --}}
                    @if($item->ratingkomen)
                    <div class="text-yellow-500 text-sm">
                        ⭐ {{ $item->ratingkomen }}/5
                    </div>
                    @endif
                </div>

                {{-- ISI KOMENTAR --}}
                <p class="text-gray-700">
                    “{{ $item->isi }}”
                </p>

                {{-- BALASAN ADMIN --}}
                @if($item->balasan)
                <div class="mt-4 bg-gray-100 p-3 rounded">
                    <p class="text-sm font-semibold">Balasan Admin</p>
                    <p class="text-sm text-gray-700">
                        {{ $item->balasan->balasan }}
                    </p>
                </div>
                @endif

            </div>
            @empty
            <p class="text-gray-500">Belum ada ulasan.</p>
            @endforelse
        </div>

        {{-- ================= FORM KOMENTAR ================= --}}
        <h3 class="text-xl font-bold mb-4">Tulis Ulasan</h3>

        <form action="{{ route('komen.store') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="proyek_id" value="{{ $proyek->proyek_id }}">

            <input type="text" name="nama" required
                placeholder="Nama"
                class="w-full border p-2 rounded">

            <input type="email" name="email" required
                placeholder="Email"
                class="w-full border p-2 rounded">

            <select name="rating" class="w-full border p-2 rounded">
                <option value="">Pilih Rating</option>
                @for ($i = 5; $i >= 1; $i--)
                <option value="{{ $i }}">{{ $i }} ⭐</option>
                @endfor
            </select>

            <textarea name="isi" rows="4" required
                placeholder="Tulis ulasan kamu..."
                class="w-full border p-2 rounded"></textarea>

            <button class="bg-black text-white px-6 py-2 rounded">
                Kirim Ulasan
            </button>
        </form>

    </div>
</section>

@endsection
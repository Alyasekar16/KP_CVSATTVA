@extends('layouts.admin')

@section('title', 'Daftar Komen')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h2 class="text-2xl font-bold">Daftar Komen</h2>
</div>

@if($komen->isEmpty())
<div class="bg-white rounded shadow p-6 text-center text-gray-500">
    Belum ada komentar
</div>
@else

@foreach ($komen as $item)
<div class="bg-white border rounded shadow p-4 mb-4">

    {{-- HEADER --}}
    <div class="flex justify-between items-center">
        <div>
            <strong>{{ $item->nama }}</strong>
            <span class="text-sm text-gray-500">
                ({{ $item->email }})
            </span>
        </div>

        <div class="text-yellow-500 font-semibold">
            ⭐ {{ $item->ratingkomen }}/5
        </div>
    </div>

    {{-- KOMENTAR USER --}}
    <div class="mt-3 text-gray-700">
        "{{ $item->komen }}"
    </div>

    <div class="text-sm text-gray-400 mt-1">
        {{ $item->created_at->format('d M Y') }}
    </div>

    {{-- BALASAN ADMIN --}}
    @if ($item->balasan)
    <div class="mt-4 p-3 bg-gray-100 rounded">
        <strong class="block mb-1">Balasan Admin:</strong>
        <p>{{ $item->balasan->balasan }}</p>

        {{-- AKSI BALASAN --}}
        <div class="mt-2 flex gap-4 text-sm">
            <a href="{{ route('balasan.edit', $item->balasan->id) }}"
                class="text-blue-600 hover:underline">
                Edit Balasan
            </a>

            <form action="{{ route('balasan.destroy', $item->balasan->id) }}"
                method="POST">
                @csrf
                @method('DELETE')
                <button class="text-red-600 hover:underline"
                    onclick="return confirm('Hapus balasan admin?')">
                    Hapus Balasan
                </button>
            </form>
        </div>
    </div>
    @else
    <div class="mt-4 text-sm text-red-500">
        Belum ada balasan
    </div>

    <a href="{{ route('komen.balas', $item->id) }}"
        class="inline-block mt-2 text-blue-600 hover:underline">
        Balas Komentar
    </a>
    @endif

    {{-- AKSI KOMENTAR USER --}}
    <div class="mt-4 border-t pt-3 flex gap-4 text-sm">
        <form action="{{ route('komen.destroy', $item->id) }}"
            method="POST">
            @csrf
            @method('DELETE')
            <button class="text-red-600 hover:underline"
                onclick="return confirm('Hapus komentar user ini?')">
                Hapus Komentar
            </button>
        </form>
    </div>

</div>
@endforeach

@endif

@endsection
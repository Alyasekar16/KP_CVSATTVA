@extends('layouts.admin')

@section('title', 'Daftar Komen Pengguna')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h2 class="text-2xl font-bold">Daftar Komen Pengguna</h2>
</div>

{{-- Flash message --}}
@if (session('success'))
<div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
    {{ session('success') }}
</div>
@endif

@forelse ($komen as $item)
<div class="border rounded p-4 mb-4 bg-white shadow-sm">

    <strong class="text-lg">{{ $item->nama }}</strong>
    <p class="text-sm text-gray-500">{{ $item->email }}</p>
    <p class="text-sm text-gray-500">{{ $item->created_at->format('d M Y')}}</p>

    <p class="mt-2 italic">"{{ $item->isi }}"</p>

    {{-- BALASAN ADMIN --}}
    @if ($item->balasan)
    <div class="mt-3 bg-gray-100 p-3 rounded">
        <strong>Balasan Admin:</strong>
        <p>{{ $item->balasan->balasan }}</p>
    </div>
    @else
    <p class="mt-3 text-sm text-red-500">
        Belum ada balasan dari admin
    </p>
    @endif

    <div class="mt-4 flex gap-4 text-sm">
        <a href="{{ route('komen.balas', $item->komen_id) }}"
            class="text-blue-600 hover:underline">
            {{ $item->balasan ? 'Edit Balasan' : 'Balas' }}
        </a>

        <form action="{{ route('komen.destroy', $item->komen_id) }}"
            method="POST"
            onsubmit="return confirm('Yakin ingin menghapus komentar ini?')">
            @csrf
            @method('DELETE')

            <button type="submit"
                class="text-red-600 hover:underline">
                Hapus
            </button>
        </form>
    </div>

</div>
@empty
<div class="text-center text-gray-500">
    Belum ada komentar
</div>
@endforelse

@endsection
@extends('layouts.admin')

@section('title', 'Balas Komentar')

@section('content')

<div class="mb-6">
    <h2 class="text-2xl font-bold">Balas Komentar</h2>
</div>

<div class="bg-white p-6 rounded shadow">

    <strong>{{ $komen->nama }}</strong>
    <p class="text-sm text-gray-500">{{ $komen->email }}</p>

    <p class="mt-3 italic">"{{ $komen->isi }}"</p>

    <form action="{{ route('komen.storeBalasan', $komen->komen_id) }}"
        method="POST"
        class="mt-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium mb-1">Nama Admin</label>
            <input type="text"
                name="nama"
                class="w-full border rounded p-2"
                value="{{ old('nama', $komen_admin->nama ?? auth()->user()->name) }}"
                required>
        </div>

        <div class="mt-4">
            <label class="block font-medium mb-1">Balasan</label>
            <textarea name="balasan"
                rows="4"
                class="w-full border rounded p-2"
                required>{{ old('balasan', $komen_admin->balasan ?? '') }}</textarea>
        </div>

        <div class="mt-6 flex gap-4">
            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded">
                Simpan Balasan
            </button>

            <a href="{{ route('komen.index') }}"
                class="px-4 py-2 bg-gray-400 text-white rounded">
                Kembali
            </a>
        </div>

    </form>
</div>

@endsection
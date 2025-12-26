@extends('layouts.admin')

@section('title', 'Tambah penghargaan')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-semibold">Tambah penghargaan Baru</h2>
    <a href="{{ route('admin.tentang.penghargaan.index') }}" class="px-3 py-2 bg-gray-600 text-white rounded text-sm">
        ← Kembali
    </a>
</div>

<form action="{{ route('admin.tentang.penghargaan.store') }}"
    method="POST"
    enctype="multipart/form-data"
    class="bg-white p-6 rounded shadow-md space-y-4">
    @csrf

    {{-- Nama Penghargaan --}}
    <div>
        <label class="block font-medium mb-1">Nama Penghargaan</label>
        <input type="text"
            name="nama"
            value="{{ old('nama') }}"
            class="w-full border rounded px-3 py-2" required>
    </div>

    {{-- Tahun --}}
    <div>
        <label class="block font-medium mb-1">Tahun</label>
        <input type="text"
            name="tahun"
            value="{{ old('tahun') }}"
            class="w-full border rounded px-3 py-2" required>
    </div>

    {{-- Deskripsi --}}
    <div>
        <label class="block font-medium mb-1">Deskripsi</label>
        <input type="text"
            name="deskripsi"
            value="{{ old('deskripsi') }}"
            class="w-full border rounded px-3 py-2" required>
    </div>

    {{-- Gambar --}}
    <div>
        <label class="block font-medium mb-1">Gambar </label>
        <input type="file"
            name="foto"
            class="w-full border rounded px-3 py-2">
    </div>

    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
        Simpan
    </button>
</form>
@endsection
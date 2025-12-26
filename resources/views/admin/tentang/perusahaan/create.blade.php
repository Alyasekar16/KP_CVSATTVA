@extends('layouts.admin')

@section('title', 'Tambah Perusahaan')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-semibold">Tambah Perusahaan Baru</h2>
    <a href="{{ route('admin.tentang.perusahaan.index') }}" class="px-3 py-2 bg-gray-600 text-white rounded text-sm">
        ← Kembali
    </a>
</div>

<form action="{{ route('admin.tentang.perusahaan.store') }}" method="POST" enctype="multipart/form-data"
    class="bg-white p-6 rounded shadow-md space-y-4">
    @csrf

    {{-- Visi & Misi --}}
    <div>
        <label class="block font-medium mb-1">Visi Misi</label>
        <input type="text"
            name="visimisi"
            value="{{ old('visimisi') }}"
            class="w-full border rounded px-3 py-2" required>
    </div>

    {{-- Sejarah --}}
    <div>
        <label class="block font-medium mb-1">Sejarah</label>
        <input type="text"
            name="sejarah"
            value="{{ old('sejarah') }}"
            class="w-full border rounded px-3 py-2" required>
    </div>

    {{-- Makna Logo --}}
    <div>
        <label class="block font-medium mb-1">Makna Logo</label>
        <input type="text"
            name="maknalogo"
            value="{{ old('maknalogo') }}"
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
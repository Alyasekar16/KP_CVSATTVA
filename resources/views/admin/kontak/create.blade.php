@extends('layouts.admin')

@section('title', 'Tambah Kontak')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-semibold">Tambah Kontak Baru</h2>
    <a href="{{ route('kontak.index') }}"
        class="px-3 py-2 bg-gray-600 text-white rounded text-sm">
        ← Kembali
    </a>
</div>

<form action="{{ route('kontak.store') }}"
    method="POST"
    enctype="multipart/form-data"
    class="bg-white p-6 rounded shadow-md space-y-4">
    @csrf

    <div>
        <label class="block font-medium mb-1">Kantor</label>
        <input type="text"
            name="kantor"
            value="{{ old('kantor') }}"
            class="w-full border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block font-medium mb-1">Email</label>
        <input type="email"
            name="email"
            value="{{ old('email') }}"
            class="w-full border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block font-medium mb-1">No Telepon</label>
        <input type="text"
            name="notelepon"
            value="{{ old('notelepon') }}"
            class="w-full border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block font-medium mb-1">Gambar QR</label>
        <input type="file"
            name="foto"
            class="w-full border rounded px-3 py-2">
    </div>

    <button type="submit"
        class="px-4 py-2 bg-blue-600 text-white rounded">
        Simpan
    </button>
</form>

@endsection
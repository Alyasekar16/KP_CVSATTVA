@extends('layouts.admin')

@section('title', 'Tambah Karyawan')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-semibold">Tambah Karyawan Baru</h2>
    <a href="{{ route('admin.tentang.karyawan.index') }}" class="px-3 py-2 bg-gray-600 text-white rounded text-sm">
        ← Kembali
    </a>
</div>

<form action="{{ route('admin.tentang.karyawan.store') }}"
    method="POST"
    enctype="multipart/form-data"
    class="bg-white p-6 rounded shadow-md space-y-4">
    @csrf

    {{-- Nama Karyawan --}}
    <div>
        <label class="block font-medium mb-1">Nama Karyawan</label>
        <input type="text"
            name="nama"
            value="{{ old('nama') }}"
            class="w-full border rounded px-3 py-2" required>
    </div>

    {{-- Jabatan --}}
    <div>
        <label class="block font-medium mb-1">Jabatan</label>
        <input type="text"
            name="jabatan"
            value="{{ old('jabatan') }}"
            class="w-full border rounded px-3 py-2" required>
    </div>

    {{-- Tim --}}
    <div>
        <label class="block font-medium mb-1">Tim</label>
        <select name="tim" class="w-full border rounded px-3 py-2" required>
            <option value="">-- Pilih Jenis --</option>
            <option value="Designer">Designer</option>
            <option value="Architect">Architect</option>
            <option value="Project ">Project</option>
        </select>
    </div>

    {{-- Email --}}
    <div>
        <label class="block font-medium mb-1">Email</label>
        <input type="text"
            name="email"
            value="{{ old('email') }}"
            class="w-full border rounded px-3 py-2" required>
    </div>

    {{--NoTelepon --}}
    <div>
        <label class="block font-medium mb-1">No Telepon</label>
        <input type="text"
            name="notelepon"
            value="{{ old('notelepon') }}"
            class="w-full border rounded px-3 py-2" required>
    </div>

    {{--Alamat --}}
    <div>
        <label class="block font-medium mb-1">Alamat</label>
        <input type="text"
            name="alamat"
            value="{{ old('alamat') }}"
            class="w-full border rounded px-3 py-2" required>
    </div>

    {{-- Deskripsi --}}
    <div>
        <label class="block font-medium mb-1">Deskripsi</label>
        <textarea name="deskripsi"
            rows="3"
            value="{{ old('deskripsi') }}"
            class="w-full border rounded px-3 py-2"></textarea>
    </div>

    {{-- Gambar --}}
    <div>
        <label class="block font-medium mb-1">Gambar Tim</label>
        <input type="file"
            name="foto"
            class="w-full border rounded px-3 py-2">
    </div>

    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
        Simpan
    </button>
</form>
@endsection
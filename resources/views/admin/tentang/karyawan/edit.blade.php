@extends('layouts.admin')

@section('title', 'Edit Karyawan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Edit Karyawan</h2>
    <a href="{{ route('admin.tentang.karyawan.index') }}" class="btn btn-secondary btn-sm">← Kembali</a>
</div>

<form action="{{ route('admin.tentang.karyawan.update', $karyawan->id) }}" method="POST" class="card p-4 shadow-sm">
    @csrf
    @method('PUT')
    
    {{-- Nama Karyawan --}}
    <div>
        <label class="block font-medium mb-1">Nama Karyawan</label>
        <input type="text" name="nama" class="w-full border rounded px-3 py-2" required>
    </div>

    {{-- Jabatan --}}
    <div>
        <label class="block font-medium mb-1">Jabatan</label>
        <input type="text" name="jabatan" class="w-full border rounded px-3 py-2" required>
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
        <input type="text" name="email" class="w-full border rounded px-3 py-2" required>
    </div>

    {{--NoTelepon --}}
    <div>
        <label class="block font-medium mb-1">No Telepon</label>
        <input type="text" name="notelepon" class="w-full border rounded px-3 py-2" required>
    </div>


    {{-- Deskripsi --}}
    <div>
        <label class="block font-medium mb-1">Deskripsi</label>
        <textarea name="deskripsi" rows="3" class="w-full border rounded px-3 py-2"></textarea>
    </div>

    {{-- Gambar --}}
    <div>
        <label class="block font-medium mb-1">Gambar Tim</label>
        <input type="file" name="foto" class="w-full border rounded px-3 py-2">
    </div>


    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
        Simpan
    </button>
</form>
@endsection
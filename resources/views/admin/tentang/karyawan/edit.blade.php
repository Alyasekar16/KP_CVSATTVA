@extends('layouts.admin')

@section('title', 'Edit Karyawan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Edit Karyawan</h2>
    <a href="{{ route('admin.tentang.karyawan.index') }}" class="btn btn-secondary btn-sm">
        ← Kembali
    </a>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.tentang.karyawan.update', $karyawan->id) }}"
    method="POST"
    enctype="multipart/form-data"
    class="card p-4 shadow-sm">

    @csrf
    @method('PUT')

    {{-- Nama Karyawan --}}
    <div class="mb-3">
        <label class="block font-medium mb-1">Nama Karyawan</label>
        <input type="text"
            name="nama"
            value="{{ old('nama', $karyawan->nama) }}"
            class="w-full border rounded px-3 py-2"
            required>
    </div>

    {{-- Jabatan --}}
    <div class="mb-3">
        <label class="block font-medium mb-1">Jabatan</label>
        <input type="text"
            name="jabatan"
            value="{{ old('jabatan', $karyawan->jabatan) }}"
            class="w-full border rounded px-3 py-2"
            required>
    </div>

    {{-- Tim --}}
    <div class="mb-3">
        <label class="block font-medium mb-1">Tim</label>
        <select name="tim"
            class="w-full border rounded px-3 py-2"
            required>
            <option value="">-- Pilih Tim --</option>
            <option value="Designer" {{ $karyawan->tim == 'Designer' ? 'selected' : '' }}>Designer</option>
            <option value="Architect" {{ $karyawan->tim == 'Architect' ? 'selected' : '' }}>Architect</option>
            <option value="Project" {{ $karyawan->tim == 'Project' ? 'selected' : '' }}>Project</option>
        </select>
    </div>

    {{-- Email --}}
    <div class="mb-3">
        <label class="block font-medium mb-1">Email</label>
        <input type="email"
            name="email"
            value="{{ old('email', $karyawan->email) }}"
            class="w-full border rounded px-3 py-2"
            required>
    </div>

    {{-- No Telepon --}}
    <div class="mb-3">
        <label class="block font-medium mb-1">No Telepon</label>
        <input type="text"
            name="notelepon"
            value="{{ old('notelepon', $karyawan->notelepon) }}"
            class="w-full border rounded px-3 py-2"
            required>
    </div>

    {{-- Alamat --}}
    <div class="mb-3">
        <label class="block font-medium mb-1">Alamat</label>
        <input type="text"
            name="alamat"
            value="{{ old('alamat', $karyawan->alamat) }}"
            class="w-full border rounded px-3 py-2"
            required>
    </div>

    {{-- Deskripsi --}}
    <div class="mb-3">
        <label class="block font-medium mb-1">Deskripsi</label>
        <input type="text"
            name="deskripsi"
            rows="3"
            value="{{ old('alamat', $karyawan->alamat) }}"
            class="w-full border rounded px-3 py-2" required>
    </div>

    {{-- Foto --}}
    <div class="mb-4">
        <label class="block font-medium mb-1">Foto Karyawan</label>
        @if ($karyawan->foto)
        <img src="{{ asset('foto/'.$karyawan->foto) }}"
            width="120"
            class="mb-2 rounded">
        @endif
        <input type="file"
            name="foto"
            class="form-control">
    </div>

    <button type="submit"
        class="px-4 py-2 bg-blue-600 text-white rounded">
        Simpan
    </button>
</form>
@endsection
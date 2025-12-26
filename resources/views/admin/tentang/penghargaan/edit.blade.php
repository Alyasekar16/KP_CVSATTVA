@extends('layouts.admin')

@section('title', 'Edit Karyawan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Edit penghargaan</h2>
    <a href="{{ route('admin.tentang.penghargaan.index') }}" class="btn btn-secondary btn-sm">
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

<form action="{{ route('admin.tentang.penghargaan.update', $penghargaan->id) }}"
    method="POST"
    enctype="multipart/form-data"
    class="card p-4 shadow-sm">

    @csrf
    @method('PUT')

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
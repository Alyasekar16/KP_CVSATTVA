@extends('layouts.admin')

@section('title', 'Edit Perusahaan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Edit Perusahaan</h2>
    <a href="{{ route('admin.tentang.perusahaan.index') }}" class="btn btn-secondary btn-sm">
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

<form action="{{ route('admin.tentang.perusahaan.update', $perusahaan->id) }}"
    method="POST" enctype="multipart/form-data"
    class="card p-4 shadow-sm">

    @csrf
    @method('PUT')

    {{-- Visi & Misi --}}
    <div class="mb-3">
        <label class="block font-medium mb-1">Visi Misi</label>
        <input type="text"
            name="visimisi"
            value="{{ old('visimisi', $perusahaan->visimisi) }}"
            class="w-full border rounded px-3 py-2"
            required>
    </div>

    {{-- Sejarah --}}
    <div class="mb-3">
        <label class="block font-medium mb-1">Sejarah</label>
        <input type="text"
            name="sejarah"
            value="{{ old('sejarah', $perusahaan->sejarah) }}"
            class="w-full border rounded px-3 py-2"
            required>
    </div>

    {{-- Makna Logo --}}
    <div class="mb-3">
        <label class="block font-medium mb-1">Makna Logo</label>
        <input type="text"
            name="maknalogo"
            value="{{ old('maknalogo', $perusahaan->maknalogo) }}"
            class="w-full border rounded px-3 py-2"
            required>
    </div>

    {{-- Gambar --}}
    <div class="mb-3">
        <label class="block font-medium mb-1">Gambar</label>
        <input type="file"
            name="foto"
            class="form-control">
    </div>

    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
        Simpan
    </button>
</form>
@endsection
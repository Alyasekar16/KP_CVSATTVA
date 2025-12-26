@extends('layouts.admin')

@section('title', 'Edit Kontak')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Edit Kontak</h2>
    <a href="{{ route('kontak.index') }}" class="btn btn-secondary btn-sm">
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

<form action="{{ route('kontak.update', $kontak->id) }}"
    method="POST"
    enctype="multipart/form-data"
    class="card p-4 shadow-sm">

    @csrf
    @method('PUT')

    {{-- Kantor --}}
    <div class="mb-3">
        <label class="block font-medium mb-1">Kantor</label>
        <input type="text"
            name="kantor"
            value="{{ old('kantor', $kontak->kantor) }}"
            class="w-full border rounded px-3 py-2"
            required>
    </div>

    {{-- Email --}}
    <div class="mb-3">
        <label class="block font-medium mb-1">Email</label>
        <input type="email"
            name="email"
            value="{{ old('email', $kontak->email) }}"
            class="w-full border rounded px-3 py-2"
            required>
    </div>

    {{-- No Telepon --}}
    <div class="mb-3">
        <label class="block font-medium mb-1">No Telepon</label>
        <input type="text"
            name="notelepon"
            value="{{ old('notelepon', $kontak->notelepon) }}"
            class="w-full border rounded px-3 py-2"
            required>
    </div>

    {{-- Foto --}}
    <div class="mb-4">
        <label class="block font-medium mb-1">Foto QR</label>
        @if ($kontak->foto)
        <img src="{{ asset('foto/'.$kontak->foto) }}"
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
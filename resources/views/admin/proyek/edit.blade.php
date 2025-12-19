@extends('layouts.admin')

@section('title', 'Edit Proyek')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Edit Produk</h2>
    <a href="{{ route('proyek.index') }}" class="btn btn-secondary btn-sm">← Kembali</a>
</div>

<form action="{{ route('proyek.update', $proyek->proyek_id) }}" method="POST" class="card p-4 shadow-sm">
    @csrf
    @method('PUT')
    {{-- Nama Proyek --}}
    <div>
        <label class="block font-medium mb-1">Nama Proyek</label>
        <input type="text" name="namaproyek" class="w-full border rounded px-3 py-2" required>
    </div>

    {{-- KATEGORI PROYEK --}}
    <div>
        <label class="block font-medium mb-1">Kategori Proyek</label>
        <select name="kategoriproyek" class="w-full border rounded px-3 py-2" required>
            <option value="">-- Pilih Kategori --</option>
            <option value="Kontruksi">Kontruksi</option>
            <option value="Desain Arsitektur">Desain Arsitektur</option>
        </select>
    </div>

    {{-- JENIS PROYEK --}}
    <div>
        <label class="block font-medium mb-1">Jenis Proyek</label>
        <select name="jenisproyek" class="w-full border rounded px-3 py-2" required>
            <option value="">-- Pilih Jenis --</option>
            <option value="Rumah">Rumah</option>
            <option value="Kantor">Kantor</option>
            <option value="Kafe">Kafe</option>
            <option value="Taman">Taman</option>
            <option value="Interior">Interior</option>
            <option value="Lainnya">Lainnya</option>
        </select>
    </div>

    {{-- Lokasi --}}
    <div>
        <label class="block font-medium mb-1">Lokasi</label>
        <input type="text" name="lokasi" class="w-full border rounded px-3 py-2" required>
    </div>

    {{-- Klien --}}
    <div>
        <label class="block font-medium mb-1">Klien</label>
        <input type="text" name="klien" class="w-full border rounded px-3 py-2" required>
    </div>

    {{-- Tanggal --}}
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block font-medium mb-1">Tanggal Mulai</label>
            <input type="date" name="tanggalmulai" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label class="block font-medium mb-1">Tanggal Selesai</label>
            <input type="date" name="tanggalselesai" class="w-full border rounded px-3 py-2" required>
        </div>
    </div>

    {{-- Status --}}
    <div>
        <label class="block font-medium mb-1">Status</label>
        <select name="status" class="w-full border rounded px-3 py-2" required>
            <option value="perencanaan">Perencanaan</option>
            <option value="sedang berjalan">Sedang Berjalan</option>
            <option value="selesai">Selesai</option>
        </select>
    </div>

    {{-- Deskripsi --}}
    <div>
        <label class="block font-medium mb-1">Deskripsi</label>
        <textarea name="deskripsi" rows="3" class="w-full border rounded px-3 py-2"></textarea>
    </div>

    {{-- Gambar --}}
    <div>
        <label class="block font-medium mb-1">Gambar Proyek</label>
        <input type="file" name="gambarproyek" class="w-full border rounded px-3 py-2">
    </div>


    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
        Simpan
    </button>
</form>
@endsection

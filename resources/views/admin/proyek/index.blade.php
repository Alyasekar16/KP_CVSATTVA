@extends('layouts.admin')

@section('title', 'Daftar Proye')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Daftar Proyek</h2>
    <a href="#" class="btn btn-primary btn-sm ">+ Tambah Produk </a>
</div>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Jenis</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($proyek as $index => $item)
<tr>
    <td>{{ $index + 1 }}</td>
    <td>
        @if ($item->gambarproyek)
            <img src="{{ asset('gambarproyek/'.$item->gambarproyek) }}" width="80">
        @else
            <span class="text-muted">Tidak ada gambar</span>
        @endif
    </td>
    <td>{{ $item->namaproyek }}</td>
    <td>{{ $item->kategoriproyek }}</td>
    <td>{{ $item->jenisproyek }}</td>
    <td>
        <a href="{{ route('proyek.edit', $item->proyek_id) }}" class="btn btn-warning btn-sm">Edit</a>

        <form action="{{ route('proyek.destroy', $item->proyek_id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="text-center">Belum ada data</td>
</tr>
@endforelse

    </tbody>
</table>
@endsection
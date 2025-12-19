@extends('layouts.admin')

@section('title', 'Daftar Karyawan')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h2 class="text-2xl font-bold">Daftar Karyawan</h2>
   <a href="{{ route('admin.tentang.karyawan.create') }}"
   class="px-4 py-2 bg-[#4A2E14] text-white rounded">
    + Tambah Karyawan
</a>

</div>

<div class="bg-white rounded shadow p-4">
    <table id="karyawan-table" class="min-w-full">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Tim</th>
                <th>Email</th>
                <th>No Telepon</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($karyawan as $i => $item)
            <tr>
                <td>{{ $i + 1 }}</td>

                <td>
                    @if ($item->foto)
                    <img src="{{ asset('storage/'.$item->foto) }}" class="w-16">
                    @else
                        <span class="text-gray-400 text-sm">Tidak ada gambar</span>
                    @endif
                </td>

                <td>{{ $item->nama }}</td>
                <td>{{ $item->jabatan }}</td>
                <td>{{ $item->tim }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->notelepon }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>
                    <a href="{{ route('admin.tentang.karyawan.edit', $item->id) }}" class="text-blue-600 hover:underline">
                        Edit
                    </a>
                    <form action="{{ route('admin.tentang.karyawan.destroy', $item->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline"
                        onclick="return confirm('Yakin ingin menghapus proyek ini?')">Hapus
                    </button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@push('scripts')
<script>
$(function () {
    $('#karyawan-table').DataTable({
        pageLength: 10
    });
});
</script>
@endpush

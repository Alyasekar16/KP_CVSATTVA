@extends('layouts.admin')

@section('title', 'Kontak')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h2 class="text-2xl font-bold">Daftar Kontak</h2>
    <a href="{{ route('kontak.create') }}"
        class="px-4 py-2 bg-[#4A2E14] text-white rounded">
        + Tambah Kontak
    </a>
</div>

<div class="bg-white rounded shadow p-4">

    @if($kontak->isEmpty())
    <div class="text-center py-4 text-gray-500">
        Belum ada data
    </div>
    @else
    <table id="kontak-table" class="min-w-full">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Kantor</th>
                <th>Email</th>
                <th>No Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($kontak as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>

                <td>
                    @if ($item->foto)
                    <img src="{{ asset('storage/'.$item->foto) }}" class="w-16">
                    @else
                    <span class="text-gray-400">Tidak ada gambar</span>
                    @endif
                </td>

                <td>{{ $item->kantor }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->notelepon }}</td>

                <td class="space-x-2">
                    <a href="{{ route('kontak.edit', $item->id) }}"
                        class="text-blue-600 hover:underline">
                        Edit
                    </a>

                    <form action="{{ route('kontak.destroy', $item->id) }}"
                        method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-red-600 hover:underline"
                            onclick="return confirm('Yakin ingin menghapus kontak ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

@endsection

@push('scripts')
<script>
    $(function() {
        $('#kontak-table').DataTable({
            pageLength: 10
        });
    });
</script>
@endpush
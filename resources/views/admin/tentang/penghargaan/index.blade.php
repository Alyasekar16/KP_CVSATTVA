@extends('layouts.admin')

@section('title', 'Daftar penghargaan')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h2 class="text-2xl font-bold">Daftar penghargaan</h2>
    <a href="{{ route('admin.tentang.penghargaan.create') }}"
        class="px-4 py-2 bg-[#4A2E14] text-white rounded">
        + Tambah penghargaan
    </a>

</div>

<div class="bg-white rounded shadow p-4">

    @if($penghargaan->isEmpty())
    <div class="text-center py-4 text-gray-500">
        Belum ada data
    </div>
    @else
    <table id="penghargaan-table" class="min-w-full">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama Penghargaan</th>
                <th>Tahun</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($penghargaan as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>

                <td>
                    @if ($item->foto)
                    <img src="{{ asset('storage/'.$item->foto) }}" class="w-16">
                    @else
                    <span class="text-muted">Tidak ada gambar</span>
                    @endif
                </td>

                <td>{{ $item->nama }}</td>
                <td>{{ $item->tahun }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>
                    <a href="{{ route('admin.tentang.penghargaan.edit', $item->id) }}"
                        class="text-blue-600 hover:underline">
                        Edit
                    </a>

                    <form action="{{ route('admin.tentang.penghargaan.destroy', $item->id) }}"
                        method="POST" class="d-inline">

                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-red-600 hover:underline"
                            onclick="return confirm('Yakin ingin menghapus penghargaan ini?')">
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
        $('#penghargaan-table').DataTable({
            pageLength: 10
        });
    });
</script>
@endpush
@extends('layouts.admin')

@section('title', 'Daftar Proyek')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h2 class="text-2xl font-bold">Daftar Proyek</h2>
    <a href="{{ route('proyek.create') }}"
        class="px-4 py-2 bg-[#4A2E14] text-white rounded">
        + Tambah Proyek
    </a>

</div>

<div class="bg-white rounded shadow p-4">

    @if($proyek->isEmpty())
    <div class="text-center py-4 text-gray-500">
        Belum ada data
    </div>
    @else
    <table id="proyek-table" class="min-w-full">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Jenis</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($proyek as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>

                <td>
                    @if ($item->gambarproyek)
                    <img src="{{ asset('storage/'.$item->gambarproyek) }}" class="w-16">
                    @else
                    <span class="text-muted">Tidak ada gambar</span>
                    @endif
                </td>

                <td>{{ $item->namaproyek }}</td>
                <td>{{ $item->kategoriproyek }}</td>
                <td>{{ $item->jenisproyek }}</td>
                <td>{{ $item->lokasi }}</td>
                <td>
                    <a href="{{ route('proyek.edit', $item->proyek_id) }}"
                        class="text-blue-600 hover:underline">
                        Edit
                    </a>

                    <form action="{{ route('proyek.destroy', $item->proyek_id) }}"
                        method="POST"
                        class="d-inline">

                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-red-600 hover:underline"
                            onclick="return confirm('Yakin ingin menghapus proyek ini?')">
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
        $('#proyek-table').DataTable({
            pageLength: 10
        });
    });
</script>
@endpush
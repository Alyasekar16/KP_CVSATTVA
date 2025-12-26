@extends('layouts.admin')

@section('title', 'Daftar Perusahaan')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h2 class="text-2xl font-bold">Daftar Perusahaan</h2>
    <a href="{{ route('admin.tentang.perusahaan.create') }}"
        class="px-4 py-2 bg-[#4A2E14] text-white rounded">
        + Tambah Perusahaan
    </a>
</div>

<div class="bg-white rounded shadow p-4">

    @if($perusahaan->isEmpty())
    <div class="text-center py-4 text-gray-500">
        Belum ada data
    </div>
    @else
    <table id="perusahaan-table" class="min-w-full">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Visi & Misi</th>
                <th>Sejarah</th>
                <th>Makna Logo</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($perusahaan as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>

                <td>
                    @if ($item->foto)
                    <img src="{{ asset('storage/'.$item->foto) }}" class="w-16">
                    @else
                    <span class="text-muted">Tidak ada gambar</span>
                    @endif
                </td>

                <td>{{ $item->visimisi }}</td>
                <td>{{ $item->sejarah }}</td>
                <td>{{ $item->maknalogo }}</td>
                <td>
                    <a href="{{ route('admin.tentang.perusahaan.edit', $item->id) }}"
                        class="text-blue-600 hover:underline">
                        Edit
                    </a>

                    <form action="{{ route('admin.tentang.perusahaan.destroy', $item->id) }}"
                        method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-red-600 hover:underline"
                            onclick="return confirm('Yakin ingin menghapus Perusahaan ini?')">
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
        $('#perusahaan-table').DataTable({
            pageLength: 10
        });
    });
</script>
@endpush
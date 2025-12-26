@extends('layouts.admin')

@section('title', 'Order Jasa')

@section('content')

<h2 class="text-2xl font-bold mb-6">Daftar Order Jasa</h2>

<div class="bg-white p-4 rounded shadow">

    <table id="order-table" class="min-w-full">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Kategori</th>
                <th>Jenis</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $order->nama }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->kategori }}</td>
                <td>{{ $order->jenis }}</td>

                <td>
                    <span class="px-2 py-1 rounded text-sm
                        @if($order->status == 'pending') bg-yellow-200
                        @elseif($order->status == 'diproses') bg-blue-200
                        @else bg-green-200 @endif">
                        {{ ucfirst($order->status) }}
                    </span>
                </td>

                <td>{{ $order->created_at->format('d M Y') }}</td>

                <td class="space-x-2">

                    <!-- UPDATE STATUS -->
                    <form action="{{ route('admin.order.status', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <select name="status" onchange="this.form.submit()">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="diproses" {{ $order->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="selesai" {{ $order->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </form>


                    <!-- HAPUS -->
                    <form action="{{ route('admin.order.destroy', $order->id) }}"
                        method="POST"
                        class="inline"
                        onsubmit="return confirm('Hapus order ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:underline">
                            Hapus
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
    $(function() {
        $('#order-table').DataTable();
    });
</script>
@endpush
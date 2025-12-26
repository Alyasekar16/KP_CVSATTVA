@extends('layouts.user')

@section('title', 'Kontak')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-10">

    {{-- JUDUL --}}
    <h1 class="text-2xl font-semibold text-center mb-8">Kontak Kami</h1>

    {{-- INFORMASI KONTAK ADMIN --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
        @foreach ($kontak as $item)
        <div class="border rounded-lg p-6 shadow-sm">
            @if ($item->foto)
            <img src="{{ asset('storage/'.$item->foto) }}"
                class="w-full h-40 object-cover rounded mb-4">
            @endif

            <h2 class="text-lg font-semibold mb-2">
                Kantor {{ $item->kantor }}
            </h2>

            <p class="text-sm text-gray-600">📧 {{ $item->email }}</p>
            <p class="text-sm text-gray-600">📞 {{ $item->notelepon }}</p>
        </div>
        @endforeach
    </div>


    {{-- FORM ORDER --}}
    <div class="max-w-2xl mx-auto border rounded-lg p-6 shadow-sm">
        <h2 class="text-xl font-semibold mb-6 text-center">
            Form Order Jasa
        </h2>

        <form action="{{ route('order.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="text-sm">Nama</label>
                <input type="text" name="nama"
                    value="{{ old('nama') }}"
                    class="w-full border rounded px-3 py-2"
                    required>
            </div>

            <div>
                <label class="text-sm">Email</label>
                <input type="email" name="email"
                    value="{{ old('email') }}"
                    class="w-full border rounded px-3 py-2"
                    required>
            </div>

            <div>
                <label class="text-sm">No Telepon</label>
                <input type="text" name="notelepon"
                    value="{{ old('notelepon') }}"
                    class="w-full border rounded px-3 py-2"
                    required>
            </div>

            <div>
                <label class="text-sm">Kategori Proyek</label>
                <select name="kategori"
                    class="w-full border rounded px-3 py-2"
                    required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Kontruksi">Kontruksi</option>
                    <option value="Desain Arsitektur">Desain Arsitektur</option>
                </select>
            </div>

            <div>
                <label class="text-sm">Jenis Proyek</label>
                <select name="jenis"
                    class="w-full border rounded px-3 py-2"
                    required>
                    <option value="">-- Pilih Jenis --</option>
                    <option value="Rumah">Rumah</option>
                    <option value="Kantor">Kantor</option>
                    <option value="Kafe">Kafe</option>
                    <option value="Taman">Taman</option>
                    <option value="Interior">Interior</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                Kirim Order
            </button>
        </form>
    </div>

</div>
@endsection
@extends('layouts.user')

@section('title', 'Balas Komen')

@section('content')
<h2 class="text-2xl font-bold mb-4">Balas Komen</h2>

<form action="{{ route('komen.store') }}" method="POST">
    @csrf

    <input type="text" name="nama" placeholder="Nama" value="{{ old('nama') }}"
        class="border p-2 w-full mb-2">

    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"
        class="border p-2 w-full mb-2">

    <textarea name="ulasan"
        class="border p-2 w-full mb-2"
        placeholder="Tulis ulasan..."
        required></textarea>

    <button type="submit"
        class="px-4 py-2 bg-[#4A2E14] text-white rounded">
        Kirim Ulasan
    </button>
</form>
@endsection
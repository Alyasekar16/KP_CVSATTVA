@extends('layouts.user')
@section('title', 'Proyek Kami')

@section('content')

<section class="py-16 bg-[#F7F3EE]">
    <div class="max-w-7xl mx-auto px-6">

        <h2 class="text-4xl font-bold mb-12">Daftar Proyek</h2>

        {{-- STACKED HORIZONTAL --}}
        <div
            x-data="{ active: null }"
            class="relative h-[420px] overflow-hidden"
        >

            @php
                $offset = 0;
            @endphp

            @foreach ($proyek as $kategori => $items)

                @php
                    // Ensure $items is a collection and extract first item safely
                    $firstItem = $items instanceof \Illuminate\Support\Collection ? $items->first() : (is_object($items) ? $items : null);
                @endphp

                <div
                    @click="active = (active === '{{ $kategori }}' ? null : '{{ $kategori }}')"
                    class="absolute top-0 h-full transition-all duration-500 cursor-pointer"
                    :class="active === '{{ $kategori }}'
                        ? 'left-{{ $offset }} w-[65%] z-50'
                        : 'left-{{ $offset }} w-[220px] z-{{ 10 + $loop->index }}'"
                >
                    <div class="h-full rounded-xl overflow-hidden shadow-xl bg-black relative">

                        {{-- GAMBAR --}}
                        <img
                            src="{{ $firstItem && $firstItem->gambarproyek ? asset('storage/'.$firstItem->gambarproyek) : 'https://via.placeholder.com/1200x800?text=No+Image' }}"
                            class="w-full h-full object-cover"
                        >

                        {{-- OVERLAY --}}
                        <div class="absolute inset-0 bg-black/40 flex items-end p-6">
                            <h3 class="text-white text-2xl font-bold capitalize">
                                {{ $kategori }}
                            </h3>
                        </div>

                        {{-- DETAIL (KETIKA AKTIF) --}}
                        <div
                            x-show="active === '{{ $kategori }}'"
                            x-transition
                            class="absolute inset-0 bg-white p-8 overflow-y-auto"
                        >
                            <h4 class="text-2xl font-bold mb-6 capitalize">
                                Proyek {{ $kategori }}
                            </h4>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @foreach ($items ?? [] as $item)
                                    <div class="border rounded-lg overflow-hidden shadow-sm">
                                        <img
                                            src="{{ $item && $item->gambarproyek ? asset('storage/'.$item->gambarproyek) : 'https://via.placeholder.com/600x400?text=No+Image' }}"
                                            class="w-full h-40 object-cover"
                                        >
                                        <div class="p-4">
                                            <h5 class="font-semibold">
                                                {{ $item->namaproyek }}
                                            </h5>
                                            <p class="text-sm text-gray-600">
                                                {{ $item->lokasi ?? '-' }}
                                            </p>
                                            <p class="text-xs mt-2">
                                                Status: {{ $item->status }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>

                @php
                    $offset += 120;
                @endphp

            @endforeach

        </div>
    </div>
</section>

@endsection

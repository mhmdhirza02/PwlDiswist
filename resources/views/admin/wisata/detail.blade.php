@extends('layouts.app')

@section('title', $wisata->nama)

@section('content')

<!-- HERO IMAGE -->
<section class="relative h-96">
    <img src="/storage/{{ $wisata->foto }}"
         class="w-full h-full object-cover">

    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-end">
        <div class="max-w-7xl mx-auto px-6 pb-6 text-white">
            <h1 class="text-4xl font-bold">{{ $wisata->nama }}</h1>
            <p class="text-sm mt-2">{{ $wisata->lokasi }}</p>
        </div>
    </div>
</section>

<!-- CONTENT -->
<section class="max-w-7xl mx-auto px-6 py-12 grid md:grid-cols-3 gap-8">

    <!-- DESKRIPSI -->
    <div class="md:col-span-2">
        <h2 class="text-2xl font-bold mb-4">Tentang Wisata</h2>
        <p class="text-gray-700 leading-relaxed">
            {{ $wisata->deskripsi }}
        </p>
    </div>

    <!-- INFO CARD -->
    <div class="bg-white rounded-xl shadow p-6 smooth">
        <h3 class="font-semibold mb-3">📍 Lokasi</h3>
        <p class="text-sm text-gray-600 mb-4">
            {{ $wisata->lokasi }}
        </p>

        <span class="inline-block bg-indigo-100 text-indigo-600 text-xs px-3 py-1 rounded-full">
            🔥 Wisata Favorit
        </span>
    </div>

</section>

<!-- GOOGLE MAP -->
<section class="max-w-7xl mx-auto px-6 pb-16">
    <h2 class="text-2xl font-bold mb-4">Peta Lokasi</h2>

    <div class="rounded-xl overflow-hidden shadow">
        <iframe
            class="w-full h-96"
            src="https://www.google.com/maps?q={{ urlencode($wisata->lokasi) }}&output=embed"
            loading="lazy">
        </iframe>
    </div>
</section>

@endsection

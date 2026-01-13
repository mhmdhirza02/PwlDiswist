@extends('layouts.landing')

@section('title', 'Beranda | Diswist Yogyakarta')

@section('content')

    <!-- HERO SECTION -->
    <div class="relative h-screen min-h-[600px] flex items-center justify-center text-center text-white overflow-hidden">

        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/hero-jogja.jpg') }}" alt="Background" class="w-full h-full object-cover">
            <!-- Dark Overlay Gradient -->
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/40 to-black/70"></div>
        </div>

        <!-- Content -->
        <div class="relative z-10 px-4 w-full max-w-5xl mx-auto mt-16">
            <h1 class="text-4xl md:text-6xl font-extrabold mb-6 leading-tight drop-shadow-lg tracking-tight">
                Jelajahi Keindahan <span class="text-blue-400">Yogyakarta</span><br>Yang Tak Terlupakan
            </h1>
            <p class="text-lg md:text-xl text-gray-200 mb-10 max-w-3xl mx-auto drop-shadow-md font-medium">
                Temukan destinasi tersembunyi, cita rasa lokal yang autentik, dan paket liburan terbaik hanya dalam satu
                platform.
            </p>

            <!-- Search Bar -->
            <form action="{{ route('wisata') }}" method="GET"
                class="bg-white/95 backdrop-blur-md p-3 md:p-2 rounded-2xl md:rounded-full flex flex-col md:flex-row w-full max-w-2xl mx-auto shadow-2xl items-center border border-white/20">
                <div class="flex-grow w-full md:w-auto relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" name="search" placeholder="Cari destinasi atau kuliner..."
                        class="w-full pl-12 pr-4 py-3 rounded-full text-gray-800 placeholder-gray-500 focus:outline-none bg-transparent">
                </div>
                <button type="submit"
                    class="w-full md:w-auto mt-3 md:mt-0 bg-primary hover:bg-secondary text-white px-8 py-3 rounded-xl md:rounded-full font-bold transition-all transform hover:scale-105 shadow-md">
                    Cari
                </button>
            </form>
        </div>
    </div>

    <!-- POPULAR DESTINATIONS -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Section Header -->
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
                <div>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-2">Destinasi Populer</h2>
                    <p class="text-gray-500 text-lg">Tempat yang paling sering dikunjungi saat ini</p>
                </div>
                <a href="{{ route('wisata') }}"
                    class="text-primary font-bold hover:text-secondary flex items-center gap-2 group transition-colors">
                    Lihat Semua
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>

            <!-- Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($wisataPopuler as $index => $item)
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 relative">
                        <!-- Image -->
                        <div class="relative h-64 overflow-hidden">
                            <a href="{{ route('wisata.detail', $item->id) }}" class="absolute inset-0 z-20"></a>
                            <img src="{{ str_starts_with($item->foto, 'wisata/') ? asset('storage/' . $item->foto) : asset('images/' . $item->foto) }}"
                                alt="{{ $item->nama }}"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">


                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-primary transition-colors">
                                <a href="{{ route('wisata.detail', $item->id) }}">{{ $item->nama }}</a>
                            </h3>
                            <div class="flex items-center text-gray-500 text-sm mb-4">
                                <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ $item->lokasi }}
                            </div>
                            <p class="text-gray-600 line-clamp-2 mb-4">
                                Nikmati pesona keindahan alam dan budaya di {{ $item->nama }} yang memukau.
                            </p>
                            <a href="{{ route('wisata.detail', $item->id) }}"
                                class="text-primary font-bold hover:text-secondary flex items-center gap-1 group/btn">
                                Lihat Detail
                                <i class="bi bi-arrow-right group-hover/btn:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- ARTIKEL BERITA -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
                <div>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-2">Artikel & Berita</h2>
                    <p class="text-gray-500 text-lg">Informasi terbaru seputar wisata di Yogyakarta</p>
                </div>
                <a href="{{ route('artikel') }}"
                    class="text-primary font-bold hover:text-secondary flex items-center gap-2 group transition-colors">
                    Lihat Semua Artikel
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>

            <!-- Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($artikels as $artikel)
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                        <div class="relative h-56 overflow-hidden">
                            <a href="{{ route('artikel.detail', $artikel->id) }}" class="absolute inset-0 z-10"></a>
                            <img src="{{ asset('storage/' . $artikel->thumbnail) }}" alt="{{ $artikel->judul }}"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                        </div>
                        <div class="p-6">
                            <div class="text-sm text-primary font-semibold mb-2 uppercase tracking-wider">Berita Terbaru</div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-primary transition-colors">
                                <a href="{{ route('artikel.detail', $artikel->id) }}">{{ $artikel->judul }}</a>
                            </h3>
                            <p class="text-gray-600 line-clamp-3 mb-4 text-sm leading-relaxed">
                                {{ Str::limit(strip_tags($artikel->konten), 120) }}
                            </p>
                            <div class="flex items-center justify-between mt-auto pt-4 border-t border-gray-100">
                                <span class="text-xs text-gray-400">
                                    <i class="bi bi-calendar3 mr-1"></i> {{ $artikel->created_at->format('d M Y') }}
                                </span>
                                <a href="{{ route('artikel.detail', $artikel->id) }}"
                                    class="text-primary font-bold text-sm hover:underline">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- WHY CHOOSE US (Optional Extra for Premium feel) -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-12">Kenapa Memilih Kami?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-6">
                    <div
                        class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center mx-auto mb-6 text-primary">
                        <i class="bi bi-shield-check text-3xl"></i>
                    </div>
                    <h3 class="font-bold text-xl mb-3">Terpercaya</h3>
                    <p class="text-gray-500">Kami telah melayani ribuan wisatawan dengan kepuasan tinggi.</p>
                </div>
                <div class="p-6">
                    <div
                        class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center mx-auto mb-6 text-primary">
                        <i class="bi bi-wallet2 text-3xl"></i>
                    </div>
                    <h3 class="font-bold text-xl mb-3">Harga Terbaik</h3>
                    <p class="text-gray-500">Dapatkan penawaran terbaik untuk liburan impian Anda.</p>
                </div>
                <div class="p-6">
                    <div
                        class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center mx-auto mb-6 text-primary">
                        <i class="bi bi-headset text-3xl"></i>
                    </div>
                    <h3 class="font-bold text-xl mb-3">Dukungan 24/7</h3>
                    <p class="text-gray-500">Tim kami siap membantu perjalanan Anda kapan saja.</p>
                </div>
            </div>
        </div>
    </section>

@endsection
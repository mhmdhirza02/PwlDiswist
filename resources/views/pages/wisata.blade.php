@extends('layouts.landing')

@section('title', 'Destinasi Wisata | Diswist Yogyakarta')

@section('content')
    <!-- Hero Section -->
    <div class="relative pt-40 pb-24 lg:pt-60 lg:pb-40 overflow-hidden text-center text-white">
        <!-- Background Image -->
        <div class="absolute inset-0 -z-10">
            <img src="{{ asset('images/hero-jogja.jpg') }}" alt="Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/50 to-gray-900/90"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight mb-8 drop-shadow-lg">
                Jelajahi <span class="text-blue-400">Pesona Yogyakarta</span>
            </h1>
            <p class="text-lg md:text-xl text-gray-200 max-w-2xl mx-auto mb-12 drop-shadow-md">
                Temukan destinasi wisata terbaik, hidden gems, dan keindahan alam yang menakjubkan di Yogyakarta.
            </p>

            <!-- Search Bar -->
            <form action="{{ route('wisata') }}" method="GET">
                <div
                    class="bg-white/95 backdrop-blur-md p-3 md:p-2 rounded-2xl md:rounded-full flex flex-col md:flex-row w-full max-w-2xl mx-auto shadow-2xl items-center border border-white/20">
                    <div class="flex-grow w-full md:w-auto relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari destinasi wisata..."
                            class="w-full pl-12 pr-4 py-3 rounded-full text-gray-800 placeholder-gray-500 focus:outline-none bg-transparent">
                    </div>
                    <button type="submit"
                        class="w-full md:w-auto mt-3 md:mt-0 bg-primary hover:bg-secondary text-white px-8 py-3 rounded-xl md:rounded-full font-bold transition-all transform hover:scale-105 shadow-md">
                        Cari
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Wisata Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 mt-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($wisata as $item)
                <div
                    class="group relative bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <!-- Image Container -->
                    <div class="relative h-64 overflow-hidden">
                        <a href="{{ route('wisata.detail', $item->id) }}" class="absolute inset-0 z-20"></a>
                        <div class="absolute inset-0 bg-gray-900/20 group-hover:bg-gray-900/10 transition-colors z-10"></div>
                        <img src="{{ str_starts_with($item->foto, 'wisata/') ? asset('storage/' . $item->foto) : asset('images/' . $item->foto) }}"
                            alt="{{ $item->nama }}"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">


                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <!-- Location Tag -->
                        <div class="flex items-center text-primary text-xs font-bold mb-3 uppercase tracking-wider">
                            <i class="bi bi-geo-alt-fill mr-1"></i> {{ $item->lokasi }}
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-primary transition-colors">
                            <a href="{{ route('wisata.detail', $item->id) }}">{{ $item->nama }}</a>
                        </h3>

                        <p class="text-gray-500 text-sm mb-6 line-clamp-2">
                            Nikmati pengalaman tak terlupakan di {{ $item->nama }}. Pemandangan indah dan suasana yang
                            menenangan menanti Anda.
                        </p>

                        <div class="flex items-center justify-between border-t border-gray-100 pt-4">
                            <div class="flex flex-col">
                                <span class="text-xs text-gray-400">Harga Tiket Mulai</span>
                                <span class="text-gray-900 font-bold">Rp 25.000</span>
                            </div>
                            <a href="{{ route('wisata.detail', $item->id) }}"
                                class="w-10 h-10 rounded-full bg-blue-50 text-primary flex items-center justify-center hover:bg-primary hover:text-white transition-all transform hover:rotate-45">
                                <i class="bi bi-arrow-up-right text-lg"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination / Load More (Placeholder) -->
        <div class="text-center mt-12">
            <button class="inline-flex items-center space-x-2 text-gray-500 hover:text-primary font-bold transition-colors">
                <span>Muat Lebih Banyak</span>
                <i class="bi bi-arrow-down"></i>
            </button>
        </div>
    </div>
@endsection
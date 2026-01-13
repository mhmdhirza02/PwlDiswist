@extends('layouts.landing')

@section('title', 'Hotel & Penginapan | Diswist Yogyakarta')

@section('content')
    <!-- Hero Section -->
    <div class="relative pt-32 pb-20 lg:pt-40 lg:pb-28 overflow-hidden bg-white">
        <div class="absolute top-0 inset-x-0 h-full bg-gradient-to-b from-blue-50/50 to-white -z-10"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight mb-6">
                Istirahat Nyaman di <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary">Yogyakarta</span>
            </h1>
            <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto mb-10">
                Pilihan hotel dan penginapan terbaik dengan fasilitas lengkap dan pelayanan istimewa.
            </p>

            <!-- Search Bar -->
            <form action="{{ route('hotel') }}" method="GET">
                <div
                    class="bg-white/95 backdrop-blur-md p-3 md:p-2 rounded-2xl md:rounded-full flex flex-col md:flex-row w-full max-w-2xl mx-auto shadow-2xl items-center border border-gray-200">
                    <div class="flex-grow w-full md:w-auto relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari hotel atau penginapan..."
                            class="w-full pl-12 pr-4 py-3 rounded-full text-gray-800 placeholder-gray-500 focus:outline-none bg-transparent">
                    </div>
                    <button
                        class="w-full md:w-auto mt-3 md:mt-0 bg-primary hover:bg-secondary text-white px-8 py-3 rounded-xl md:rounded-full font-bold transition-all transform hover:scale-105 shadow-md">
                        Cari
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Hotel Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Mock Data Loop -->


            @foreach($hotels as $hotel)
                <div
                    class="group relative bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <!-- Image -->
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ str_starts_with($hotel->image, 'http') ? $hotel->image : asset('storage/' . $hotel->image) }}"
                            alt="{{ $hotel->name }}"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <div class="flex items-center text-gray-500 text-xs font-bold mb-2 uppercase tracking-wider">
                            <i class="bi bi-geo-alt mr-1"></i> {{ $hotel->location }}
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-primary transition-colors">
                            <a href="{{ route('hotel.detail', $hotel->id) }}">{{ $hotel->name }}</a>
                        </h3>

                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-blue-50 text-blue-600 text-xs rounded-md font-medium">Wifi</span>
                            <span class="px-2 py-1 bg-blue-50 text-blue-600 text-xs rounded-md font-medium">Pool</span>
                            <span class="px-2 py-1 bg-blue-50 text-blue-600 text-xs rounded-md font-medium">Spa</span>
                        </div>

                        <div class="flex items-end justify-between border-t border-gray-100 pt-4">
                            <div>
                                <p class="text-xs text-gray-400 mb-0.5">Mulai dari</p>
                                <p class="text-lg font-bold text-primary">{{ $hotel->price }} <span
                                        class="text-xs text-gray-400 font-normal">/ malam</span></p>
                            </div>

                            <a href="{{ route('hotel.detail', $hotel->id) }}"
                                class="bg-primary hover:bg-secondary text-white px-4 py-2 rounded-xl text-xs font-bold transition-all transform hover:scale-105">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@extends('layouts.landing')

@section('title', 'Kuliner Khas | Diswist Yogyakarta')

@section('content')
    <!-- Hero Section -->
    <div class="relative pt-32 pb-20 lg:pt-40 lg:pb-28 overflow-hidden">
        <div class="absolute top-0 inset-x-0 h-full bg-gradient-to-b from-blue-50/50 to-white -z-10"></div>
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-blue-100 rounded-full blur-3xl opacity-50 -z-10">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight mb-6">
                Citarasa Legendaris <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-indigo-600">Yogyakarta</span>
            </h1>
            <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto mb-10">
                Jelajahi kelezatan kuliner khas yang memanjakan lidah, dari warung kaki lima hingga restoran bintang lima.
            </p>



            <!-- Search Bar -->
            <!-- Search Bar -->
            <form action="{{ route('kuliner') }}" method="GET">
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
                            placeholder="Cari makanan atau tempat makan..."
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

    <!-- Kuliner Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Mock Data Loop -->


            @foreach($kuliner as $item)
                <div
                    class="group relative bg-white rounded-3xl shadow-sm border border-blue-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <!-- Image -->
                    <div class="relative h-64 overflow-hidden">
                        <a href="{{ route('kuliner.detail', $item->id) }}" class="absolute inset-0 z-20"></a>
                        <img src="{{ str_starts_with($item->image, 'http') ? $item->image : asset('storage/' . $item->image) }}"
                            alt="{{ $item->name }}"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">

                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <div class="flex items-center text-orange-600 text-[10px] font-bold mb-2 uppercase tracking-wider">
                            <i class="bi bi-geo-alt-fill mr-1"></i> {{ $item->address }}
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                            <a href="{{ route('kuliner.detail', $item->id) }}">{{ $item->name }}</a>
                        </h3>
                        <p class="text-gray-500 text-sm mb-4 line-clamp-2">
                            {{ $item->description }}
                        </p>

                        <div class="flex items-center justify-between border-t border-gray-100 pt-4">
                            <div>
                                <p class="text-xs text-gray-400 mb-0.5">Harga Rata-rata</p>
                                <p class="text-lg font-bold text-gray-900">{{ $item->price_range }}</p>
                            </div>
                            <a href="{{ route('kuliner.detail', $item->id) }}"
                                class="w-10 h-10 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all">
                                <i class="bi bi-arrow-right text-lg"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
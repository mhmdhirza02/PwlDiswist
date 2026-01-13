@extends('layouts.landing')

@section('title', $kuliner->name . ' | Diswist Yogyakarta')

@section('content')
<!-- Hero Image -->
<div class="relative h-[60vh] overflow-hidden">
    <div class="absolute inset-0 bg-black/50 z-10"></div>
    <img src="{{ $kuliner->image }}" alt="{{ $kuliner->name }}" class="w-full h-full object-cover">
    <div class="absolute bottom-0 left-0 w-full z-20 p-8 md:p-16 bg-gradient-to-t from-gray-900 to-transparent">
        <div class="max-w-7xl mx-auto">
            <span class="bg-orange-500 text-white text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full mb-4 inline-block">
                {{ $kuliner->category }}
            </span>
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-2">{{ $kuliner->name }}</h1>
            <div class="flex items-center text-gray-200 gap-4 text-sm md:text-base">
                <span class="flex items-center"><i class="bi bi-tag-fill text-orange-400 mr-2"></i> {{ $kuliner->price_range }}</span>
            </div>
        </div>
    </div>
</div>

<!-- Content -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-20">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        <!-- Main Info -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-orange-100 mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Tentang Kuliner</h2>
                <p class="text-gray-600 leading-relaxed text-lg mb-6">
                    {{ $kuliner->description }}
                </p>
                
                <h3 class="text-xl font-bold text-gray-900 mb-3">Menu Favorit</h3>
                <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <li class="flex items-center gap-3 p-4 rounded-xl bg-orange-50/50">
                        <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center text-orange-600 font-bold text-lg">1</div>
                        <span class="font-medium text-gray-700">Menu Andalan Spesial</span>
                    </li>
                    <li class="flex items-center gap-3 p-4 rounded-xl bg-orange-50/50">
                        <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center text-orange-600 font-bold text-lg">2</div>
                        <span class="font-medium text-gray-700">Minuman Khas Segar</span>
                    </li>
                    <li class="flex items-center gap-3 p-4 rounded-xl bg-orange-50/50">
                        <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center text-orange-600 font-bold text-lg">3</div>
                        <span class="font-medium text-gray-700">Camilan Penutup</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Sidebar / Info Card -->
        <div class="lg:col-span-1">
            <div class="lg:sticky top-32 bg-white rounded-3xl shadow-xl border border-gray-100 p-8">
                <!-- Price Section -->
                <div class="mb-8 text-center pb-6 border-b border-orange-50">
                    <span class="text-gray-400 text-sm font-medium block mb-1">Estimasi Harga</span>
                    <div class="flex items-center justify-center gap-1">
                        <span class="text-3xl font-extrabold text-orange-600">{{ $kuliner->price_range }}</span>
                    </div>
                </div>

                <!-- Detail Info -->
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-11 h-11 rounded-xl bg-orange-50 border border-orange-100 flex items-center justify-center text-orange-600 shadow-sm">
                            <i class="bi bi-clock text-xl"></i>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-[11px] text-gray-400 font-bold uppercase tracking-wider mb-0.5">Jam Buka</span>
                            <span class="text-gray-800 font-semibold leading-tight">10.00 - 22.00 WIB</span>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-11 h-11 rounded-xl bg-orange-50 border border-orange-100 flex items-center justify-center text-orange-600 shadow-sm">
                            <i class="bi bi-geo-alt text-xl"></i>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-[11px] text-gray-400 font-bold uppercase tracking-wider mb-0.5">Alamat Lengkap</span>
                            <span class="text-gray-800 font-semibold leading-tight">{{ $kuliner->address }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

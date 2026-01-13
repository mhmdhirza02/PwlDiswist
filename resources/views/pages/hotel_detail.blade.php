@extends('layouts.landing')

@section('title', $hotel->name . ' | Diswist Yogyakarta')

@section('content')
    <!-- Hero Image -->
    <div class="relative h-[60vh] overflow-hidden">
        <div class="absolute inset-0 bg-black/40 z-10"></div>
        <img src="{{ str_starts_with($hotel->image, 'http') ? $hotel->image : asset('storage/' . $hotel->image) }}"
            alt="{{ $hotel->name }}" class="w-full h-full object-cover">
        <div class="absolute bottom-0 left-0 w-full z-20 p-8 md:p-16 bg-gradient-to-t from-gray-900 to-transparent">
            <div class="max-w-7xl mx-auto">
                <span
                    class="bg-blue-600 text-white text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full mb-4 inline-block">
                    Hotel & Penginapan
                </span>
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-2">{{ $hotel->name }}</h1>
                <div class="flex items-center text-gray-200 gap-4 text-sm md:text-base">
                    <span class="flex items-center"><i class="bi bi-geo-alt-fill text-primary mr-2"></i>
                        {{ $hotel->location }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-20">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Main Info -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Deskripsi Hotel</h2>
                    <p class="text-gray-600 leading-relaxed text-lg mb-6">
                        {{ $hotel->description }}
                    </p>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Fasilitas Utama</h3>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-8">
                        <div class="flex items-center gap-3 text-gray-600">
                            <i class="bi bi-wifi text-primary"></i>
                            <span class="text-sm">Free Wi-Fi</span>
                        </div>
                        <div class="flex items-center gap-3 text-gray-600">
                            <i class="bi bi-p-circle text-primary"></i>
                            <span class="text-sm">Parkir Gratis</span>
                        </div>
                        <div class="flex items-center gap-3 text-gray-600">
                            <i class="bi bi-wind text-primary"></i>
                            <span class="text-sm">AC Dingin</span>
                        </div>
                        <div class="flex items-center gap-3 text-gray-600">
                            <i class="bi bi-tv text-primary"></i>
                            <span class="text-sm">Smart TV</span>
                        </div>
                        <div class="flex items-center gap-3 text-gray-600">
                            <i class="bi bi-cup-hot text-primary"></i>
                            <span class="text-sm">Breakfast</span>
                        </div>
                        <div class="flex items-center gap-3 text-gray-600">
                            <i class="bi bi-droplet text-primary"></i>
                            <span class="text-sm">Kolam Renang</span>
                        </div>
                    </div>
                </div>

                <!-- Gallery Section -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Galeri Foto</h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @forelse($hotel->galeri as $galeri)
                            <div
                                class="aspect-square bg-gray-100 rounded-xl overflow-hidden cursor-pointer hover:opacity-90 transition shadow-sm border border-gray-100">
                                <img src="{{ asset('storage/' . $galeri->foto) }}" class="w-full h-full object-cover">
                            </div>
                        @empty
                            <div class="col-span-4 py-8 text-center bg-gray-50 rounded-xl border border-dashed border-gray-200">
                                <p class="text-gray-400 text-sm">Belum ada foto galeri untuk hotel ini.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Sidebar / Info Card -->
            <div class="lg:col-span-1">
                <div class="lg:sticky top-32 bg-white rounded-3xl shadow-xl border border-gray-100 p-8">
                    <!-- Header Section -->
                    <div class="mb-8 pb-6 border-b border-gray-50">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Informasi Hotel</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">
                            Nikmati kenyamanan menginap terbaik di pusat kota Yogyakarta.
                        </p>
                    </div>

                    <!-- Detail Info -->
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div
                                class="flex-shrink-0 w-11 h-11 rounded-xl bg-blue-50/50 border border-blue-100 flex items-center justify-center text-primary shadow-sm">
                                <i class="bi bi-clock text-xl"></i>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-[11px] text-gray-400 font-bold uppercase tracking-wider mb-0.5">Waktu
                                    Check-in</span>
                                <span class="text-gray-800 font-semibold leading-tight">14.00 WIB</span>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div
                                class="flex-shrink-0 w-11 h-11 rounded-xl bg-blue-50/50 border border-blue-100 flex items-center justify-center text-primary shadow-sm">
                                <i class="bi bi-geo-alt text-xl"></i>
                            </div>
                            <div class="flex flex-col">
                                <span
                                    class="text-[11px] text-gray-400 font-bold uppercase tracking-wider mb-0.5">Lokasi</span>
                                <span class="text-gray-800 font-semibold leading-tight">{{ $hotel->location }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
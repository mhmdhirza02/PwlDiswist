@extends('layouts.landing')

@section('title', $wisata->nama . ' | Diswist Yogyakarta')

@section('content')
<!-- Hero Image -->
<div class="relative h-[60vh] overflow-hidden">
    <div class="absolute inset-0 bg-black/40 z-10"></div>
    <img src="{{ str_starts_with($wisata->foto, 'wisata/') ? asset('storage/'.$wisata->foto) : asset('images/'.$wisata->foto) }}" alt="{{ $wisata->nama }}" class="w-full h-full object-cover">
    <div class="absolute bottom-0 left-0 w-full z-20 p-8 md:p-16 bg-gradient-to-t from-gray-900 to-transparent">
        <div class="max-w-7xl mx-auto">
            <span class="bg-primary text-white text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full mb-4 inline-block">
                Destinasi Wisata
            </span>
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-2">{{ $wisata->nama }}</h1>
            <div class="flex items-center text-gray-200 gap-4 text-sm md:text-base">
                <span class="flex items-center"><i class="bi bi-geo-alt-fill text-primary mr-2"></i> {{ $wisata->lokasi }}</span>
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
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Tentang Destinasi</h2>
                <p class="text-gray-600 leading-relaxed text-lg mb-6">
                    {{ $wisata->deskripsi }}
                </p>
                
                <h3 class="text-xl font-bold text-gray-900 mb-3">Fasilitas</h3>
                <div class="flex flex-wrap gap-3 mb-8">
                    <span class="px-4 py-2 bg-blue-50 text-blue-600 rounded-lg text-sm font-semibold">Area Parkir Luas</span>
                    <span class="px-4 py-2 bg-blue-50 text-blue-600 rounded-lg text-sm font-semibold">Toilet Bersih</span>
                    <span class="px-4 py-2 bg-blue-50 text-blue-600 rounded-lg text-sm font-semibold">Spot Foto</span>
                    <span class="px-4 py-2 bg-blue-50 text-blue-600 rounded-lg text-sm font-semibold">Mushola</span>
                    <span class="px-4 py-2 bg-blue-50 text-blue-600 rounded-lg text-sm font-semibold">Warung Makan</span>
                </div>
            </div>

            <!-- Gallery Placeholder -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Galeri Foto</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @forelse($wisata->galeri as $galeri)
                    <div class="aspect-square bg-gray-100 rounded-xl overflow-hidden cursor-pointer hover:opacity-90 transition shadow-sm border border-gray-100">
                        <img src="{{ asset('storage/'.$galeri->foto) }}" class="w-full h-full object-cover">
                    </div>
                    @empty
                    <div class="col-span-4 py-8 text-center bg-gray-50 rounded-xl border border-dashed border-gray-200">
                        <p class="text-gray-400 text-sm">Belum ada foto galeri untuk destinasi ini.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Sidebar / Booking Ticket -->
        <div class="lg:col-span-1">
            <div class="lg:sticky top-32 bg-white rounded-3xl shadow-xl border border-gray-100 p-8">
                <!-- Price Section -->
                <div class="mb-8 text-center pb-6 border-b border-gray-50">
                    <span class="text-gray-400 text-sm font-medium block mb-2">Harga Tiket Masuk</span>
                    <div class="flex items-center justify-center gap-2">
                        <span class="text-3xl font-extrabold text-primary">Rp 25.000</span>
                        <span class="text-gray-400 font-medium">/ orang</span>
                    </div>
                </div>

                <!-- Detail Info Section -->
                <div class="space-y-6">
                    <!-- Jam Buka -->
                    <div class="flex items-start gap-4 text-gray-600">
                        <div class="flex-shrink-0 w-11 h-11 rounded-2xl bg-blue-50/50 border border-blue-100 flex items-center justify-center text-primary shadow-sm">
                            <i class="bi bi-clock text-xl"></i>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-[11px] text-gray-400 font-bold uppercase tracking-wider mb-0.5">Jam Buka</span>
                            <span class="text-gray-800 font-semibold leading-tight">08.00 - 17.00 WIB</span>
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="flex items-start gap-4 text-gray-600">
                        <div class="flex-shrink-0 w-11 h-11 rounded-2xl bg-blue-50/50 border border-blue-100 flex items-center justify-center text-primary shadow-sm">
                            <i class="bi bi-geo-alt text-xl"></i>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-[11px] text-gray-400 font-bold uppercase tracking-wider mb-0.5">Alamat Lengkap</span>
                            <span class="text-gray-800 font-semibold leading-tight">{{ $wisata->lokasi }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

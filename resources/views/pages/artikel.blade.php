@extends('layouts.landing')

@section('title', 'Artikel & Berita | Diswist Yogyakarta')

@section('content')
<div class="pt-24 pb-16 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-12 text-center">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-4">Artikel & Berita</h1>
            <p class="text-lg text-gray-600">Temukan tips perjalanan, cerita destinasi, dan berita terbaru seputar Yogyakarta.</p>
        </div>

        <!-- Search & Filter -->
        <div class="mb-12">
            <form action="{{ route('artikel') }}" method="GET" class="max-w-2xl mx-auto">
                <div class="relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari artikel..." 
                        class="w-full pl-12 pr-4 py-4 rounded-2xl border-none shadow-md focus:ring-2 focus:ring-primary">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="bi bi-search text-gray-400"></i>
                    </div>
                    <button type="submit" class="absolute right-3 top-2 bottom-2 bg-primary text-white px-6 rounded-xl font-bold hover:bg-secondary transition-all">
                        Cari
                    </button>
                </div>
            </form>
        </div>

        <!-- Articles Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($artikels as $artikel)
            <article class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 flex flex-col h-full">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset('storage/' . $artikel->thumbnail) }}" alt="{{ $artikel->judul }}" class="w-full h-full object-cover">
                    <div class="absolute top-4 left-4">
                        <span class="bg-primary/90 backdrop-blur-md text-white px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider">Berita</span>
                    </div>
                </div>
                <div class="p-8 flex flex-col flex-grow">
                    <div class="flex items-center text-gray-400 text-xs mb-4">
                        <i class="bi bi-calendar3 mr-2"></i> {{ $artikel->created_at->format('d M Y') }}
                        <span class="mx-2">•</span>
                        <i class="bi bi-person mr-2"></i> Admin
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4 hover:text-primary transition-colors">
                        <a href="{{ route('artikel.detail', $artikel->id) }}">{{ $artikel->judul }}</a>
                    </h2>
                    <p class="text-gray-600 mb-6 line-clamp-3 leading-relaxed">
                        {{ Str::limit(strip_tags($artikel->konten), 150) }}
                    </p>
                    <div class="mt-auto pt-6 border-t border-gray-50">
                        <a href="{{ route('artikel.detail', $artikel->id) }}" class="text-primary font-bold flex items-center gap-2 group">
                            Baca Selengkapnya
                            <i class="bi bi-arrow-right group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </article>
            @empty
            <div class="col-span-full text-center py-20">
                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6 text-gray-400">
                    <i class="bi bi-newspaper text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Belum ada artikel</h3>
                <p class="text-gray-500">Coba kata kunci lain atau periksa kembali nanti.</p>
                <a href="{{ route('artikel') }}" class="mt-6 inline-block text-primary font-bold">Lihat Semua Artikel</a>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection

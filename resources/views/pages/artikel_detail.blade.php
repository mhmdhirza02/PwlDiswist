@extends('layouts.landing')

@section('title', $artikel->judul . ' | Diswist Yogyakarta')

@section('content')
<div class="pt-24 pb-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="flex mb-8 text-sm font-medium text-gray-500" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2">
                <li><a href="/" class="hover:text-primary transition-colors">Beranda</a></li>
                <li class="flex items-center space-x-2">
                    <i class="bi bi-chevron-right text-xs"></i>
                    <a href="{{ route('artikel') }}" class="hover:text-primary transition-colors">Artikel</a>
                </li>
                <li class="flex items-center space-x-2">
                    <i class="bi bi-chevron-right text-xs"></i>
                    <span class="text-gray-900 line-clamp-1">{{ $artikel->judul }}</span>
                </li>
            </ol>
        </nav>

        <!-- Article Header -->
        <header class="mb-12">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6 leading-tight">
                {{ $artikel->judul }}
            </h1>
            <div class="flex items-center gap-6 text-gray-500 text-sm">
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-primary font-bold">
                        A
                    </div>
                    <span>Admin Diswist</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="bi bi-calendar3"></i>
                    <span>{{ $artikel->created_at->format('d F Y') }}</span>
                </div>
            </div>
        </header>

        <!-- Featured Image -->
        <div class="rounded-3xl overflow-hidden shadow-2xl mb-12 aspect-video">
            <img src="{{ asset('storage/' . $artikel->thumbnail) }}" alt="{{ $artikel->judul }}" class="w-full h-full object-cover">
        </div>

        <!-- content -->
        <article class="prose prose-lg max-w-none text-gray-700 leading-relaxed font-jakarta">
            {!! $artikel->konten !!}
        </article>

        <!-- Footer -->
        <div class="mt-16 pt-8 border-t border-gray-100 flex justify-end">
            <a href="{{ route('artikel') }}" class="text-primary font-bold hover:underline">
                <i class="bi bi-arrow-left mr-2"></i> Kembali ke Artikel
            </a>
        </div>
    </div>
</div>

<style>
    .prose p { margin-bottom: 1.5rem; }
    .prose h2 { font-weight: 800; font-size: 1.875rem; color: #111827; margin-top: 2.5rem; margin-bottom: 1.25rem; }
    .prose h3 { font-weight: 700; font-size: 1.5rem; color: #111827; margin-top: 2rem; margin-bottom: 1rem; }
</style>
@endsection

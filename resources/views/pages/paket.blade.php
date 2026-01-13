@extends('layouts.landing')

@section('title', 'Paket Wisata | Diswist Yogyakarta')

@section('content')
<!-- Hero Section -->
<div class="relative pt-32 pb-20 lg:pt-40 lg:pb-28 overflow-hidden">
    <div class="absolute top-0 inset-x-0 h-full bg-gradient-to-tr from-cyan-50 to-white -z-10"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight mb-6">
            Liburan Tanpa Ribet dengan <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-500 to-blue-600">Paket Spesial</span>
        </h1>
        <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto mb-10">
            Kami sediakan paket wisata lengkap untuk keluarga, pasangan, maupun solo traveler.
        </p>


    </div>
</div>

<!-- Packages List -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24">
    
    @php
        $styles = [
            ['bg' => 'bg-blue-50', 'icon' => 'bi-sun', 'color' => 'blue'],
            ['bg' => 'bg-amber-50', 'icon' => 'bi-compass', 'color' => 'amber'],
            ['bg' => 'bg-green-50', 'icon' => 'bi-people', 'color' => 'green'],
            ['bg' => 'bg-purple-50', 'icon' => 'bi-camera', 'color' => 'purple'],
        ];
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start">
        @foreach($packages as $pkg)
        @php
            $style = $styles[$loop->index % count($styles)];
        @endphp
        <div class="relative bg-white rounded-3xl p-8 border {{ $pkg->is_popular ? 'border-amber-400 shadow-2xl scale-105 z-10' : 'border-gray-100 shadow-lg' }} transition-all hover:translate-y-1">
            
            @if($pkg->is_popular)
                <div class="absolute top-0 right-0 bg-amber-400 text-white text-xs font-bold px-3 py-1 rounded-bl-xl rounded-tr-2xl uppercase tracking-wider">
                    Paling Laris
                </div>
            @endif

            <div class="w-14 h-14 rounded-2xl flex items-center justify-center {{ $style['bg'] }} text-{{ $style['color'] }}-600 text-2xl mb-6">
                <i class="bi {{ $style['icon'] }}"></i>
            </div>
            
            <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $pkg->name }}</h3>
            <p class="text-gray-500 mb-6 font-medium">{{ $pkg->duration }}</p>
            
            <div class="flex items-baseline mb-8">
                <span class="text-4xl font-extrabold text-gray-900 tracking-tight">{{ $pkg->price }}</span>
                <span class="text-gray-400 ml-2">/pax</span>
            </div>

            <ul class="space-y-4 mb-8">
                @if(is_array($pkg->features))
                    @foreach($pkg->features as $feature)
                    <li class="flex items-start">
                        <i class="bi bi-check-circle-fill text-green-500 mt-0.5 mr-3 flex-shrink-0"></i>
                        <span class="text-gray-600 text-sm">{{ $feature }}</span>
                    </li>
                    @endforeach
                @endif
            </ul>

            <a href="{{ route('booking.create', ['package' => $pkg->name, 'price' => $pkg->price]) }}" class="block text-center w-full py-4 px-6 rounded-xl font-bold text-sm transition-all {{ $pkg->is_popular ? 'bg-amber-500 hover:bg-amber-600 text-white shadow-lg shadow-amber-500/30' : 'bg-gray-50 hover:bg-gray-100 text-gray-900' }}">
                Pilih Paket Ini
            </a>
        </div>
        @endforeach
    </div>


</div>
@endsection

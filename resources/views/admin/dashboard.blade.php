@extends('admin.layouts.app')

@section('header', 'Dashboard Overview')

@section('content')

<!-- Welcome Banner -->
<div class="relative bg-gradient-to-r from-violet-600 to-indigo-600 rounded-3xl p-8 mb-10 overflow-hidden shadow-2xl">
    <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20"></div>
    <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
    
    <div class="relative z-10 text-white">
        <h1 class="text-3xl font-bold mb-2">Selamat Datang, {{ Auth::user()->name }}! 👋</h1>
        <p class="text-indigo-100 max-w-xl">
            Semoga hari Anda menyenangkan. Berikut adalah ringkasan performa platform Diswist hari ini.
        </p>
    </div>
</div>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6 mb-10">
    <!-- Card Wisata -->
    <div class="bg-white rounded-2xl p-6 shadow-lg shadow-indigo-50 border border-indigo-50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
        <div class="flex items-start justify-between mb-4">
            <div class="p-3 rounded-xl bg-blue-50 text-blue-600">
                <i class="bi bi-map-fill text-2xl"></i>
            </div>
            <div class="text-right">
                <p class="text-sm font-medium text-gray-500 mb-1">Total Wisata</p>
                <h3 class="text-3xl font-bold text-gray-800">{{ $wisata }}</h3>
            </div>
        </div>
        <div class="w-full bg-gray-100 rounded-full h-1.5">
            <div class="bg-blue-500 h-1.5 rounded-full" style="width: 70%"></div>
        </div>
    </div>

    <!-- Card Artikel -->
    <div class="bg-white rounded-2xl p-6 shadow-lg shadow-indigo-50 border border-indigo-50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
        <div class="flex items-start justify-between mb-4">
            <div class="p-3 rounded-xl bg-purple-50 text-purple-600">
                <i class="bi bi-file-text-fill text-2xl"></i>
            </div>
            <div class="text-right">
                <p class="text-sm font-medium text-gray-500 mb-1">Total Artikel</p>
                <h3 class="text-3xl font-bold text-gray-800">{{ $artikel }}</h3>
            </div>
        </div>
        <div class="w-full bg-gray-100 rounded-full h-1.5">
            <div class="bg-purple-500 h-1.5 rounded-full" style="width: 45%"></div>
        </div>
    </div>

    <!-- Card Admin -->
    <div class="bg-white rounded-2xl p-6 shadow-lg shadow-indigo-50 border border-indigo-50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
        <div class="flex items-start justify-between mb-4">
            <div class="p-3 rounded-xl bg-orange-50 text-orange-600">
                <i class="bi bi-people-fill text-2xl"></i>
            </div>
            <div class="text-right">
                <p class="text-sm font-medium text-gray-500 mb-1">Total Admin</p>
                <h3 class="text-3xl font-bold text-gray-800">{{ $admin }}</h3>
            </div>
        </div>
        <div class="w-full bg-gray-100 rounded-full h-1.5">
            <div class="bg-orange-500 h-1.5 rounded-full" style="width: 100%"></div>
        </div>
    </div>

    <!-- Card Users -->
    <div class="bg-white rounded-2xl p-6 shadow-lg shadow-indigo-50 border border-indigo-50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
        <div class="flex items-start justify-between mb-4">
            <div class="p-3 rounded-xl bg-pink-50 text-pink-600">
                <i class="bi bi-person-heart text-2xl"></i>
            </div>
            <div class="text-right">
                <p class="text-sm font-medium text-gray-500 mb-1">Total Pengguna</p>
                <h3 class="text-3xl font-bold text-gray-800">{{ $users_count }}</h3>
            </div>
        </div>
        <div class="w-full bg-gray-100 rounded-full h-1.5">
            <div class="bg-pink-500 h-1.5 rounded-full" style="width: {{ $users_count > 0 ? '100%' : '0%' }}"></div>
        </div>
    </div>
    
    <!-- Card Booking -->
    <div class="bg-white rounded-2xl p-6 shadow-lg shadow-indigo-50 border border-indigo-50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
        <div class="flex items-start justify-between mb-4">
            <div class="p-3 rounded-xl bg-green-50 text-green-600">
                <i class="bi bi-ticket-perforated-fill text-2xl"></i>
            </div>
            <div class="text-right">
                <p class="text-sm font-medium text-gray-500 mb-1">Booking Masuk</p>
                <h3 class="text-3xl font-bold text-gray-800">{{ $bookings_count }}</h3>
            </div>
        </div>
        <div class="w-full bg-gray-100 rounded-full h-1.5">
            <div class="bg-green-500 h-1.5 rounded-full" style="width: {{ $bookings_count > 0 ? '100%' : '0%' }}"></div>
        </div>
    </div>
</div>

<!-- Booking List -->
<div class="bg-white rounded-2xl p-8 shadow-lg shadow-indigo-50 border border-indigo-50">
    <div class="flex justify-between items-center mb-6">
        <h3 class="font-bold text-gray-800 text-lg">Booking Terbaru</h3>
        <a href="#" class="text-sm text-primary font-bold hover:underline">Lihat Semua</a>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="text-left text-xs font-bold text-gray-400 uppercase tracking-wider border-b border-gray-100">
                <tr>
                    <th class="pb-4">Nama Customer</th>
                    <th class="pb-4">Paket/Tujuan</th>
                    <th class="pb-4">Tanggal Trip</th>
                    <th class="pb-4">Total</th>
                    <th class="pb-4">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($recent_bookings as $booking)
                <tr>
                    <td class="py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 font-bold text-xs">
                                {{ substr($booking->name, 0, 1) }}
                            </div>
                            <div>
                                <p class="font-bold text-gray-800 text-sm">{{ $booking->name }}</p>
                                <p class="text-xs text-gray-400">{{ $booking->email }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="py-4 text-sm font-medium text-gray-600">{{ $booking->package_name }}</td>
                    <td class="py-4 text-sm text-gray-500">{{ $booking->travel_date }}</td>
                    <td class="py-4 text-sm font-bold text-gray-800">{{ $booking->total_price }}</td>
                    <td class="py-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-8 text-center text-gray-500">Belum ada booking masuk.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection

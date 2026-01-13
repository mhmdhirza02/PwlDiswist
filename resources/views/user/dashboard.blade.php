@extends('layouts.landing')

@section('title', 'Dashboard Saya | Diswist Yogyakarta')

@section('content')
<div class="pt-32 pb-20 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Welcome Section -->
        <div class="bg-white rounded-3xl shadow-lg p-8 mb-8 border border-gray-100 flex flex-col md:flex-row items-center justify-between">
            <div class="mb-4 md:mb-0">
                <h1 class="text-2xl font-bold text-gray-800">Halo, {{ Auth::user()->name }}! 👋</h1>
                <p class="text-gray-500">Selamat datang kembali di Diswist Yogyakarta.</p>
            </div>
            <div>
                <a href="{{ route('paket') }}" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-sm font-bold rounded-full text-white bg-primary hover:bg-secondary transition-all shadow-md hover:shadow-lg">
                    <i class="bi bi-plus-lg mr-2"></i> Buat Pesanan Baru
                </a>
            </div>
        </div>

        <!-- Dashboard Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <div class="text-gray-400 text-sm font-bold uppercase mb-2">Total Pesanan</div>
                <div class="text-3xl font-extrabold text-gray-800">{{ $bookings->count() }}</div>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <div class="text-gray-400 text-sm font-bold uppercase mb-2">Menunggu Pembayaran</div>
                <div class="text-3xl font-extrabold text-yellow-500">{{ $bookings->where('status', 'pending')->count() }}</div>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <div class="text-gray-400 text-sm font-bold uppercase mb-2">Pesanan Selesai</div>
                <div class="text-3xl font-extrabold text-green-500">{{ $bookings->where('status', 'confirmed')->count() }}</div>
            </div>
        </div>

        <!-- Bookings History -->
        <div class="bg-white rounded-3xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100">
                <h2 class="text-lg font-bold text-gray-800">Riwayat Pesanan Saya</h2>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">ID Booking</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Paket Wisata</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Tanggal Trip</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Total Harga</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($bookings as $booking)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#{{ $booking->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 font-bold">{{ $booking->package_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                <div class="flex items-center">
                                    <i class="bi bi-calendar-event mr-2 text-gray-400"></i>
                                    {{ $booking->travel_date }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-primary font-bold">{{ $booking->total_price }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($booking->status == 'pending')
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Menunggu
                                    </span>
                                @elseif($booking->status == 'confirmed')
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Sukses
                                    </span>
                                @else
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        Dibatalkan
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                @if($booking->status == 'pending')
                                    <a href="{{ route('user.pay', $booking->id) }}" class="text-blue-600 hover:text-blue-900 font-bold" onclick="return confirm('Apakah Anda yakin ingin melakukan pembayaran (simulasi)?')">Bayar Sekarang</a>
                                @else
                                    <a href="#" class="text-gray-400 cursor-not-allowed">Detail</a>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="bi bi-bag-x text-4xl text-gray-300 mb-3"></i>
                                    <p class="text-gray-500 font-medium">Belum ada riwayat pesanan.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.landing')

@section('title', 'Booking Paket | Diswist Yogyakarta')

@section('content')
<div class="relative pt-32 pb-20 lg:pt-40 lg:pb-28 overflow-hidden bg-gray-50 min-h-screen">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-cyan-500 px-8 py-6 text-white text-center">
                <h1 class="text-2xl font-bold mb-1">Formulir Pemesanan</h1>
                <p class="text-blue-100 text-sm">Lengkapi data diri Anda untuk melanjutkan pemesanan.</p>
            </div>

            <div class="p-8 md:p-10">
                <!-- Package Summary -->
                <div class="bg-blue-50 rounded-xl p-6 mb-8 flex flex-col md:flex-row justify-between items-center border border-blue-100">
                    <div>
                        <p class="text-sm text-gray-500 uppercase tracking-wide font-bold mb-1">Paket Pilihan</p>
                        <h3 class="text-xl font-bold text-gray-900">{{ $package ?? 'Paket Custom' }}</h3>
                    </div>
                    <div class="mt-4 md:mt-0 text-right">
                        <p class="text-sm text-gray-500 uppercase tracking-wide font-bold mb-1">Total Harga</p>
                        <h3 class="text-2xl font-extrabold text-primary">{{ $price ?? 'Hubungi Kami' }}</h3>
                    </div>
                </div>

                <form action="{{ route('booking.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="package_name" value="{{ $package ?? 'Paket Custom' }}">
                    <input type="hidden" name="total_price" value="{{ $price ?? '0' }}">
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" name="name" 
                                   value="{{ auth()->check() ? auth()->user()->name : '' }}"
                                   required class="w-full px-4 py-3 rounded-xl bg-gray-50 border-transparent focus:bg-white focus:border-primary focus:ring-0 transition-all font-medium" placeholder="Masukkan nama lengkap Anda">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Email</label>
                                <input type="email" name="email" 
                                       value="{{ auth()->check() ? auth()->user()->email : '' }}"
                                       required class="w-full px-4 py-3 rounded-xl bg-gray-50 border-transparent focus:bg-white focus:border-primary focus:ring-0 transition-all font-medium" placeholder="email@contoh.com">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Nomor WhatsApp</label>
                                <input type="tel" name="phone" required class="w-full px-4 py-3 rounded-xl bg-gray-50 border-transparent focus:bg-white focus:border-primary focus:ring-0 transition-all font-medium" placeholder="0812xxxx">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Keberangkatan</label>
                            <input type="date" name="date" required class="w-full px-4 py-3 rounded-xl bg-gray-50 border-transparent focus:bg-white focus:border-primary focus:ring-0 transition-all font-medium text-gray-700">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Metode Pembayaran</label>
                            <div class="grid grid-cols-2 gap-4">
                                <label class="cursor-pointer border-2 border-primary bg-blue-50/50 rounded-xl p-4 flex items-center gap-3 transition-all hover:bg-blue-50">
                                    <input type="radio" name="payment" value="transfer" checked class="text-primary focus:ring-primary">
                                    <span class="font-bold text-gray-800">Transfer Bank</span>
                                </label>
                                <label class="cursor-pointer border border-gray-200 rounded-xl p-4 flex items-center gap-3 transition-all hover:border-primary hover:bg-blue-50">
                                    <input type="radio" name="payment" value="qris" class="text-primary focus:ring-primary">
                                    <span class="font-bold text-gray-800">QRIS</span>
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="w-full py-4 rounded-xl bg-gradient-to-r from-primary to-secondary text-white font-bold text-lg shadow-lg shadow-blue-500/30 hover:shadow-xl transform hover:-translate-y-1 transition-all">
                            Konfirmasi Pemesanan
                        </button>
                        
                        <p class="text-center text-xs text-gray-400 mt-4">Data Anda aman bersama kami. Admin akan segera menghubungi via WhatsApp setelah pemesanan.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

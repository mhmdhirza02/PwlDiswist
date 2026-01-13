@extends('layouts.landing')

@section('title', 'Booking Berhasil | Diswist Yogyakarta')

@section('content')
<div class="relative min-h-screen flex items-center justify-center bg-gray-50 pt-20 pb-20">
    <div class="max-w-md w-full px-4 text-center">
        <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6 animate-bounce">
            <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        
        <h2 class="text-3xl font-extrabold text-gray-900 mb-4">Terima Kasih!</h2>
        <p class="text-gray-600 mb-8 text-lg">
            Pemesanan Anda telah kami terima. Tim kami akan segera menghubungi Anda melalui WhatsApp untuk konfirmasi dan panduan pembayaran.
        </p>

        <div class="space-y-4">
            <a href="/" class="block w-full py-3.5 rounded-xl bg-primary text-white font-bold shadow-lg shadow-blue-500/30 hover:bg-secondary transition-all">
                Kembali ke Beranda
            </a>
            <a href="{{ route('wisata') }}" class="block w-full py-3.5 rounded-xl bg-white border border-gray-200 text-gray-700 font-bold hover:bg-gray-50 transition-all">
                Lihat Destinasi Lain
            </a>
        </div>
    </div>
</div>
@endsection

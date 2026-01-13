@extends('layouts.landing')

@section('title', 'Daftar | Diswist Yogyakarta')

@section('content')
    <!-- Background Section -->
    <div class="relative min-h-screen bg-cover bg-center flex items-center justify-center pt-24 pb-12"
         style="background-image: url('/images/login-bg.jpg')">

        <!-- Premium Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-tr from-blue-900/90 via-blue-900/60 to-transparent"></div>

        <!-- Main Container -->
        <div class="relative z-10 w-full max-w-md px-4 animate-fade-in">
            
            <!-- Glass Card -->
            <div class="glass-card rounded-3xl p-8 md:p-10 mb-8" oncontextmenu="return false;">
                
                <!-- Header -->
                <div class="text-center mb-6">
                    <div class="flex justify-center mb-4">
                        <img src="{{ asset('images/logo-full.png') }}" alt="Diswist Logo" class="h-16 drop-shadow-md">
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Buat Akun Baru</h2>
                    <p class="text-gray-600 font-medium text-sm">Bergabunglah untuk menjelajahi Yogyakarta</p>
                </div>

                <!-- Error Notification -->
                @if ($errors->any())
                    <div class="mb-6 bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-r-lg text-sm shadow-sm">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form -->
                <form method="POST" action="{{ route('register') }}" class="space-y-4" autocomplete="off">
                    @csrf

                    <!-- Name Group -->
                    <div class="group">
                        <label for="name" class="block text-sm font-bold text-gray-700 mb-1 select-none">Nama Lengkap</label>
                        <input type="text" name="name" id="name" required placeholder="Nama Anda"
                               autocomplete="off" autocorrect="off" spellcheck="false"
                               class="block w-full px-4 py-3 border border-gray-200 rounded-xl bg-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                    </div>

                    <!-- Email Group -->
                    <div class="group">
                        <label for="email" class="block text-sm font-bold text-gray-700 mb-1 select-none">Email</label>
                        <input type="email" name="email" id="email" required placeholder="email@contoh.com"
                               autocomplete="off" autocorrect="off" spellcheck="false"
                               class="block w-full px-4 py-3 border border-gray-200 rounded-xl bg-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                    </div>

                    <!-- Password Group -->
                    <div class="group">
                        <label for="password" class="block text-sm font-bold text-gray-700 mb-1 select-none">Password</label>
                        <input type="password" name="password" id="password" required placeholder="Minimal 8 karakter"
                               autocomplete="new-password" autocorrect="off" spellcheck="false"
                               class="block w-full px-4 py-3 border border-gray-200 rounded-xl bg-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                    </div>
                    
                    <!-- Password Confirm Group -->
                    <div class="group">
                        <label for="password_confirmation" class="block text-sm font-bold text-gray-700 mb-1 select-none">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required placeholder="Ulangi password"
                               autocomplete="new-password" autocorrect="off" spellcheck="false"
                               class="block w-full px-4 py-3 border border-gray-200 rounded-xl bg-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                    </div>

                    <!-- Action Button -->
                    <div class="pt-2">
                        <button type="submit" 
                                class="w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-xl text-white bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            Daftar Sekarang
                        </button>
                    </div>
                </form>

                <!-- Footer -->
                <div class="mt-6 text-center text-sm text-gray-600">
                    <p>Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-bold transition-colors">Masuk disini</a></p>
                </div>

            </div>
        </div>
    </div>

    <style>
        .glass-card {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.2);
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fadeIn 0.8s ease-out forwards;
        }
    </style>
@endsection

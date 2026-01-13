@extends('layouts.landing')

@section('title', 'Login | Diswist Yogyakarta')

@section('content')
    <!-- Background Section -->
    <div class="relative h-screen w-full overflow-hidden bg-cover bg-center flex items-center justify-center pt-24"
         style="background-image: url('/images/login-bg.jpg')">

        <!-- Premium Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-tr from-blue-900/90 via-blue-900/60 to-transparent"></div>

        <!-- Decorative Elements (Blobs) -->
        <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-cyan-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>

        <!-- Main Container -->
        <div class="relative z-10 w-full max-w-md px-4 animate-fade-in">
            
            <!-- Glass Card -->
            <div class="glass-card rounded-3xl p-8 md:p-10 mb-8" oncontextmenu="return false;">
                
                <!-- Header -->
                <div class="text-center mb-8">
                    <!-- Logo is already in Navbar, maybe just show Title here or keep logo for brand reinforcement? Keeping logo for focus. -->
                    <div class="flex justify-center mb-6">
                        <img src="{{ asset('images/logo-full.png') }}" alt="Diswist Logo" class="h-20 drop-shadow-md">
                    </div>
                    <p class="text-gray-600 font-medium">Masuk untuk mengelola Dashboard</p>
                </div>

                <!-- Error Notification -->
                @if(session('error'))
                    <div class="mb-6 bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-r-lg text-sm shadow-sm flex items-center gap-3" role="alert">
                        <i class="bi bi-exclamation-circle-fill text-xl"></i>
                        <div>
                            <p class="font-bold">Gagal Masuk</p>
                            <p>{{ session('error') }}</p>
                        </div>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-6 bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-r-lg text-sm shadow-sm" role="alert">
                        <div class="flex items-center gap-3 mb-1">
                            <i class="bi bi-exclamation-triangle-fill text-xl"></i>
                            <p class="font-bold">Perhatian</p>
                        </div>
                        <ul class="list-disc list-inside pl-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-6" autocomplete="off">
                    @csrf

                    <!-- Email Group -->
                    <div class="group">
                        <label for="email" class="block text-sm font-bold text-gray-700 mb-2 select-none">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-focus-within:text-blue-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>
                            <input type="email" name="email" id="email" 
                                   required
                                   autocomplete="off"
                                   autocorrect="off"
                                   spellcheck="false"
                                   placeholder="masukan email"
                                   class="block w-full pl-10 pr-3 py-3 border border-gray-200 rounded-xl leading-5 bg-white/50 text-gray-900 placeholder-gray-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out sm:text-sm">
                        </div>
                    </div>

                    <!-- Password Group -->
                    <div class="group">
                        <label for="password" class="block text-sm font-bold text-gray-700 mb-2 select-none">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-focus-within:text-blue-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input type="password" name="password" id="password"
                                   required
                                   autocomplete="new-password"
                                   autocorrect="off"
                                   spellcheck="false"
                                   placeholder="masukan password"
                                   class="block w-full pl-10 pr-3 py-3 border border-gray-200 rounded-xl leading-5 bg-white/50 text-gray-900 placeholder-gray-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out sm:text-sm">
                        </div>
                    </div>

                    <!-- Action Button -->
                    <div>
                        <button type="submit" 
                                class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-xl text-white bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-blue-100 group-hover:text-white transition-colors" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                            Masuk Sekarang
                        </button>
                    </div>
                </form>

                <!-- Footer Links -->
                <div class="mt-8 text-center text-xs text-gray-500">
                    <p class="mb-2">Belum punya akun? <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 font-bold transition-colors">Daftar disini</a></p>
                </div>
            </div>
        </div>
    </div>

    <style>
        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fadeIn 0.8s ease-out forwards;
        }
        
        /* Animation delay classes */
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
    </style>
@endsection

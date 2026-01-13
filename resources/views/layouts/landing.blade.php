<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo-icon.png') }}" type="image/png">
    <title>@yield('title', 'Diswist | Explore Yogyakarta')</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'Quicksand', 'sans-serif'],
                    },
                    colors: {
                        primary: '#3B82F6', // Blue-500
                        secondary: '#1E40AF', // Blue-800
                        accent: '#F59E0B', // Amber-500
                    }
                }
            }
        }
    </script>
    <style>
        .glass-nav {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(229, 231, 235, 0.5);
            transition: all 0.3s ease;
        }
        .hero-gradient {
            background: linear-gradient(180deg, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0.4) 100%);
        }
    </style>
</head>
<body class="font-sans text-gray-800 antialiased flex flex-col min-h-screen">

    <!-- Navbar -->
    <nav class="fixed w-full z-50 glass-nav py-2 shadow-lg top-0 transition-all duration-300">
        <div class="w-full max-w-full mx-auto px-6 md:px-12">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="/" class="flex items-center gap-3">
                        <img class="h-10 w-auto" src="{{ asset('images/logo-full.png') }}" alt="Diswist">
                    </a>
                </div>

                <!-- Right Side (Links & Buttons) -->
                <div class="flex items-center">
                    <!-- Navigation Links -->
                    <div class="hidden md:flex items-center space-x-6 mr-8">
                        <a href="/" class="{{ request()->is('/') ? 'bg-blue-50 text-primary font-bold shadow-sm' : 'text-gray-600 hover:text-primary hover:bg-gray-50' }} px-4 py-2 rounded-full text-sm transition-all duration-200">
                            Beranda
                        </a>
                        <a href="{{ route('wisata') }}" class="{{ request()->routeIs('wisata*') ? 'bg-blue-50 text-primary font-bold shadow-sm' : 'text-gray-600 hover:text-primary hover:bg-gray-50' }} px-4 py-2 rounded-full text-sm transition-all duration-200">
                            Wisata
                        </a>
                        <a href="{{ route('hotel') }}" class="{{ request()->routeIs('hotel*') ? 'bg-blue-50 text-primary font-bold shadow-sm' : 'text-gray-600 hover:text-primary hover:bg-gray-50' }} px-4 py-2 rounded-full text-sm transition-all duration-200">
                            Hotel
                        </a>
                        <a href="{{ route('kuliner') }}" class="{{ request()->routeIs('kuliner*') ? 'bg-blue-50 text-primary font-bold shadow-sm' : 'text-gray-600 hover:text-primary hover:bg-gray-50' }} px-4 py-2 rounded-full text-sm transition-all duration-200">
                            Kuliner
                        </a>
                        <a href="{{ route('paket') }}" class="{{ request()->routeIs('paket*') ? 'bg-blue-50 text-primary font-bold shadow-sm' : 'text-gray-600 hover:text-primary hover:bg-gray-50' }} px-4 py-2 rounded-full text-sm transition-all duration-200">
                            Paket
                        </a>
                        <a href="{{ route('artikel') }}" class="{{ request()->routeIs('artikel*') ? 'bg-blue-50 text-primary font-bold shadow-sm' : 'text-gray-600 hover:text-primary hover:bg-gray-50' }} px-4 py-2 rounded-full text-sm transition-all duration-200">
                            Artikel
                        </a>
                    </div>

                    <!-- Auth Buttons -->
                    <div class="hidden md:flex items-center gap-3">
                        @auth
                            <a href="{{ auth()->user()->role == 'admin' ? '/admin' : route('user.dashboard') }}" class="bg-primary hover:bg-secondary text-white px-5 py-2.5 rounded-full text-sm font-bold shadow-lg shadow-blue-500/30 transition-all transform hover:-translate-y-0.5">
                                Dashboard
                            </a>
                            <a href="{{ route('logout') }}" class="bg-white border border-red-100 text-red-500 hover:bg-red-50 px-5 py-2.5 rounded-full text-sm font-bold transition-all transform hover:-translate-y-0.5">
                                Keluar
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="flex items-center gap-2 bg-primary hover:bg-secondary text-white px-6 py-2.5 rounded-full text-sm font-bold shadow-lg shadow-blue-500/30 transition-all transform hover:-translate-y-0.5">
                                <i class="bi bi-box-arrow-in-right text-lg"></i>
                                <span>Masuk</span>
                            </a>
                        @endauth
                    </div>

                    <!-- Mobile Toggle -->
                    <div class="md:hidden flex items-center">
                        <button id="mobile-menu-btn" class="text-gray-500 hover:text-gray-900 focus:outline-none">
                            <i class="bi bi-list text-2xl"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu Panel -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100">
            <div class="px-4 pt-2 pb-4 space-y-1">
                <a href="/" class="block text-primary font-bold px-3 py-2 rounded-md text-base">Beranda</a>
                <a href="{{ route('wisata') }}" class="block text-gray-600 hover:text-primary hover:bg-gray-50 px-3 py-2 rounded-md text-base font-medium">Wisata</a>
                <a href="{{ route('hotel') }}" class="block text-gray-600 hover:text-primary hover:bg-gray-50 px-3 py-2 rounded-md text-base font-medium">Hotel</a>
                <a href="{{ route('kuliner') }}" class="block text-gray-600 hover:text-primary hover:bg-gray-50 px-3 py-2 rounded-md text-base font-medium">Kuliner</a>
                <a href="{{ route('paket') }}" class="block text-gray-600 hover:text-primary hover:bg-gray-50 px-3 py-2 rounded-md text-base font-medium">Paket</a>
                <a href="{{ route('artikel') }}" class="block text-gray-600 hover:text-primary hover:bg-gray-50 px-3 py-2 rounded-md text-base font-medium">Artikel</a>
                
                @auth
                    <a href="{{ auth()->user()->role == 'admin' ? '/admin' : route('user.dashboard') }}" class="block bg-primary text-white text-center rounded-lg px-3 py-2 mt-4 font-bold">Dashboard</a>
                    <a href="{{ route('logout') }}" class="block bg-red-50 text-red-500 border border-red-100 text-center rounded-lg px-3 py-2 mt-2 font-bold">Keluar</a>
                @else
                    <a href="{{ route('login') }}" class="block w-full bg-primary text-white text-center rounded-lg px-3 py-2 mt-4 font-bold">Masuk</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    @if(!request()->routeIs('login') && !request()->routeIs('register'))
    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                <!-- Brand -->
                <div class="col-span-1 md:col-span-1">
                    <div class="flex items-center gap-2 mb-4">
                        <img src="{{ asset('images/logo-icon.png') }}" class="h-8 w-auto brightness-0 invert" alt="Logo">
                        <span class="text-xl font-bold tracking-tight">Diswist</span>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed mb-6">
                        Platform perjalanan terpercaya untuk mengeksplorasi keindahan Yogyakarta dengan mudah dan nyaman.
                    </p>
                </div>

                <!-- Links -->
                <div>
                    <h3 class="text-white font-bold mb-4">Tautan Cepat</h3>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="/" class="hover:text-white transition-colors">Beranda</a></li>
                        <li><a href="{{ route('wisata') }}" class="hover:text-white transition-colors">Destinasi Wisata</a></li>
                        <li><a href="{{ route('hotel') }}" class="hover:text-white transition-colors">Hotel & Penginapan</a></li>
                        <li><a href="{{ route('kuliner') }}" class="hover:text-white transition-colors">Kuliner Khas</a></li>
                        <li><a href="{{ route('artikel') }}" class="hover:text-white transition-colors">Artikel & Berita</a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div>
                    <h3 class="text-white font-bold mb-4">Dukungan</h3>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Pusat Bantuan</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Syarat & Ketentuan</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Kebijakan Privasi</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Kontak Kami</a></li>
                    </ul>
                </div>

                <!-- Social -->
                <div>
                    <h3 class="text-white font-bold mb-4">Media Sosial</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-primary transition-colors text-white">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-primary transition-colors text-white">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-primary transition-colors text-white">
                            <i class="bi bi-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
                <p>&copy; 2026 Diswist Yogyakarta. All rights reserved.</p>
                <!-- Links Removed -->
            </div>
        </div>
    </footer>
    @endif

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <script>
        // Mobile menu toggle
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>

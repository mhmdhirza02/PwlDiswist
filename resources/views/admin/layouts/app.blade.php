<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Diswist</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        primary: '#2563eb', // Blue 600
                        secondary: '#4f46e5', // Indigo 600
                        dark: '#1e293b',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-slate-50 text-slate-800 font-sans antialiased selection:bg-primary selection:text-white">

    <div class="flex h-screen w-full overflow-hidden">

        <!-- SIDEBAR -->
        <aside
            class="w-64 bg-slate-900 text-white flex flex-col transition-all duration-300 z-20 hidden md:flex shrink-0">
            <!-- Brand -->
            <div class="h-16 flex items-center px-6 border-b border-white/10 bg-slate-950">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-primary flex items-center justify-center text-white shadow-sm">
                        <i class="bi bi-geo-alt-fill text-sm"></i>
                    </div>
                    <span class="text-lg font-bold">Diswist<span class="text-primary">Admin</span></span>
                </div>
            </div>

            <!-- Nav -->
            <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
                <p class="px-3 text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 mt-2">Menu</p>

                <a href="/admin"
                    class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->is('admin') ? 'bg-primary text-white' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <i class="bi bi-grid-fill w-6"></i>
                    <span>Dashboard</span>
                </a>

                <a href="/admin/wisata"
                    class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->is('admin/wisata*') ? 'bg-primary text-white' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <i class="bi bi-map-fill w-6"></i>
                    <span>Destinasi Wisata</span>
                </a>

                <a href="/admin/hotel"
                    class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->is('admin/hotel*') ? 'bg-primary text-white' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <i class="bi bi-building-fill w-6"></i>
                    <span>Hotel & Penginapan</span>
                </a>

                <a href="/admin/kuliner"
                    class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->is('admin/kuliner*') ? 'bg-primary text-white' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <i class="bi bi-egg-fried w-6"></i>
                    <span>Kuliner</span>
                </a>

                <a href="/admin/paket"
                    class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->is('admin/paket*') ? 'bg-primary text-white' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <i class="bi bi-calendar-check-fill w-6"></i>
                    <span>Paket Wisata</span>
                </a>

                <a href="/admin/artikel"
                    class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->is('admin/artikel*') ? 'bg-primary text-white' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <i class="bi bi-file-text-fill w-6"></i>
                    <span>Artikel & Berita</span>
                </a>
            </nav>

            <!-- User Profile (Bottom Sidebar) -->
            <div class="p-4 border-t border-white/10">
                <div class="flex items-center gap-3 p-2 rounded-lg bg-white/5">
                    <div
                        class="w-8 h-8 rounded-full bg-slate-700 flex items-center justify-center text-white text-xs font-bold">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs font-bold text-white truncate">{{ Auth::user()->name }}</p>
                        <p class="text-[10px] text-slate-500 truncate">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- CONTENT AREA -->
        <div class="flex-1 flex flex-col h-screen overflow-hidden">

            <!-- Header -->
            <header
                class="h-16 bg-white border-b border-slate-200 z-10 flex items-center justify-between px-6 shrink-0">
                <h2 class="text-base font-bold text-slate-800">
                    @yield('header', 'Overview')
                </h2>

                <div class="flex items-center gap-4">
                    <a href="{{ route('logout') }}"
                        class="flex items-center gap-2 text-xs font-bold text-red-500 hover:bg-red-50 px-3 py-2 rounded-lg border border-red-100 transition-colors">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </header>

            <!-- Main Scrollable Content -->
            <main class="flex-1 overflow-auto p-6">
                <div class="max-w-6xl mx-auto">
                    @if(session('success'))
                        <div
                            class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm font-bold flex items-center gap-2">
                            <i class="bi bi-check-circle-fill"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg text-sm font-medium">
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </main>
        </div>

    </div>

    @stack('scripts')
</body>

</html>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - RencanaLiburan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800">

    <!-- Navbar -->
    <nav class="bg-[#0F172A] sticky top-0 z-50 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <a href="{{ url('/dashboard') }}" class="flex items-center gap-2">
                    <div class="w-9 h-9 rounded-xl bg-white/10 border border-white/20 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#38BDF8]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.5 19.5l16-7-16-7 4.5 7-4.5 7z" />
                        </svg>
                    </div>
                    <span class="text-white font-bold text-lg">Rencana<span class="text-[#38BDF8]">Liburan</span></span>
                </a>

                <div class="hidden md:flex items-center gap-8 text-sm font-medium text-sky-100/80">
                    <a href="{{ url('/dashboard') }}" class="text-white border-b-2 border-[#38BDF8] pb-1">Dashboard</a>
                    <a href="{{ url('/dashboard#destinations') }}" class="hover:text-white transition-colors duration-200">Destinasi</a>
                    <a href="{{ route('wishlist') }}" class="hover:text-white transition-colors duration-200">Wishlist</a>
                    <a href="#" class="hover:text-white transition-colors duration-200">Trip Saya</a>
                </div>

                <div class="flex items-center gap-3">
                    <button class="hidden sm:flex items-center justify-center w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.4-1.4A2 2 0 0 1 18 14.2V11a6 6 0 1 0-12 0v3.2c0 .53-.21 1.04-.6 1.4L4 17h5m6 0v1a3 3 0 1 1-6 0v-1m6 0H9" />
                        </svg>
                    </button>
                    <div class="w-9 h-9 rounded-full bg-[#38BDF8] flex items-center justify-center text-[#0F172A] font-bold text-sm">
                        T
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-[#0F172A] via-[#1E3A8A] to-[#38BDF8] overflow-hidden">
        <div class="absolute -top-16 -left-16 w-72 h-72 bg-[#38BDF8]/40 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-20 -right-10 w-80 h-80 bg-[#1E3A8A]/50 rounded-full blur-3xl"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
            <p class="text-[#38BDF8] font-semibold text-sm md:text-base mb-3 tracking-wide">
                Welcome back, Traveller!
            </p>
            <h1 class="text-3xl md:text-5xl font-extrabold text-white leading-tight max-w-2xl">
                Discover Your Next Adventure
            </h1>
            <p class="text-sky-100/80 mt-4 max-w-xl text-sm md:text-base">
                Jelajahi destinasi impianmu, susun rencana perjalanan, dan wujudkan liburan terbaik bersama RencanaLiburan.
            </p>
            <!-- Search Bar -->
            <div class="mt-8 max-w-xl">
                <form action="{{ route('destinations.search') }}" method="GET">
                    <div class="flex items-center bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl overflow-hidden shadow-xl focus-within:ring-2 focus-within:ring-[#38BDF8] transition-all duration-200">
                        <div class="pl-5 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-sky-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <circle cx="11" cy="11" r="8" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35" />
                            </svg>
                        </div>
                        <input
                            type="text"
                            name="q"
                            placeholder="Cari destinasi, kota, atau negara..."
                            value="{{ old('q', $q ?? request('q')) }}"
                            class="flex-1 bg-transparent text-white placeholder-sky-200/60 text-sm px-4 py-4 outline-none" />
                        <button
                            type="submit"
                            class="m-2 px-5 py-2.5 bg-[#38BDF8] hover:bg-sky-400 active:scale-95 text-[#0F172A] font-semibold text-sm rounded-xl transition-all duration-200 flex-shrink-0">
                            Cari
                        </button>
                    </div>
                </form>
                @if(isset($q) && $q !== '')
                <div class="mt-4 max-w-xl rounded-3xl bg-white/10 border border-white/20 p-4 text-slate-100 shadow-lg">
                    <p class="text-sm">Hasil pencarian untuk <span class="font-semibold text-white">"{{ $q }}"</span></p>
                    <p class="text-xs text-slate-300 mt-1">{{ $results->count() }} destinasi ditemukan.</p>
                </div>
                @endif
            </div>

            <a href="#destinations"
                class="mt-6 inline-flex items-center gap-2 bg-white text-[#0F172A] font-semibold px-6 py-3 rounded-xl shadow-lg hover:shadow-2xl hover:bg-[#38BDF8] hover:text-white hover:scale-105 active:scale-95 transition-all duration-200">
                Explore Destinations
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6l6 6-6 6" />
                </svg>
            </a>
        </div>
    </section>

    <!-- Statistics Cards -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 relative z-20">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">

            <!-- Wishlist Destinations -->
            <div class="bg-white rounded-2xl shadow-xl p-6 flex items-center gap-4 hover:-translate-y-1 hover:shadow-2xl transition-all duration-300">
                <div class="w-14 h-14 rounded-xl bg-[#38BDF8]/10 flex items-center justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-[#38BDF8]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21s-7.5-4.6-10-9.1C.5 8.1 2.4 4.5 6 4.1c2-.2 3.8.9 5 2.4 1.2-1.5 3-2.6 5-2.4 3.6.4 5.5 4 4 7.8C19.5 16.4 12 21 12 21z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-slate-500">Wishlist Destinations</p>
                    <p class="text-2xl font-bold text-[#0F172A]">12</p>
                </div>
            </div>

            <!-- Planned Trips -->
            <div class="bg-white rounded-2xl shadow-xl p-6 flex items-center gap-4 hover:-translate-y-1 hover:shadow-2xl transition-all duration-300">
                <div class="w-14 h-14 rounded-xl bg-[#1E3A8A]/10 flex items-center justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-[#1E3A8A]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <rect x="3" y="5" width="18" height="16" rx="2" />
                        <path stroke-linecap="round" d="M16 3v4M8 3v4M3 10h18" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-slate-500">Planned Trips</p>
                    <p class="text-2xl font-bold text-[#0F172A]">4</p>
                </div>
            </div>

            <!-- Total Budget -->
            <div class="bg-white rounded-2xl shadow-xl p-6 flex items-center gap-4 hover:-translate-y-1 hover:shadow-2xl transition-all duration-300">
                <div class="w-14 h-14 rounded-xl bg-[#0F172A]/10 flex items-center justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-[#0F172A]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 1v22M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-slate-500">Total Budget</p>
                    <p class="text-2xl font-bold text-[#0F172A]">Rp 24,5jt</p>
                </div>
            </div>

        </div>
    </section>

    <!-- Featured Destinations -->
    <section id="destinations" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 scroll-mt-24">
        <div class="flex items-end justify-between mb-8">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-[#0F172A]">Featured Destinations</h2>
                <p class="text-slate-500 text-sm mt-1">Pilihan destinasi terbaik untuk liburan impianmu</p>
            </div>
            <a href="#" class="hidden sm:inline-flex text-[#1E3A8A] font-semibold text-sm hover:text-[#38BDF8] transition-colors duration-200">
                Lihat Semua &rarr;
            </a>
        </div>

        @php
        $destinations = $results ?? [
        [
        'name' => 'Bali',
        'location' => 'Indonesia',
        'rating' => 4.8,
        'route' => 'bali',
        'image' => 'images/bali.jpg'
        ],
        [
        'name' => 'Raja Ampat',
        'location' => 'Indonesia',
        'rating' => 4.9,
        'route' => 'raja-ampat',
        'image' => 'images/raja-ampat.jpg'
        ],
        [
        'name' => 'Paris',
        'location' => 'Prancis',
        'rating' => 4.9,
        'route' => 'paris',
        'image' => 'images/paris.jpg'
        ],
        [
        'name' => 'Tokyo',
        'location' => 'Jepang',
        'rating' => 4.9,
        'route' => 'tokyo',
        'image' => 'images/tokyo.jpg'
        ]
        ];
        @endphp

        @if(isset($q) && $q !== '' && empty($destinations))
        <div class="rounded-3xl border border-slate-200 bg-white p-10 text-center text-slate-500 shadow-sm">
            <p class="text-lg font-semibold text-[#0F172A] mb-2">Tidak ada destinasi untuk "{{ $q }}"</p>
            <p class="text-sm">Coba kata kunci lain atau kembali melihat semua destinasi.</p>
        </div>
        @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            @foreach ($destinations as $destination)
            <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300">

                <!-- Image placeholder -->
                <div class="relative h-44 overflow-hidden">
                    <img
                        src="{{ asset($destination['image']) }}"
                        alt="{{ $destination['name'] }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <span class="absolute top-3 right-3 bg-white/90 text-[#0F172A] text-xs font-semibold px-2.5 py-1 rounded-full shadow-sm">
                        ★ {{ $destination['rating'] }}
                    </span>
                </div>

                <!-- Content -->
                <div class="p-5">
                    <h3 class="font-bold text-lg text-[#0F172A] group-hover:text-[#1E3A8A] transition-colors duration-200">
                        {{ $destination['name'] }}
                    </h3>
                    <p class="text-slate-500 text-sm mt-1 flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#38BDF8]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21s-6-5.2-6-10a6 6 0 1 1 12 0c0 4.8-6 10-6 10z" />
                            <circle cx="12" cy="11" r="2" />
                        </svg>
                        {{ $destination['location'] }}
                    </p>

                    <a href="{{ route($destination['route']) }}"
                        class="mt-4 block w-full py-2.5 rounded-xl bg-[#0F172A] text-white text-sm font-semibold text-center hover:bg-[#1E3A8A] transition">
                        View Details
                    </a>
                </div>
            </div>
            @endforeach

        </div>
        @endif
    </section>

    <!-- Footer -->
    <footer class="bg-[#0F172A] text-sky-100/70 mt-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

                <div>
                    <div class="flex items-center gap-2 mb-3">
                        <div class="w-9 h-9 rounded-xl bg-white/10 border border-white/20 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#38BDF8]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.5 19.5l16-7-16-7 4.5 7-4.5 7z" />
                            </svg>
                        </div>
                        <span class="text-white font-bold text-lg">Rencana<span class="text-[#38BDF8]">Liburan</span></span>
                    </div>
                    <p class="text-sm leading-relaxed">Plan Your Dream Journey. Temukan, rencanakan, dan wujudkan petualangan terbaikmu.</p>
                </div>

                <div>
                    <h4 class="text-white font-semibold mb-3 text-sm">Navigasi</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ url('/dashboard') }}" class="hover:text-[#38BDF8] transition-colors duration-200">Dashboard</a></li>
                        <li><a href="{{ url('/dashboard#destinations') }}" class="hover:text-[#38BDF8] transition-colors duration-200">Destinasi</a></li>
                        <li><a href="{{ route('wishlist') }}" class="hover:text-[#38BDF8] transition-colors duration-200">Wishlist</a></li>
                        <li><a href="#" class="hover:text-[#38BDF8] transition-colors duration-200">Trip Saya</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-semibold mb-3 text-sm">Bantuan</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-[#38BDF8] transition-colors duration-200">FAQ</a></li>
                        <li><a href="#" class="hover:text-[#38BDF8] transition-colors duration-200">Kontak Kami</a></li>
                        <li><a href="#" class="hover:text-[#38BDF8] transition-colors duration-200">Kebijakan Privasi</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-semibold mb-3 text-sm">Ikuti Kami</h4>
                    <div class="flex gap-3">
                        <a href="#" class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#38BDF8] hover:text-[#0F172A] transition-all duration-200">IG</a>
                        <a href="#" class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#38BDF8] hover:text-[#0F172A] transition-all duration-200">FB</a>
                        <a href="#" class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#38BDF8] hover:text-[#0F172A] transition-all duration-200">TW</a>
                    </div>
                </div>

            </div>

            <div class="border-t border-white/10 mt-10 pt-6 text-center text-xs text-sky-100/50">
                &copy; {{ date('Y') }} RencanaLiburan. Semua hak dilindungi.
            </div>
        </div>
    </footer>

</body>

</html>
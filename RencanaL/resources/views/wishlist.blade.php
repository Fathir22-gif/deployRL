<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist - RencanaLiburan</title>
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

    {{--
        Expecting a $wishlist collection/array of items, each shaped like:
        [
            'name' => 'Bali',
            'country' => 'Indonesia',
            'rating' => '4.8',
            'budget' => 'Rp 3.500.000',
            'description' => 'Short destination description...',
        ]
        If $wishlist is not passed from the controller, it defaults to an empty collection below
        so the empty state renders safely.
    --}}
    @php
    $wishlist = $wishlist ?? collect();
    @endphp

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
                    <a href="{{ url('/dashboard') }}" class="hover:text-white transition-colors duration-200">Dashboard</a>
                    <a href="{{ url('/dashboard#destinations') }}" class="...">
                        Destinasi
                    </a>
                    <a href="#" class="text-white border-b-2 border-[#38BDF8] pb-1">Wishlist</a>
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
    <section class="bg-gradient-to-br from-[#1E3A8A]/5 via-[#38BDF8]/10 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 md:py-16">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#1E3A8A] to-[#38BDF8] flex items-center justify-center shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 21s-7.5-4.6-10-9.1C.5 8.1 2.4 4.5 6 4.1c2-.2 3.8.9 5 2.4 1.2-1.5 3-2.6 5-2.4 3.6.4 5.5 4 4 7.8C19.5 16.4 12 21 12 21z" />
                    </svg>
                </div>
                <h1 class="text-3xl md:text-4xl font-extrabold text-[#0F172A]">My Wishlist</h1>
            </div>
            <p class="text-slate-500 mt-3 max-w-xl text-sm md:text-base">
                Simpan destinasi impianmu dan rencanakan perjalanan berikutnya.
            </p>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-6 relative z-10">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">

            <!-- Total Wishlist Destinations -->
            <div class="bg-white rounded-2xl shadow-xl p-6 flex items-center gap-4 hover:-translate-y-1 hover:shadow-2xl transition-all duration-300">
                <div class="w-14 h-14 rounded-xl bg-[#38BDF8]/10 flex items-center justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-[#38BDF8]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21s-7.5-4.6-10-9.1C.5 8.1 2.4 4.5 6 4.1c2-.2 3.8.9 5 2.4 1.2-1.5 3-2.6 5-2.4 3.6.4 5.5 4 4 7.8C19.5 16.4 12 21 12 21z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-slate-500">Total Wishlist Destinations</p>
                    <p class="text-2xl font-bold text-[#0F172A]">{{ count($wishlist) }}</p>
                </div>
            </div>

            <!-- Estimated Total Budget -->
            <div class="bg-white rounded-2xl shadow-xl p-6 flex items-center gap-4 hover:-translate-y-1 hover:shadow-2xl transition-all duration-300">
                <div class="w-14 h-14 rounded-xl bg-[#1E3A8A]/10 flex items-center justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-[#1E3A8A]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 1v22M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-slate-500">Estimated Total Budget</p>
                    <p class="text-2xl font-bold text-[#0F172A]">
                        @if (count($wishlist) > 0)
                        Rp {{ number_format(collect($wishlist)->sum(fn($item) => (int) preg_replace('/\D/', '', $item['budget'] ?? 0)), 0, ',', '.') }}
                        @else
                        Rp 0
                        @endif
                    </p>
                </div>
            </div>

            <!-- Countries Planned -->
            <div class="bg-white rounded-2xl shadow-xl p-6 flex items-center gap-4 hover:-translate-y-1 hover:shadow-2xl transition-all duration-300">
                <div class="w-14 h-14 rounded-xl bg-[#0F172A]/10 flex items-center justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-[#0F172A]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <circle cx="12" cy="12" r="9" />
                        <path stroke-linecap="round" d="M3 12h18M12 3c2.5 2.5 3.5 5.5 3.5 9s-1 6.5-3.5 9c-2.5-2.5-3.5-5.5-3.5-9s1-6.5 3.5-9z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-slate-500">Countries Planned</p>
                    <p class="text-2xl font-bold text-[#0F172A]">
                        {{ collect($wishlist)->pluck('country')->unique()->count() }}
                    </p>
                </div>
            </div>

        </div>
    </section>

    <!-- Wishlist Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

        @forelse ($wishlist as $index => $item)
        @if ($loop->first)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @endif

            <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col">

                <!-- Image -->
                <div class="relative h-48 bg-gradient-to-br from-[#1E3A8A] to-[#38BDF8] flex items-center justify-center overflow-hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-white/40 group-hover:scale-110 transition-transform duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16l5-5 4 4 5-6 4 5" />
                        <circle cx="8" cy="8" r="2" />
                    </svg>

                    <!-- Rating badge -->
                    <span class="absolute top-3 right-3 bg-white/90 text-[#0F172A] text-xs font-semibold px-2.5 py-1 rounded-full shadow-sm">
                        &#9733; {{ $item['rating'] }}
                    </span>

                    <!-- Filled heart / saved indicator -->
                    <button title="Tersimpan di Wishlist" class="absolute top-3 left-3 w-9 h-9 rounded-full bg-white/90 flex items-center justify-center shadow-sm hover:scale-110 transition-transform duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-500" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 21s-7.5-4.6-10-9.1C.5 8.1 2.4 4.5 6 4.1c2-.2 3.8.9 5 2.4 1.2-1.5 3-2.6 5-2.4 3.6.4 5.5 4 4 7.8C19.5 16.4 12 21 12 21z" />
                        </svg>
                    </button>
                </div>

                <!-- Content -->
                <div class="p-5 flex flex-col flex-1">
                    <div class="flex items-start justify-between gap-2">
                        <div>
                            <h3 class="font-bold text-lg text-[#0F172A] group-hover:text-[#1E3A8A] transition-colors duration-200">
                                {{ $item['name'] }}
                            </h3>
                            <p class="text-slate-500 text-sm mt-0.5 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#38BDF8]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21s-6-5.2-6-10a6 6 0 1 1 12 0c0 4.8-6 10-6 10z" />
                                    <circle cx="12" cy="11" r="2" />
                                </svg>
                                {{ $item['country'] }}
                            </p>
                        </div>
                    </div>

                    <p class="text-slate-500 text-sm mt-3 leading-relaxed flex-1">
                        {{ $item['description'] }}
                    </p>

                    <div class="flex items-center justify-between mt-4 mb-4">
                        <span class="text-sm text-slate-500">Estimasi Budget</span>
                        <span class="font-bold text-[#0F172A] text-sm">{{ $item['budget'] }}</span>
                    </div>

                    <div class="flex items-center gap-2">
                        <a href="{{ route($item['route']) }}"
                            class="flex-1 bg-[#0F172A] text-white py-3 rounded-xl text-center font-semibold hover:bg-[#1E3A8A] transition">
                            View Details
                        </a>
                        <form action="{{ route('wishlist.remove', $index) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="w-14 h-14 border rounded-xl flex items-center justify-center">
                                🗑️
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            @if ($loop->last)
        </div>
        @endif
        @empty

        <!-- Empty State -->
        <div class="flex flex-col items-center justify-center text-center py-16 px-4">
            <div class="w-32 h-32 rounded-full bg-[#38BDF8]/10 flex items-center justify-center mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-[#38BDF8]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21s-7.5-4.6-10-9.1C.5 8.1 2.4 4.5 6 4.1c2-.2 3.8.9 5 2.4 1.2-1.5 3-2.6 5-2.4 3.6.4 5.5 4 4 7.8C19.5 16.4 12 21 12 21z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold text-[#0F172A]">Belum ada destinasi favorit</h3>
            <p class="text-slate-500 text-sm mt-2 max-w-sm">
                Tambahkan destinasi ke wishlist untuk melihatnya di sini.
            </p>
            <a href="{{ url('/dashboard#destinations') }}" class="mt-6 inline-flex items-center gap-2 bg-gradient-to-r from-[#1E3A8A] to-[#38BDF8] text-white font-semibold px-6 py-3 rounded-xl shadow-lg hover:shadow-xl hover:scale-105 active:scale-95 transition-all duration-200">
                Jelajahi Destinasi
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6l6 6-6 6" />
                </svg>
            </a>
        </div>

        @endforelse

    </main>

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
                        <li><a href="{{ route('dashboard') }}#destinations" class="hover:text-white transition-colors duration-200">
                                Destinasi
                            </a></li>
                        <li><a href="#" class="hover:text-[#38BDF8] transition-colors duration-200">Wishlist</a></li>
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
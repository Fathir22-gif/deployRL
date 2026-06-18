<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

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
                    <a href="#" class="hover:text-white transition-colors duration-200">Destinasi</a>
                    <a href="#" class="text-white border-b-2 border-[#38BDF8] pb-1">Wishlist</a>
                    <a href="#" class="hover:text-white transition-colors duration-200">Trip Saya</a>
                </div>

                <div class="flex items-center gap-3">
                    <button class="hidden sm:flex items-center justify-center w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21s-7.5-4.6-10-9.1C.5 8.1 2.4 4.5 6 4.1c2-.2 3.8.9 5 2.4 1.2-1.5 3-2.6 5-2.4 3.6.4 5.5 4 4 7.8C19.5 16.4 12 21 12 21z" />
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
                Wishlist</p>
            <h1 class="text-3xl md:text-5xl font-extrabold text-white leading-tight max-w-2xl">
                Kumpulkan destinasi favoritmu di satu tempat</h1>
            <p class="text-sky-100/80 mt-4 max-w-xl text-sm md:text-base">
                Simpan destinasi impian dan rencanakan perjalanan lebih mudah dengan daftar wishlist yang personal.
            </p>
            <div class="mt-8 flex flex-col sm:flex-row items-start sm:items-center gap-4">
                <div class="bg-white/10 border border-white/20 rounded-2xl px-6 py-5 shadow-lg backdrop-blur-sm">
                    <p class="text-slate-200 text-sm">Total favorit</p>
                    <p class="text-3xl font-bold text-white">{{ $totalFavorites }}</p>
                </div>
                <a href="{{ url('/dashboard') }}" class="inline-flex items-center gap-2 bg-white text-[#0F172A] font-semibold px-6 py-3 rounded-xl shadow-lg hover:bg-[#38BDF8] hover:text-white transition-all duration-200">
                    Kembali ke Dashboard
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6l6 6-6 6" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Wishlist Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <div class="lg:col-span-3 space-y-8">
                <section class="bg-white rounded-3xl shadow-xl p-6">
                    <div class="flex items-center justify-between gap-4 mb-6">
                        <div>
                            <h2 class="text-2xl font-bold text-[#0F172A]">Favorit Destinasi</h2>
                            <p class="text-slate-500 text-sm mt-1">Destinasi yang ingin kamu simpan untuk liburan selanjutnya.</p>
                        </div>
                        <button class="inline-flex items-center gap-2 rounded-2xl bg-[#38BDF8] px-5 py-3 text-sm font-semibold text-[#0F172A] hover:bg-sky-400 transition-all duration-200">
                            Tambah ke Wishlist
                        </button>
                    </div>

                    <div class="grid grid-cols-1 gap-5">
                        @forelse ($wishlistItems as $item)
                            <div class="group rounded-3xl border border-slate-200 bg-white overflow-hidden shadow-sm transition-all duration-300 hover:shadow-lg">
                                <div class="relative h-56 overflow-hidden">
                                    <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                    <span class="absolute top-4 left-4 bg-white/90 text-[#0F172A] text-xs font-semibold px-3 py-1 rounded-full shadow-sm">
                                        {{ $item['location'] }}
                                    </span>
                                </div>
                                <div class="p-6">
                                    <div class="flex items-start justify-between gap-4">
                                        <div>
                                            <h3 class="text-xl font-bold text-[#0F172A]">{{ $item['name'] }}</h3>
                                            <p class="text-slate-500 text-sm mt-1">{{ $item['rating'] }} ★</p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <form action="{{ route('wishlist.remove', $item['route']) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex items-center justify-center rounded-2xl border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-50 transition-all duration-200">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <a href="{{ url($item['route']) }}" class="mt-5 inline-flex items-center gap-2 text-[#1E3A8A] font-semibold text-sm hover:text-[#38BDF8] transition-colors duration-200">
                                        Lihat Detail
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6l6 6-6 6" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="rounded-3xl border border-slate-200 bg-white p-10 text-center text-slate-500 shadow-sm">
                                <p class="text-lg font-semibold text-[#0F172A] mb-3">Wishlist kamu masih kosong</p>
                                <p class="text-sm">Kembali ke dashboard dan tambahkan destinasi favoritmu ke wishlist.</p>
                            </div>
                        @endforelse
                    </div>
                </section>
            </div>

            <aside class="space-y-5">
                <div class="bg-white rounded-3xl shadow-xl p-6">
                    <h3 class="text-lg font-bold text-[#0F172A] mb-4">Ringkasan Wishlist</h3>
                    <div class="space-y-4 text-sm text-slate-600">
                        <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                            <span>Lokasi Favorit</span>
                            <span class="font-semibold text-[#0F172A]">4 Destinasi</span>
                        </div>
                        <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                            <span>Negara</span>
                            <span class="font-semibold text-[#0F172A]">Indonesia, Prancis, Jepang</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span>Status</span>
                            <span class="font-semibold text-[#38BDF8]">Siap direncanakan</span>
                        </div>
                    </div>
                </div>

                <div class="bg-[#0F172A] rounded-3xl p-6 text-white shadow-xl">
                    <h3 class="text-lg font-bold mb-4">Tips Liburan</h3>
                    <ul class="space-y-3 text-sm text-slate-200">
                        <li class="flex gap-3 items-start">
                            <span class="mt-1 inline-flex h-2.5 w-2.5 rounded-full bg-[#38BDF8]"></span>
                            <span>Tambahkan destinasi yang sesuai dengan musim dan budget.</span>
                        </li>
                        <li class="flex gap-3 items-start">
                            <span class="mt-1 inline-flex h-2.5 w-2.5 rounded-full bg-[#38BDF8]"></span>
                            <span>Gunakan wishlist sebagai referensi sebelum memesan tiket atau hotel.</span>
                        </li>
                        <li class="flex gap-3 items-start">
                            <span class="mt-1 inline-flex h-2.5 w-2.5 rounded-full bg-[#38BDF8]"></span>
                            <span>Periksa penawaran promo untuk destinasi favoritmu lebih awal.</span>
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
    </main>

</body>

</html>

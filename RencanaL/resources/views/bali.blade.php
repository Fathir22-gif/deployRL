<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bali - RencanaLiburan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        @keyframes heartPop {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.4);
            }

            100% {
                transform: scale(1);
            }
        }

        .wishlist-btn:hover .wishlist-heart {
            animation: heartPop 0.4s ease-in-out;
            fill: #ef4444;
            stroke: #ef4444;
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
                    <a href="#" class="text-white border-b-2 border-[#38BDF8] pb-1">Destinasi</a>
                    <a href="{{ route('wishlist') }}" class="hover:text-white transition-colors duration-200">Wishlist</a>
                    <a href="#" class="hover:text-white transition-colors duration-200">Trip Saya</a>
                </div>

                <div class="flex items-center gap-3">
                    @include('components.theme-toggle')
                    <div class="w-9 h-9 rounded-full bg-[#38BDF8] flex items-center justify-center text-[#0F172A] font-bold text-sm">
                        T
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Image Section -->
    <section class="relative h-[60vh] md:h-[70vh] bg-gradient-to-br from-[#0F172A] via-[#1E3A8A] to-[#38BDF8] overflow-hidden">
        <img
            src="{{ asset('images/bali.jpg') }}"
            alt="Bali"
            class="absolute inset-0 w-full h-full object-cover" />
        <div class="absolute inset-0 bg-gradient-to-t from-[#0F172A] via-[#0F172A]/40 to-transparent"></div>

        <div class="absolute bottom-0 left-0 w-full px-4 sm:px-6 lg:px-8 pb-10">
            <div class="max-w-7xl mx-auto">
                <button onclick="window.history.back()" class="mb-5 inline-flex items-center gap-2 text-sm font-medium text-white/90 bg-white/10 hover:bg-white/20 border border-white/20 px-4 py-2 rounded-xl backdrop-blur-md transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 18l-6-6 6-6" />
                    </svg>
                    Back to Dashboard
                </button>

                <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
                    <div>
                        <h1 class="text-4xl md:text-6xl font-extrabold text-white drop-shadow-lg">Bali</h1>
                        <p class="text-sky-100/90 mt-2 flex items-center gap-1.5 text-sm md:text-base">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#38BDF8]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21s-6-5.2-6-10a6 6 0 1 1 12 0c0 4.8-6 10-6 10z" />
                                <circle cx="12" cy="11" r="2" />
                            </svg>
                            Bali, Indonesia
                        </p>
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="inline-flex items-center gap-1.5 bg-white/95 text-[#0F172A] font-semibold text-sm px-4 py-2 rounded-xl shadow-lg">
                            &#9733; 4.8<span class="text-slate-400 font-normal">/5</span>
                        </span>
                        <span class="inline-flex items-center gap-1.5 bg-[#38BDF8] text-[#0F172A] font-semibold text-sm px-4 py-2 rounded-xl shadow-lg">
                            Rp 3.500.000
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            <!-- Left Column -->
            <div class="lg:col-span-2 space-y-12">

                <!-- Description -->
                <section>
                    <h2 class="text-2xl font-bold text-[#0F172A] mb-4">Tentang Bali</h2>
                    <p class="text-slate-600 leading-relaxed text-sm md:text-base">
                        Bali merupakan salah satu destinasi wisata paling populer di Indonesia, dikenal dengan julukan
                        "Pulau Dewata" karena kekayaan budaya dan spiritualnya. Pulau ini menawarkan perpaduan sempurna
                        antara keindahan alam, mulai dari pantai berpasir putih seperti Kuta dan Seminyak, hingga tebing
                        dramatis di Uluwatu dan sawah berundak hijau di Ubud. Budaya Hindu Bali sangat kental terasa
                        melalui ribuan pura yang tersebar di seluruh pulau, upacara adat yang masih dilestarikan, serta
                        tarian tradisional seperti Tari Kecak dan Tari Barong. Bagi pecinta kuliner, Bali menawarkan
                        ragam hidangan khas seperti Babi Guling, Sate Lilit, Lawar, dan Nasi Campur Bali yang kaya rempah.
                        Dengan suasana yang ramah wisatawan, fasilitas wisata kelas dunia, serta pemandangan matahari
                        terbenam yang memukau, Bali menjadi destinasi sempurna baik untuk liburan keluarga, bulan madu,
                        maupun petualangan solo.
                    </p>
                </section>

                <!-- Tourist Attractions -->
                <section>
                    <h2 class="text-2xl font-bold text-[#0F172A] mb-5">Tempat Wisata Populer</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                        @php
                        $attractions = [
                        [
                        'name' => 'Tanah Lot',
                        'desc' => 'Pura ikonik di atas batu karang dengan panorama matahari terbenam terbaik.',
                        'image' => 'images/bali-gallery/tanahlot.jpg'
                        ],
                        [
                        'name' => 'Uluwatu Temple',
                        'desc' => 'Pura megah di tepi tebing dengan pertunjukan Tari Kecak setiap sore.',
                        'image' => 'images/bali-gallery/uluwatu.jpg'
                        ],
                        [
                        'name' => 'Kuta Beach',
                        'desc' => 'Pantai legendaris dengan ombak ideal untuk berselancar dan bersantai.',
                        'image' => 'images/bali-gallery/kutabeach.jpg'
                        ],
                        [
                        'name' => 'Nusa Penida',
                        'desc' => 'Pulau eksotis dengan tebing dramatis dan air laut sebiru kristal.',
                        'image' => 'images/bali-gallery/nusapenida.jpg'
                        ],
                        ];
                        @endphp

                        @foreach ($attractions as $attraction)
                        <div class="group bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                            <div class="h-48 overflow-hidden">
                                <img
                                    src="{{ asset($attraction['image']) }}"
                                    alt="{{ $attraction['name'] }}"
                                    class="w-full h-full object-cover">
                            </div>
                            <div class="p-4">
                                <h3 class="font-semibold text-[#0F172A] group-hover:text-[#1E3A8A] transition-colors duration-200">
                                    {{ $attraction['name'] }}
                                </h3>
                                <p class="text-slate-500 text-sm mt-1">{{ $attraction['desc'] }}</p>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </section>

                <!-- Photo Gallery -->
                <section>
                    <h2 class="text-2xl font-bold text-[#0F172A] mb-5">Galeri Foto</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                        @php
                        $gallery = [
                        'images/bali-gallery/bali1.jpg',
                        'images/bali-gallery/bali2.jpg',
                        'images/bali-gallery/bali3.jpg',
                        'images/bali-gallery/bali4.jpg',
                        'images/bali-gallery/bali5.jpg',
                        'images/bali-gallery/bali6.jpg',
                        ];
                        @endphp

                        @foreach($gallery as $image)
                        <div class="aspect-square rounded-2xl overflow-hidden shadow-md hover:shadow-xl hover:scale-[1.03] transition-all duration-300">
                            <img
                                src="{{ asset($image) }}"
                                alt="Bali"
                                class="w-full h-full object-cover">
                        </div>
                        @endforeach
                    </div>
                </section>

                <!-- Testimonials -->
                <section>
                    <h2 class="text-2xl font-bold text-[#0F172A] mb-5">Ulasan Wisatawan</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">

                        @php
                        $testimonials = [
                        ['name' => 'Dewi Anggraini', 'text' => 'Liburan paling berkesan! Pantainya indah dan budayanya sangat kental. Pasti akan kembali lagi ke Bali.'],
                        ['name' => 'Reza Pratama', 'text' => 'Uluwatu Temple saat sunset benar-benar luar biasa. Pelayanan dan fasilitas wisata di Bali sangat profesional.'],
                        ['name' => 'Maya Putri', 'text' => 'Nusa Penida adalah tempat tercantik yang pernah saya kunjungi. Sangat direkomendasikan untuk pecinta alam.'],
                        ];
                        @endphp

                        @foreach ($testimonials as $testimonial)
                        <div class="bg-white rounded-2xl shadow-md p-5 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-10 h-10 rounded-full bg-[#1E3A8A] text-white flex items-center justify-center font-semibold text-sm">
                                    {{ strtoupper(substr($testimonial['name'], 0, 1)) }}
                                </div>
                                <div>
                                    <p class="font-semibold text-[#0F172A] text-sm">{{ $testimonial['name'] }}</p>
                                    <p class="text-[#38BDF8] text-xs">&#9733;&#9733;&#9733;&#9733;&#9733;</p>
                                </div>
                            </div>
                            <p class="text-slate-500 text-sm leading-relaxed">"{{ $testimonial['text'] }}"</p>
                        </div>
                        @endforeach

                    </div>
                </section>

            </div>

            <!-- Right Column / Sidebar -->
            <aside class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-xl p-6 sticky top-24">
                    <h3 class="text-lg font-bold text-[#0F172A] mb-4">Ringkasan Destinasi</h3>

                    <div class="space-y-3 text-sm">
                        <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                            <span class="text-slate-500">Lokasi</span>
                            <span class="font-semibold text-[#0F172A]">Bali, Indonesia</span>
                        </div>
                        <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                            <span class="text-slate-500">Rating</span>
                            <span class="font-semibold text-[#0F172A]">&#9733; 4.8/5</span>
                        </div>
                        <div class="flex items-center justify-between pb-1">
                            <span class="text-slate-500">Estimasi Budget</span>
                            <span class="font-semibold text-[#0F172A]">Rp 3.500.000</span>
                        </div>
                    </div>

                    <form action="{{ route('wishlist.add') }}" method="POST">
                        @csrf

                        <input type="hidden" name="destination" value="bali">

                        <button
                            type="submit"
                            class="wishlist-btn mt-6 w-full py-3 rounded-xl bg-gradient-to-r from-[#1E3A8A] to-[#38BDF8] text-white font-semibold shadow-lg hover:shadow-xl hover:shadow-sky-400/40 hover:-translate-y-1 hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="wishlist-heart w-5 h-5"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 21s-7.5-4.6-10-9.1C.5 8.1 2.4 4.5 6 4.1c2-.2 3.8.9 5 2.4 1.2-1.5 3-2.6 5-2.4 3.6.4 5.5 4 4 7.8C19.5 16.4 12 21 12 21z" />
                            </svg>

                            <span>Add to Wishlist</span>
                        </button>
                    </form>

                    <button onclick="window.history.back()" class="mt-3 w-full py-3 rounded-xl border border-slate-200 text-[#0F172A] font-semibold hover:bg-slate-50 hover:border-[#1E3A8A]/30 transition-all duration-200">
                        Back to Dashboard
                    </button>
                </div>
            </aside>

        </div>
    </main>

    @include('components.comments')

    <!-- Footer -->
    <footer class="bg-[#0F172A] text-sky-100/70 mt-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-2">
                    <div class="w-9 h-9 rounded-xl bg-white/10 border border-white/20 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#38BDF8]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.5 19.5l16-7-16-7 4.5 7-4.5 7z" />
                        </svg>
                    </div>
                    <span class="text-white font-bold text-lg">Rencana<span class="text-[#38BDF8]">Liburan</span></span>
                </div>
                <p class="text-xs text-sky-100/50">&copy; {{ date('Y') }} RencanaLiburan. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>

    @include('components.chat-widget')
</body>

</html>

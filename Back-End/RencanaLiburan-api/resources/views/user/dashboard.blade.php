@extends('layouts.app')

@section('title', 'Dashboard')

@php
$destinations = [
['id' => 2, 'name' => 'Raja Ampat', 'location' => 'Papua Barat, Indonesia', 'image' => 'https://images.unsplash.com/photo-1573790387438-4da905039392?w=800&q=80', 'rating' => 4.9, 'price' => 'Rp 8.750.000'],
['id' => 4, 'name' => 'Santorini', 'location' => 'Yunani', 'image' => 'https://images.unsplash.com/photo-1570077188670-e3a8d69ac5ff?w=800&q=80', 'rating' => 4.9, 'price' => 'Rp 18.500.000'],
['id' => 6, 'name' => 'Labuan Bajo', 'location' => 'Nusa Tenggara Timur, Indonesia', 'image' => 'https://images.unsplash.com/photo-1518544866330-95a0c5fc54ff?w=800&q=80', 'rating' => 4.8, 'price' => 'Rp 6.900.000'],
['id' => 9, 'name' => 'Maldives', 'location' => 'Maladewa', 'image' => 'https://images.unsplash.com/photo-1514282401047-d79a71a590e8?w=800&q=80', 'rating' => 5.0, 'price' => 'Rp 25.000.000'],
];
@endphp

@section('content')

{{-- Hero Banner --}}
<section class="relative">
    <div class="relative h-[480px] md:h-[560px] overflow-hidden">
        <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=1600&q=80"
            alt="Hero" class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-indigo-900/70 via-purple-800/50 to-transparent"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex flex-col justify-center">
            <p class="text-white/80 font-medium mb-2 tracking-wide">Halo, Andi 👋</p>
            <h1 class="text-3xl md:text-5xl font-bold text-white max-w-2xl leading-tight mb-4">
                Liburan impianmu menanti. Mau kemana selanjutnya?
            </h1>
            <p class="text-white/85 max-w-xl mb-8">Jelajahi ribuan destinasi terbaik dari seluruh dunia dan susun rencana liburanmu dengan mudah.</p>

            {{-- Search bar --}}
            <div class="bg-white rounded-2xl shadow-2xl p-3 flex flex-col sm:flex-row items-stretch gap-3 max-w-2xl">
                <div class="flex items-center gap-3 flex-1 px-3">
                    <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
                    <input type="text" placeholder="Cari destinasi, kota, atau negara..." class="w-full py-2.5 text-sm focus:outline-none">
                </div>
                <a href="{{ route('destinations.index') }}" class="gradient-brand text-white font-semibold px-6 py-3 rounded-xl text-sm text-center hover:opacity-90 transition">
                    Cari Sekarang
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Quick Navigation --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 relative z-10">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <a href="{{ route('destinations.index') }}" class="bg-white rounded-2xl shadow-lg p-5 flex items-center gap-4 card-hover">
            <div class="w-12 h-12 rounded-xl gradient-brand flex items-center justify-center text-white">
                <i class="fa-solid fa-compass"></i>
            </div>
            <div>
                <p class="font-semibold text-gray-800 text-sm">Jelajahi</p>
                <p class="text-xs text-gray-500">Destinasi</p>
            </div>
        </a>
        <a href="{{ route('wishlist') }}" class="bg-white rounded-2xl shadow-lg p-5 flex items-center gap-4 card-hover">
            <div class="w-12 h-12 rounded-xl gradient-brand flex items-center justify-center text-white">
                <i class="fa-solid fa-heart"></i>
            </div>
            <div>
                <p class="font-semibold text-gray-800 text-sm">Wishlist</p>
                <p class="text-xs text-gray-500">3 tersimpan</p>
            </div>
        </a>
        <a href="#" class="bg-white rounded-2xl shadow-lg p-5 flex items-center gap-4 card-hover">
            <div class="w-12 h-12 rounded-xl gradient-brand flex items-center justify-center text-white">
                <i class="fa-solid fa-suitcase-rolling"></i>
            </div>
            <div>
                <p class="font-semibold text-gray-800 text-sm">Rencana</p>
                <p class="text-xs text-gray-500">Trip saya</p>
            </div>
        </a>
        <a href="#" class="bg-white rounded-2xl shadow-lg p-5 flex items-center gap-4 card-hover">
            <div class="w-12 h-12 rounded-xl gradient-brand flex items-center justify-center text-white">
                <i class="fa-solid fa-wallet"></i>
            </div>
            <div>
                <p class="font-semibold text-gray-800 text-sm">Anggaran</p>
                <p class="text-xs text-gray-500">Estimasi biaya</p>
            </div>
        </a>
    </div>
</section>

{{-- Featured Destinations --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Destinasi Unggulan</h2>
            <p class="text-gray-500 mt-1">Pilihan terbaik untuk liburan tak terlupakan</p>
        </div>
        <a href="{{ route('destinations.index') }}" class="hidden sm:inline-flex items-center gap-2 text-indigo-600 font-semibold text-sm hover:gap-3 transition-all">
            Lihat Semua <i class="fa-solid fa-arrow-right text-xs"></i>
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach ($destinations as $dest)
        <div class="bg-white rounded-2xl shadow-md overflow-hidden card-hover">
            <div class="relative h-44 overflow-hidden">
                <img src="{{ $dest['image'] }}" alt="{{ $dest['name'] }}" class="w-full h-full object-cover">
                <div class="absolute top-3 right-3 bg-white/90 backdrop-blur px-2.5 py-1 rounded-full text-xs font-semibold flex items-center gap-1">
                    <i class="fa-solid fa-star text-yellow-400"></i> {{ $dest['rating'] }}
                </div>
            </div>
            <div class="p-4">
                <h3 class="font-semibold text-gray-900">{{ $dest['name'] }}</h3>
                <p class="text-xs text-gray-500 flex items-center gap-1 mt-1">
                    <i class="fa-solid fa-location-dot"></i> {{ $dest['location'] }}
                </p>
                <div class="flex items-center justify-between mt-3">
                    <span class="text-sm font-bold gradient-text">{{ $dest['price'] }}</span>
                    <a href="{{ route('destinations.show', $dest['id']) }}" class="text-xs font-semibold text-indigo-600 hover:underline">Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- Promo Banner --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
    <div class="gradient-brand rounded-3xl overflow-hidden relative">
        <div class="grid md:grid-cols-2 items-center">
            <div class="p-10 md:p-14 text-white">
                <span class="bg-white/20 text-xs font-semibold px-3 py-1 rounded-full">Promo Spesial</span>
                <h3 class="text-2xl md:text-3xl font-bold mt-4 mb-3">Diskon hingga 25% untuk Destinasi Internasional</h3>
                <p class="text-white/80 mb-6">Wujudkan liburan ke luar negeri dengan harga lebih hemat. Penawaran terbatas!</p>
                <a href="{{ route('destinations.index') }}" class="inline-flex bg-white text-indigo-700 font-semibold px-6 py-3 rounded-xl text-sm hover:bg-indigo-50 transition">
                    Lihat Penawaran
                </a>
            </div>
            <div class="hidden md:block h-full">
                <img src="https://images.unsplash.com/photo-1539635278303-d4002c07eae3?w=900&q=80" class="w-full h-full object-cover" alt="Promo">
            </div>
        </div>
    </div>
</section>

@endsection
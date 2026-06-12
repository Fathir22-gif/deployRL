@extends('layouts.app')

@section('title', 'Destinasi')

@php
$destinations = [
['id' => 1, 'name' => 'Pantai Kuta', 'location' => 'Bali, Indonesia', 'image' => 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?w=800&q=80', 'rating' => 4.8, 'reviews' => 1240, 'price' => 'Rp 3.500.000', 'category' => 'Pantai'],
['id' => 2, 'name' => 'Raja Ampat', 'location' => 'Papua Barat, Indonesia', 'image' => 'https://images.unsplash.com/photo-1573790387438-4da905039392?w=800&q=80', 'rating' => 4.9, 'reviews' => 890, 'price' => 'Rp 8.750.000', 'category' => 'Pulau'],
['id' => 3, 'name' => 'Gunung Bromo', 'location' => 'Jawa Timur, Indonesia', 'image' => 'https://images.unsplash.com/photo-1554995207-c18c203602cb?w=800&q=80', 'rating' => 4.7, 'reviews' => 1560, 'price' => 'Rp 2.250.000', 'category' => 'Gunung'],
['id' => 4, 'name' => 'Santorini', 'location' => 'Yunani', 'image' => 'https://images.unsplash.com/photo-1570077188670-e3a8d69ac5ff?w=800&q=80', 'rating' => 4.9, 'reviews' => 2310, 'price' => 'Rp 18.500.000', 'category' => 'Internasional'],
['id' => 5, 'name' => 'Kyoto', 'location' => 'Jepang', 'image' => 'https://images.unsplash.com/photo-1545569341-9eb8b30979d9?w=800&q=80', 'rating' => 4.8, 'reviews' => 1980, 'price' => 'Rp 15.200.000', 'category' => 'Internasional'],
['id' => 6, 'name' => 'Labuan Bajo', 'location' => 'Nusa Tenggara Timur, Indonesia', 'image' => 'https://images.unsplash.com/photo-1518544866330-95a0c5fc54ff?w=800&q=80', 'rating' => 4.8, 'reviews' => 760, 'price' => 'Rp 6.900.000', 'category' => 'Pulau'],
['id' => 7, 'name' => 'Paris', 'location' => 'Prancis', 'image' => 'https://images.unsplash.com/photo-1502602898657-3e91760cbb34?w=800&q=80', 'rating' => 4.7, 'reviews' => 3120, 'price' => 'Rp 22.000.000', 'category' => 'Internasional'],
['id' => 8, 'name' => 'Danau Toba', 'location' => 'Sumatera Utara, Indonesia', 'image' => 'https://images.unsplash.com/photo-1601275712013-2e6a05f0e89d?w=800&q=80', 'rating' => 4.6, 'reviews' => 540, 'price' => 'Rp 2.800.000', 'category' => 'Danau'],
['id' => 9, 'name' => 'Maldives', 'location' => 'Maladewa', 'image' => 'https://images.unsplash.com/photo-1514282401047-d79a71a590e8?w=800&q=80', 'rating' => 5.0, 'reviews' => 1430, 'price' => 'Rp 25.000.000', 'category' => 'Internasional'],
['id' => 10, 'name' => 'Yogyakarta', 'location' => 'Jawa Tengah, Indonesia', 'image' => 'https://images.unsplash.com/photo-1596402184320-417e7178b2cd?w=800&q=80', 'rating' => 4.7, 'reviews' => 2010, 'price' => 'Rp 1.950.000', 'category' => 'Budaya'],
];
@endphp

@section('content')

{{-- Page Header --}}
<section class="gradient-brand">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 text-center">
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-3">Jelajahi Destinasi</h1>
        <p class="text-white/85 max-w-xl mx-auto">Temukan 10 destinasi wisata terbaik pilihan kami untuk liburan selanjutnya.</p>
    </div>
</section>

{{-- Filter Bar --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-7 relative z-10">
    <div class="bg-white rounded-2xl shadow-lg p-4 flex flex-col md:flex-row gap-3 items-stretch">
        <div class="flex items-center gap-3 flex-1 px-3 border border-gray-200 rounded-xl">
            <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
            <input type="text" placeholder="Cari nama destinasi atau lokasi..." class="w-full py-2.5 text-sm focus:outline-none">
        </div>
        <select class="border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-600 focus:outline-none">
            <option>Semua Kategori</option>
            <option>Pantai</option>
            <option>Gunung</option>
            <option>Pulau</option>
            <option>Internasional</option>
            <option>Budaya</option>
            <option>Danau</option>
        </select>
        <select class="border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-600 focus:outline-none">
            <option>Urutkan: Populer</option>
            <option>Rating Tertinggi</option>
            <option>Harga Terendah</option>
            <option>Harga Tertinggi</option>
        </select>
        <button class="gradient-brand text-white font-semibold px-6 py-2.5 rounded-xl text-sm hover:opacity-90 transition">
            Filter
        </button>
    </div>
</section>

{{-- Destinations Grid --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <p class="text-sm text-gray-500 mb-6">Menampilkan <span class="font-semibold text-gray-800">{{ count($destinations) }}</span> destinasi</p>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($destinations as $dest)
        <div class="bg-white rounded-2xl shadow-md overflow-hidden card-hover border border-gray-100">
            <div class="relative h-52 overflow-hidden">
                <img src="{{ $dest['image'] }}" alt="{{ $dest['name'] }}" class="w-full h-full object-cover">
                <div class="absolute top-3 left-3 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-semibold text-indigo-700">
                    {{ $dest['category'] }}
                </div>
                <button class="absolute top-3 right-3 w-9 h-9 bg-white/90 backdrop-blur rounded-full flex items-center justify-center text-gray-500 hover:text-red-500 transition">
                    <i class="fa-regular fa-heart"></i>
                </button>
            </div>
            <div class="p-5">
                <div class="flex items-start justify-between gap-2">
                    <h3 class="font-bold text-lg text-gray-900">{{ $dest['name'] }}</h3>
                    <div class="flex items-center gap-1 bg-yellow-50 px-2 py-1 rounded-lg shrink-0">
                        <i class="fa-solid fa-star text-yellow-400 text-xs"></i>
                        <span class="text-xs font-bold text-gray-700">{{ $dest['rating'] }}</span>
                    </div>
                </div>
                <p class="text-sm text-gray-500 flex items-center gap-1.5 mt-1.5">
                    <i class="fa-solid fa-location-dot text-indigo-500"></i> {{ $dest['location'] }}
                </p>
                <p class="text-xs text-gray-400 mt-1">{{ number_format($dest['reviews']) }} ulasan</p>

                <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-100">
                    <div>
                        <p class="text-xs text-gray-400">Mulai dari</p>
                        <p class="font-bold gradient-text text-lg">{{ $dest['price'] }}</p>
                    </div>
                    <a href="{{ route('destinations.show', $dest['id']) }}"
                        class="gradient-brand text-white text-sm font-semibold px-5 py-2.5 rounded-xl hover:opacity-90 transition">
                        Lihat Detail
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="flex justify-center items-center gap-2 mt-12">
        <button class="w-10 h-10 rounded-xl border border-gray-200 text-gray-400 flex items-center justify-center hover:bg-gray-50">
            <i class="fa-solid fa-chevron-left text-xs"></i>
        </button>
        <button class="w-10 h-10 rounded-xl gradient-brand text-white font-semibold flex items-center justify-center">1</button>
        <button class="w-10 h-10 rounded-xl border border-gray-200 text-gray-600 font-semibold flex items-center justify-center hover:bg-gray-50">2</button>
        <button class="w-10 h-10 rounded-xl border border-gray-200 text-gray-600 font-semibold flex items-center justify-center hover:bg-gray-50">3</button>
        <button class="w-10 h-10 rounded-xl border border-gray-200 text-gray-400 flex items-center justify-center hover:bg-gray-50">
            <i class="fa-solid fa-chevron-right text-xs"></i>
        </button>
    </div>
</section>

@endsection
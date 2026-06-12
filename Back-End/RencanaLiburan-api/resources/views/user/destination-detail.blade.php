@extends('layouts.app')

@section('title', $destination['name'] ?? 'Detail Destinasi')

@php
// Static sample data — in real app this comes from a controller via route model binding.
$destination = [
'id' => 2,
'name' => 'Raja Ampat',
'location' => 'Papua Barat, Indonesia',
'rating' => 4.9,
'reviews' => 890,
'category' => 'Pulau',
'description' => 'Raja Ampat adalah surga tersembunyi di ujung timur Indonesia yang menawarkan keindahan bawah laut terbaik di dunia. Dengan lebih dari 1.500 pulau kecil, formasi karang yang masih alami, serta keanekaragaman hayati laut tertinggi di planet ini, Raja Ampat menjadi destinasi impian bagi para penyelam dan pecinta alam. Nikmati pemandangan laguna biru kehijauan, tebing karst yang menjulang, dan kehidupan budaya masyarakat lokal yang ramah.',
'images' => [
'https://images.unsplash.com/photo-1573790387438-4da905039392?w=1200&q=80',
'https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=600&q=80',
'https://images.unsplash.com/photo-1546525848-3ce03ca516f6?w=600&q=80',
'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=600&q=80',
'https://images.unsplash.com/photo-1583212292454-1fe6229603b7?w=600&q=80',
],
'budget' => [
['label' => 'Tiket Pesawat (PP)', 'amount' => 'Rp 4.500.000', 'icon' => 'fa-plane'],
['label' => 'Penginapan (3 malam)', 'amount' => 'Rp 2.250.000', 'icon' => 'fa-bed'],
['label' => 'Transportasi Lokal & Kapal', 'amount' => 'Rp 1.200.000', 'icon' => 'fa-ship'],
['label' => 'Makan & Konsumsi', 'amount' => 'Rp 600.000', 'icon' => 'fa-utensils'],
['label' => 'Tiket Masuk & Aktivitas', 'amount' => 'Rp 200.000', 'icon' => 'fa-ticket'],
],
'total_budget' => 'Rp 8.750.000',
];

$testimonials = [
[
'name' => 'Sarah Wijaya',
'avatar' => 'https://i.pravatar.cc/100?img=47',
'rating' => 5,
'date' => 'Mei 2026',
'text' => 'Pengalaman terbaik dalam hidup saya! Air lautnya jernih banget dan terumbu karangnya masih sangat terjaga. Worth it banget untuk dikunjungi.',
],
[
'name' => 'Budi Santoso',
'avatar' => 'https://i.pravatar.cc/100?img=12',
'rating' => 5,
'date' => 'April 2026',
'text' => 'Pemandangannya luar biasa, cocok untuk healing dan menyelam. Penduduk lokalnya juga sangat ramah dan membantu selama perjalanan.',
],
[
'name' => 'Citra Lestari',
'avatar' => 'https://i.pravatar.cc/100?img=32',
'rating' => 4,
'date' => 'Maret 2026',
'text' => 'Tempatnya indah sekali, hanya saja akses transportasinya cukup menantang. Tapi semua usaha terbayar saat melihat pemandangannya.',
],
];
@endphp

@section('content')

{{-- Breadcrumb --}}
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6">
    <div class="flex items-center gap-2 text-sm text-gray-500">
        <a href="{{ route('dashboard') }}" class="hover:text-indigo-600">Dashboard</a>
        <i class="fa-solid fa-chevron-right text-xs"></i>
        <a href="{{ route('destinations.index') }}" class="hover:text-indigo-600">Destinasi</a>
        <i class="fa-solid fa-chevron-right text-xs"></i>
        <span class="text-gray-800 font-medium">{{ $destination['name'] }}</span>
    </div>
</div>

{{-- Image Gallery --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4">
    <div class="grid grid-cols-1 md:grid-cols-4 grid-rows-2 gap-3 h-[420px] rounded-3xl overflow-hidden">
        <div class="md:col-span-2 md:row-span-2 h-full">
            <img src="{{ $destination['images'][0] }}" class="w-full h-full object-cover" alt="{{ $destination['name'] }}">
        </div>
        <div class="h-full"><img src="{{ $destination['images'][1] }}" class="w-full h-full object-cover" alt="gallery"></div>
        <div class="h-full"><img src="{{ $destination['images'][2] }}" class="w-full h-full object-cover" alt="gallery"></div>
        <div class="h-full"><img src="{{ $destination['images'][3] }}" class="w-full h-full object-cover" alt="gallery"></div>
        <div class="h-full relative">
            <img src="{{ $destination['images'][4] }}" class="w-full h-full object-cover" alt="gallery">
            <div class="absolute inset-0 bg-black/40 flex items-center justify-center text-white font-semibold text-sm cursor-pointer hover:bg-black/50 transition">
                <i class="fa-solid fa-images mr-2"></i> +12 Foto
            </div>
        </div>
    </div>
</section>

{{-- Main Content --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 grid grid-cols-1 lg:grid-cols-3 gap-10">

    {{-- Left Column --}}
    <div class="lg:col-span-2 space-y-10">
        {{-- Header info --}}
        <div>
            <div class="flex items-center gap-2 mb-2">
                <span class="bg-indigo-50 text-indigo-700 text-xs font-semibold px-3 py-1 rounded-full">{{ $destination['category'] }}</span>
                <div class="flex items-center gap-1 text-sm">
                    <i class="fa-solid fa-star text-yellow-400"></i>
                    <span class="font-bold text-gray-800">{{ $destination['rating'] }}</span>
                    <span class="text-gray-400">({{ number_format($destination['reviews']) }} ulasan)</span>
                </div>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">{{ $destination['name'] }}</h1>
            <p class="text-gray-500 flex items-center gap-1.5">
                <i class="fa-solid fa-location-dot text-indigo-500"></i> {{ $destination['location'] }}
            </p>
        </div>

        {{-- Description --}}
        <div>
            <h2 class="text-xl font-bold text-gray-900 mb-3">Tentang Destinasi</h2>
            <p class="text-gray-600 leading-relaxed">{{ $destination['description'] }}</p>
        </div>

        {{-- Highlights --}}
        <div>
            <h2 class="text-xl font-bold text-gray-900 mb-4">Yang Bisa Dilakukan</h2>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                @foreach ([['fa-person-swimming','Snorkeling'], ['fa-camera','Fotografi'], ['fa-water','Island Hopping'], ['fa-sun','Bersantai']] as $activity)
                <div class="bg-gray-50 rounded-xl p-4 text-center hover:bg-indigo-50 transition">
                    <div class="w-10 h-10 gradient-brand rounded-full flex items-center justify-center text-white mx-auto mb-2">
                        <i class="fa-solid {{ $activity[0] }}"></i>
                    </div>
                    <p class="text-sm font-medium text-gray-700">{{ $activity[1] }}</p>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Testimonials --}}
        <div>
            <h2 class="text-xl font-bold text-gray-900 mb-4">Ulasan & Testimoni</h2>
            <div class="space-y-4">
                @foreach ($testimonials as $t)
                <div class="bg-gray-50 rounded-2xl p-5">
                    <div class="flex items-start gap-4">
                        <img src="{{ $t['avatar'] }}" alt="{{ $t['name'] }}" class="w-12 h-12 rounded-full object-cover">
                        <div class="flex-1">
                            <div class="flex items-center justify-between flex-wrap gap-2">
                                <h4 class="font-semibold text-gray-900">{{ $t['name'] }}</h4>
                                <span class="text-xs text-gray-400">{{ $t['date'] }}</span>
                            </div>
                            <div class="flex items-center gap-0.5 my-1">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fa-solid fa-star text-xs {{ $i <= $t['rating'] ? 'text-yellow-400' : 'text-gray-200' }}"></i>
                                    @endfor
                            </div>
                            <p class="text-sm text-gray-600 leading-relaxed">{{ $t['text'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Right Column - Sidebar --}}
    <div class="lg:col-span-1">
        <div class="bg-white border border-gray-100 rounded-2xl shadow-xl p-6 sticky top-24 space-y-6">
            {{-- Budget Estimation --}}
            <div>
                <h3 class="font-bold text-gray-900 mb-1">Estimasi Anggaran</h3>
                <p class="text-xs text-gray-400 mb-4">Per orang, untuk 3 hari 2 malam</p>

                <div class="space-y-3">
                    @foreach ($destination['budget'] as $item)
                    <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center gap-2 text-gray-600">
                            <i class="fa-solid {{ $item['icon'] }} text-indigo-500 w-4"></i>
                            {{ $item['label'] }}
                        </div>
                        <span class="font-medium text-gray-800">{{ $item['amount'] }}</span>
                    </div>
                    @endforeach
                </div>

                <div class="border-t border-gray-100 mt-4 pt-4 flex items-center justify-between">
                    <span class="font-semibold text-gray-900">Total Estimasi</span>
                    <span class="text-xl font-bold gradient-text">{{ $destination['total_budget'] }}</span>
                </div>
            </div>

            {{-- Add to Wishlist --}}
            <form action="#" method="POST">
                @csrf
                <button type="submit" class="w-full gradient-brand text-white font-semibold py-3.5 rounded-xl hover:opacity-90 transition shadow-lg shadow-indigo-200 flex items-center justify-center gap-2">
                    <i class="fa-regular fa-heart"></i> Tambah ke Wishlist
                </button>
            </form>

            <button class="w-full border border-gray-200 text-gray-700 font-semibold py-3.5 rounded-xl hover:bg-gray-50 transition flex items-center justify-center gap-2">
                <i class="fa-solid fa-share-nodes"></i> Bagikan Destinasi
            </button>
        </div>
    </div>
</section>

@endsection
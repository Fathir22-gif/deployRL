@extends('layouts.auth')

@section('title', 'Daftar')

@section('content')
<div class="min-h-screen flex">
    {{-- Left side image / brand --}}
    <div class="hidden lg:flex lg:w-1/2 relative gradient-brand items-center justify-center overflow-hidden">
        <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=1200&q=80"
            alt="Travel"
            class="absolute inset-0 w-full h-full object-cover opacity-30">
        <div class="relative z-10 text-center text-white px-12">
            <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-6">
                <i class="fa-solid fa-plane text-3xl"></i>
            </div>
            <h1 class="text-4xl font-bold mb-4">Mulai Petualanganmu</h1>
            <p class="text-lg text-white/90 max-w-md mx-auto">Buat akun gratis dan mulai susun wishlist destinasi favoritmu sekarang.</p>
        </div>
    </div>

    {{-- Right side form --}}
    <div class="w-full lg:w-1/2 flex items-center justify-center px-6 py-12">
        <div class="w-full max-w-md">
            <div class="lg:hidden flex items-center gap-2 mb-8 justify-center">
                <div class="w-9 h-9 gradient-brand rounded-lg flex items-center justify-center">
                    <i class="fa-solid fa-plane text-white text-sm"></i>
                </div>
                <span class="text-xl font-bold gradient-text">RencanaLiburan</span>
            </div>

            <h2 class="text-3xl font-bold text-gray-900 mb-2">Buat Akun Baru ✨</h2>
            <p class="text-gray-500 mb-8">Isi data dirimu untuk memulai perjalanan.</p>

            <form action="#" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">Nama Lengkap</label>
                    <div class="relative">
                        <i class="fa-regular fa-user absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input type="text" id="name" name="name" placeholder="Nama lengkap" required
                            class="input-focus w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl text-sm transition">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                    <div class="relative">
                        <i class="fa-regular fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input type="email" id="email" name="email" placeholder="nama@email.com" required
                            class="input-focus w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl text-sm transition">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                    <div class="relative">
                        <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input type="password" id="password" name="password" placeholder="••••••••" required
                            class="input-focus w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl text-sm transition">
                    </div>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1.5">Konfirmasi Password</label>
                    <div class="relative">
                        <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="••••••••" required
                            class="input-focus w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl text-sm transition">
                    </div>
                </div>

                <label class="flex items-start gap-2 text-sm text-gray-600">
                    <input type="checkbox" required class="mt-0.5 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    Saya menyetujui <a href="#" class="text-indigo-600 hover:underline">Syarat & Ketentuan</a> dan <a href="#" class="text-indigo-600 hover:underline">Kebijakan Privasi</a>
                </label>

                <button type="submit"
                    class="w-full gradient-brand text-white font-semibold py-3 rounded-xl hover:opacity-90 transition shadow-lg shadow-indigo-200">
                    Daftar Sekarang
                </button>
            </form>

            <p class="text-center text-sm text-gray-500 mt-8">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-indigo-600 font-semibold hover:underline">Masuk di sini</a>
            </p>
        </div>
    </div>
</div>
@endsection
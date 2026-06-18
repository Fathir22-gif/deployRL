<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atur Ulang Kata Sandi - RencanaLiburan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .bg-blob {
            position: absolute;
            border-radius: 9999px;
            filter: blur(80px);
            opacity: 0.45;
        }
    </style>
</head>

<body class="min-h-screen overflow-x-hidden relative bg-gradient-to-br from-[#0F172A] via-[#1E3A8A] to-[#38BDF8]">

    <!-- Decorative floating blobs -->
    <div class="bg-blob w-72 h-72 bg-[#38BDF8] top-[-4rem] left-[-4rem]"></div>

    <div class="bg-blob w-64 h-64 bg-[#38BDF8] top-1/3 right-10 hidden md:block"></div>

    <!-- Page wrapper -->
    <div class="relative z-10 flex items-center justify-center px-4 py-6">
        <div class="w-full max-w-md">

            <!-- Logo / Brand -->
            <div class="flex flex-col items-center mb-4">
                <div class="flex items-center justify-center w-16 h-16 rounded-2xl bg-white/10 border border-white/20 backdrop-blur-md shadow-lg mb-4 transition-transform duration-300 hover:scale-110 hover:rotate-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-[#38BDF8]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.5 19.5l16-7-16-7 4.5 7-4.5 7z" />
                    </svg>
                </div>
                <h1 class="text-3xl font-extrabold text-white tracking-tight">
                    Rencana<span class="text-[#38BDF8]">Liburan</span>
                </h1>
                <p class="text-sky-100/80 text-sm mt-1 tracking-wide">Plan Your Dream Journey</p>
            </div>

            <!-- Glassmorphism Card -->
            <div class="backdrop-blur-xl bg-white/10 border border-white/20 rounded-3xl shadow-2xl px-8 py-7 transition-all duration-300 hover:shadow-[0_20px_60px_-10px_rgba(56,189,248,0.35)]">

                <div class="mb-7 text-center">
                    <h2 class="text-2xl font-bold text-white">Atur Ulang Kata Sandi</h2>
                    <p class="text-sky-100/70 text-sm mt-1">Buat kata sandi baru untuk akunmu</p>
                </div>

                @if ($errors->any())
                <div class="mb-5 rounded-xl bg-red-500/15 border border-red-400/40 text-red-100 text-sm px-4 py-3">
                    {{ $errors->first() }}
                </div>
                @endif

                <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-sky-100 mb-1.5">Alamat Email</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-sky-200/70">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 0 0 2.22 0L21 8M5 19h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2z" />
                                </svg>
                            </span>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email', $request->email) }}"
                                required
                                autofocus
                                autocomplete="username"
                                placeholder="nama@email.com"
                                class="w-full pl-11 pr-4 py-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-sky-200/50 focus:outline-none focus:ring-2 focus:ring-[#38BDF8] focus:border-[#38BDF8] transition-all duration-200">
                        </div>
                        @error('email')
                        <p class="text-red-300 text-xs mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Baru -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-sky-100 mb-1.5">Password Baru</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-sky-200/70">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm6-2v3a6 6 0 1 1-12 0V9a6 6 0 1 1 12 0z" />
                                    <rect x="5" y="11" width="14" height="9" rx="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="new-password"
                                placeholder="••••••••"
                                class="w-full pl-11 pr-4 py-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-sky-200/50 focus:outline-none focus:ring-2 focus:ring-[#38BDF8] focus:border-[#38BDF8] transition-all duration-200">
                        </div>
                        @error('password')
                        <p class="text-red-300 text-xs mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Konfirmasi Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-sky-100 mb-1.5">Konfirmasi Password</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-sky-200/70">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm6-2v3a6 6 0 1 1-12 0V9a6 6 0 1 1 12 0z" />
                                    <rect x="5" y="11" width="14" height="9" rx="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                placeholder="••••••••"
                                class="w-full pl-11 pr-4 py-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-sky-200/50 focus:outline-none focus:ring-2 focus:ring-[#38BDF8] focus:border-[#38BDF8] transition-all duration-200">
                        </div>
                        @error('password_confirmation')
                        <p class="text-red-300 text-xs mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="w-full py-3 rounded-xl bg-gradient-to-r from-[#1E3A8A] to-[#38BDF8] text-white font-semibold shadow-lg shadow-sky-900/30 hover:shadow-xl hover:shadow-sky-400/30 hover:scale-[1.02] active:scale-[0.98] transition-all duration-200">
                        Simpan Kata Sandi Baru
                    </button>
                </form>
            </div>

            <!-- Footer -->
            <p class="text-center text-xs text-sky-100/50 mt-4">
                &copy; {{ date('Y') }} RencanaLiburan. Semua hak dilindungi.
            </p>
        </div>
    </div>
</body>

</html>
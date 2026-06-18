<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email - RencanaLiburan</title>
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

                <!-- Big Email Icon -->
                <div class="flex justify-center mb-5">
                    <div class="flex items-center justify-center w-20 h-20 rounded-full bg-[#38BDF8]/15 border border-[#38BDF8]/30">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-[#38BDF8]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 0 0 2.22 0L21 8M5 19h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2z" />
                        </svg>
                    </div>
                </div>

                <div class="mb-6 text-center">
                    <h2 class="text-2xl font-bold text-white">Verifikasi Email</h2>
                    <p class="text-sky-100/70 text-sm mt-2 leading-relaxed">
                        Terima kasih telah mendaftar! Sebelum mulai menjelajah, silakan verifikasi alamat email kamu
                        dengan mengklik tautan yang sudah kami kirimkan. Belum menerima emailnya? Kami akan dengan
                        senang hati mengirimkan ulang.
                    </p>
                </div>

                @if (session('status') == 'verification-link-sent')
                <div class="mb-5 rounded-xl bg-emerald-500/15 border border-emerald-400/40 text-emerald-100 text-sm px-4 py-3">
                    Tautan verifikasi baru telah dikirim ke alamat email yang kamu daftarkan.
                </div>
                @endif

                <div class="flex flex-col gap-3">
                    <!-- Resend Verification Email -->
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button
                            type="submit"
                            class="w-full py-3 rounded-xl bg-gradient-to-r from-[#1E3A8A] to-[#38BDF8] text-white font-semibold shadow-lg shadow-sky-900/30 hover:shadow-xl hover:shadow-sky-400/30 hover:scale-[1.02] active:scale-[0.98] transition-all duration-200">
                            Kirim Ulang Email Verifikasi
                        </button>
                    </form>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            type="submit"
                            class="w-full py-3 rounded-xl bg-white/10 border border-white/20 text-sky-100 font-semibold hover:bg-white/20 hover:text-white transition-all duration-200">
                            Keluar
                        </button>
                    </form>
                </div>
            </div>

            <!-- Footer -->
            <p class="text-center text-xs text-sky-100/50 mt-4">
                &copy; {{ date('Y') }} RencanaLiburan. Semua hak dilindungi.
            </p>
        </div>
    </div>
</body>

</html>
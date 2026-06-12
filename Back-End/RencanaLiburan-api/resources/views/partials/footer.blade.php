<footer class="bg-gray-900 text-gray-300 mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-9 h-9 gradient-brand rounded-lg flex items-center justify-center">
                        <i class="fa-solid fa-plane text-white text-sm"></i>
                    </div>
                    <span class="text-xl font-bold text-white">RencanaLiburan</span>
                </div>
                <p class="text-sm text-gray-400">Rencanakan liburan impianmu bersama kami. Temukan destinasi terbaik, simpan ke wishlist, dan wujudkan perjalananmu.</p>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-3">Navigasi</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="{{ route('dashboard') }}" class="hover:text-white transition">Dashboard</a></li>
                    <li><a href="{{ route('destinations.index') }}" class="hover:text-white transition">Destinasi</a></li>
                    <li><a href="{{ route('wishlist') }}" class="hover:text-white transition">Wishlist</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-3">Bantuan</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="#" class="hover:text-white transition">Pusat Bantuan</a></li>
                    <li><a href="#" class="hover:text-white transition">Syarat & Ketentuan</a></li>
                    <li><a href="#" class="hover:text-white transition">Kebijakan Privasi</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-3">Ikuti Kami</h4>
                <div class="flex gap-3">
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:gradient-brand transition"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:gradient-brand transition"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:gradient-brand transition"><i class="fa-brands fa-twitter"></i></a>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-800 mt-8 pt-6 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} RencanaLiburan. All rights reserved.
        </div>
    </div>
</footer>
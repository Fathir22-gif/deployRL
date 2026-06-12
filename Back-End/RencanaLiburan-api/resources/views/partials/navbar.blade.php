<nav class="bg-white/90 backdrop-blur-md sticky top-0 z-50 shadow-sm border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                <div class="w-9 h-9 gradient-brand rounded-lg flex items-center justify-center">
                    <i class="fa-solid fa-plane text-white text-sm"></i>
                </div>
                <span class="text-xl font-bold gradient-text">RencanaLiburan</span>
            </a>

            <div class="hidden md:flex items-center gap-8 text-sm font-medium text-gray-600">
                <a href="{{ route('dashboard') }}" class="hover:text-indigo-600 transition {{ request()->routeIs('dashboard') ? 'text-indigo-600 font-semibold' : '' }}">Dashboard</a>
                <a href="{{ route('destinations.index') }}" class="hover:text-indigo-600 transition {{ request()->routeIs('destinations.*') ? 'text-indigo-600 font-semibold' : '' }}">Destinasi</a>
                <a href="{{ route('wishlist') }}" class="hover:text-indigo-600 transition {{ request()->routeIs('wishlist') ? 'text-indigo-600 font-semibold' : '' }}">Wishlist</a>
            </div>

            <div class="hidden md:flex items-center gap-3">
                <a href="{{ route('wishlist') }}" class="relative text-gray-500 hover:text-indigo-600 transition">
                    <i class="fa-regular fa-heart text-lg"></i>
                    <span class="absolute -top-2 -right-2 bg-purple-600 text-white text-[10px] rounded-full w-4 h-4 flex items-center justify-center">3</span>
                </a>
                <div class="flex items-center gap-2 pl-3 border-l border-gray-200">
                    <div class="w-9 h-9 rounded-full gradient-brand flex items-center justify-center text-white font-semibold text-sm">A</div>
                    <span class="text-sm font-medium text-gray-700">Andi</span>
                </div>
                <a href="{{ route('login') }}" class="text-sm font-medium text-gray-500 hover:text-red-500 transition" title="Logout">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </a>
            </div>

            <button id="mobileMenuBtn" class="md:hidden text-gray-600 text-xl">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </div>

    <div id="mobileMenu" class="hidden md:hidden border-t border-gray-100 bg-white">
        <div class="px-4 py-3 space-y-2 text-sm font-medium text-gray-600">
            <a href="{{ route('dashboard') }}" class="block py-2 hover:text-indigo-600">Dashboard</a>
            <a href="{{ route('destinations.index') }}" class="block py-2 hover:text-indigo-600">Destinasi</a>
            <a href="{{ route('wishlist') }}" class="block py-2 hover:text-indigo-600">Wishlist</a>
            <a href="{{ route('login') }}" class="block py-2 text-red-500">Logout</a>
        </div>
    </div>
</nav>

<script>
    document.getElementById('mobileMenuBtn')?.addEventListener('click', function() {
        document.getElementById('mobileMenu').classList.toggle('hidden');
    });
</script>
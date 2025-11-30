<nav class="w-full bg-white shadow-sm border-b border-gray-200 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 h-14 flex items-center justify-between">

        <!-- LEFT: Logo + Title -->
        <div class="flex items-center gap-3">
            <!-- Logo oval -->
            <div class="w-10 h-6 rounded-full bg-lumina-primary"></div>

            <!-- App Name -->
            <div class="text-xl font-bold text-lumina-secondary tracking-wide">
                LuminaSnap
            </div>
        </div>

<!-- AUTH BUTTON -->
<div class="ml-4">

    @guest
        <a href="{{ route('login') }}"
           class="text-sm text-gray-600 hover:text-lumina-primary transition">
            Login
        </a>
    @endguest

    @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="text-sm text-gray-600 hover:text-lumina-primary transition">
                Logout
            </button>
        </form>
    @endauth

</div>


    </div>
</nav>

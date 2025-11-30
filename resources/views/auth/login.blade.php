<x-guest-layout>

<!-- BACK BUTTON -->
<a href="{{ url()->previous() }}"
   class="absolute top-4 left-4 text-gray-500 hover:text-lumina-primary 
          flex items-center gap-1 text-sm transition">
    ← Back
</a>

<div class="min-h-screen flex items-center justify-center bg-gray-50 px-4">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8 
                border border-gray-100 animate-fade-in">

        <!-- LOGO -->
        <div class="flex justify-center mb-6">
            <div class="w-12 h-8 bg-lumina-primary rounded-full"></div>
        </div>

        <h1 class="text-2xl font-bold text-center text-lumina-secondary mb-6">
            Login to LuminaSnap
        </h1>

        @include('auth.partials.login-form')

        <!-- Divider -->
        <div class="text-center text-gray-400 my-4 text-sm">— or —</div>

        <!-- Register -->
        <p class="text-center text-sm">
            Don't have an account?
            <a href="{{ route('register') }}"
               class="text-lumina-primary font-semibold hover:underline">
               Sign up
            </a>
        </p>

    </div>

</div>

</x-guest-layout>

<x-guest-layout>

<div class="min-h-screen flex items-center justify-center bg-gray-50 px-4">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8 
                border border-gray-100 animate-fade-in">

        <!-- LOGO -->
        <div class="flex justify-center mb-6">
            <div class="w-12 h-8 bg-lumina-primary rounded-full"></div>
        </div>

        <!-- TITLE -->
        <h1 class="text-2xl font-bold text-center text-lumina-secondary mb-4">
            Forgot Your Password?
        </h1>

        <!-- Description -->
        <p class="text-sm text-gray-600 text-center mb-6 leading-relaxed">
            No worries! Enter your email and we’ll send you a link to reset your password.
        </p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- FORM -->
        <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <x-input-label for="email" value="Email" class="text-gray-700 font-medium" />
                <x-text-input id="email" type="email" name="email"
                    class="mt-1 block w-full rounded-lg border-gray-300
                           focus:ring-lumina-primary focus:border-lumina-primary"
                    :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm" />
            </div>

            <button
                class="w-full mt-2 py-3 bg-lumina-primary text-white font-semibold rounded-lg
                       hover:brightness-110 active:scale-95 transition">
                Send Reset Link
            </button>
        </form>

        <!-- Divider -->
        <div class="text-center text-gray-400 my-5 text-sm">— or —</div>

        <!-- Back to Login -->
        <p class="text-center text-sm">
            Remember your password?
            <a href="{{ route('login') }}" class="text-lumina-primary font-semibold hover:underline">
                Log in
            </a>
        </p>

    </div>

</div>

</x-guest-layout>

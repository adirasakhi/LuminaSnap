<x-guest-layout>

<div class="min-h-screen flex items-center justify-center bg-gray-50 px-4">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8 
                border border-gray-100 animate-fade-in">

        <!-- LOGO -->
        <div class="flex justify-center mb-6">
            <div class="w-12 h-8 bg-lumina-primary rounded-full"></div>
        </div>

        <h1 class="text-2xl font-bold text-center text-lumina-secondary mb-6">
            Reset Your Password
        </h1>

        <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
            @csrf

            <!-- TOKEN -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email -->
            <div>
                <x-input-label for="email" value="Email" class="text-gray-700 font-medium" />
                <x-text-input id="email" name="email" type="email"
                    class="mt-1 block w-full rounded-lg border-gray-300
                           focus:ring-lumina-primary focus:border-lumina-primary"
                    required autofocus autocomplete="username"
                    :value="old('email', $request->email)" />
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm" />
            </div>

            <!-- New Password -->
            <div>
                <x-input-label for="password" value="New Password" class="text-gray-700 font-medium" />
                <x-text-input id="password" name="password" type="password"
                    class="mt-1 block w-full rounded-lg border-gray-300
                           focus:ring-lumina-primary focus:border-lumina-primary"
                    required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" value="Confirm Password" class="text-gray-700 font-medium" />
                <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                    class="mt-1 block w-full rounded-lg border-gray-300
                           focus:ring-lumina-primary focus:border-lumina-primary"
                    required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-sm" />
            </div>

            <!-- Button -->
            <button
                class="w-full mt-2 py-3 bg-lumina-primary text-white font-semibold rounded-lg
                       hover:brightness-110 active:scale-95 transition">
                Reset Password
            </button>

        </form>

        <!-- Divider -->
        <div class="text-center text-gray-400 my-4 text-sm">— or —</div>

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

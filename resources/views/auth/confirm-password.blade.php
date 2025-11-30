<x-guest-layout>

<div class="min-h-screen flex items-center justify-center bg-gray-50 px-4">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8 
                border border-gray-100 animate-fade-in">

        <!-- LOGO -->
        <div class="flex justify-center mb-6">
            <div class="w-12 h-8 bg-lumina-primary rounded-full"></div>
        </div>

        <h1 class="text-2xl font-bold text-center text-lumina-secondary mb-4">
            Confirm Your Password
        </h1>

        <p class="text-sm text-gray-600 text-center mb-6 leading-relaxed">
            This is a secure step. Please enter your password before continuing.
        </p>

        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
            @csrf

            <!-- Password -->
            <div>
                <x-input-label for="password" value="Password" class="text-gray-700 font-medium" />
                <x-text-input id="password" name="password" type="password"
                    class="mt-1 block w-full rounded-lg border-gray-300
                           focus:ring-lumina-primary focus:border-lumina-primary"
                    required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm" />
            </div>

            <button
                class="w-full py-3 bg-lumina-primary text-white font-semibold rounded-lg
                       hover:brightness-110 active:scale-95 transition">
                Confirm Password
            </button>
        </form>

        <!-- Back to Settings or previous -->
        <p class="text-center text-sm mt-6">
            <a href="{{ url()->previous() }}" class="text-gray-500 hover:text-lumina-primary">
                ← Go back
            </a>
        </p>

    </div>

</div>

</x-guest-layout>

<x-guest-layout>
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
            Create Your Account
        </h1>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- NAME -->
            <div>
                <x-input-label for="name" :value="__('Name')" class="text-gray-700 font-medium"/>
                <x-text-input id="name" type="text" name="name"
                    class="mt-1 block w-full rounded-lg border-gray-300
                           focus:ring-lumina-primary focus:border-lumina-primary"
                    :value="old('name')" required autofocus autocomplete="name"/>
                <x-input-error :messages="$errors->get('name')" class="mt-1 text-sm"/>
            </div>

            <!-- EMAIL -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-medium"/>
                <x-text-input id="email" type="email" name="email"
                    class="mt-1 block w-full rounded-lg border-gray-300
                           focus:ring-lumina-primary focus:border-lumina-primary"
                    :value="old('email')" required autocomplete="username"/>
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm"/>
            </div>

            <!-- PASSWORD -->
            <div>
                <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-medium"/>
                <x-text-input id="password" type="password" name="password"
                    class="mt-1 block w-full rounded-lg border-gray-300
                           focus:ring-lumina-primary focus:border-lumina-primary"
                    required autocomplete="new-password"/>
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm"/>
            </div>

            <!-- CONFIRM PASSWORD -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700 font-medium"/>
                <x-text-input id="password_confirmation" type="password" name="password_confirmation"
                    class="mt-1 block w-full rounded-lg border-gray-300
                           focus:ring-lumina-primary focus:border-lumina-primary"
                    required autocomplete="new-password"/>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-sm"/>
            </div>

            <!-- BUTTON -->
            <button
                class="w-full mt-2 py-3 bg-lumina-primary text-white font-semibold rounded-lg
                       hover:brightness-110 active:scale-95 transition">
                Register
            </button>

        </form>

        <!-- Divider -->
        <div class="text-center text-gray-400 my-4 text-sm">— or —</div>

        <!-- LOGIN LINK -->
        <p class="text-center text-sm">
            Already have an account?
            <a href="{{ route('login') }}"
               class="text-lumina-primary font-semibold hover:underline">
               Log in
            </a>
        </p>

    </div>

</div>

</x-guest-layout>

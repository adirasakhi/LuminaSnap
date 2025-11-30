        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-medium"/>
                <x-text-input id="email" type="email" name="email"
                    class="mt-1 block w-full rounded-lg border-gray-300
                           focus:ring-lumina-primary focus:border-lumina-primary"
                    :value="old('email')" required autofocus autocomplete="username"/>
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm"/>
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-medium"/>
                <x-text-input id="password" type="password" name="password"
                    class="mt-1 block w-full rounded-lg border-gray-300
                           focus:ring-lumina-primary focus:border-lumina-primary"
                    required autocomplete="current-password"/>
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm"/>
            </div>

            <!-- Remember Me -->
            <label class="flex items-center gap-2 text-sm text-gray-600">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-lumina-primary focus:ring-lumina-primary"
                    name="remember">
                <span>Remember me</span>
            </label>

            <!-- Buttons -->
            <div class="flex items-center justify-between">

                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                   class="text-sm text-gray-500 hover:text-lumina-primary">
                    Forgot password?
                </a>
                @endif

                <button
                    class="px-6 py-2 bg-lumina-primary text-white rounded-lg font-semibold
                           hover:brightness-110 active:scale-95 transition">
                    Log In
                </button>
            </div>

        </form>
<x-guest-layout>

<div class="min-h-screen flex items-center justify-center bg-gray-50 px-4">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8 
                border border-gray-100 animate-fade-in">

        <!-- LOGO -->
        <div class="flex justify-center mb-6">
            <div class="w-12 h-8 bg-lumina-primary rounded-full"></div>
        </div>

        <!-- Title -->
        <h1 class="text-2xl font-bold text-center text-lumina-secondary mb-4">
            Verify Your Email
        </h1>

        <!-- Main Text -->
        <p class="text-sm text-gray-600 text-center leading-relaxed mb-6">
            Thanks for signing up!  
            Before you start using LuminaSnap, please check your inbox and verify your email address.
            If you didn’t receive the email, we can send you a new one.
        </p>

        <!-- Success Message -->
        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 p-3 rounded-lg bg-green-100 text-green-700 text-sm text-center">
                A new verification link has been sent to your email.
            </div>
        @endif

        <!-- ACTION BUTTONS -->
        <div class="flex flex-col gap-4 mt-6">

            <!-- Resend Link -->
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button
                    class="w-full py-3 bg-lumina-primary text-white font-semibold rounded-lg
                           hover:brightness-110 active:scale-95 transition">
                    Resend Verification Email
                </button>
            </form>

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    type="submit"
                    class="w-full text-sm text-gray-600 hover:text-lumina-primary transition">
                    Log Out
                </button>
            </form>

        </div>

    </div>

</div>

</x-guest-layout>

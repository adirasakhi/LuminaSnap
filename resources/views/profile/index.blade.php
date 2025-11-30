<x-app-layout>

    <div class="max-w-xl mx-auto pt-6 pb-28">

        <!-- HEADER PROFILE -->
        <div class="flex items-center gap-6 px-4 mb-6 animate-fade-in">

            <!-- Foto Profil -->
            <div class="relative w-20 h-20">
                <div class="w-full h-full rounded-full overflow-hidden shadow-md">
                    <img src="{{ $user->profile_photo 
                        ? asset('storage/' . $user->profile_photo) 
                        : 'https://via.placeholder.com/150' }}"
                        class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Nama + Bio -->
            <div class="flex-1">
                <h1 class="text-xl font-bold text-lumina-secondary">
                    {{ $user->name }}
                </h1>

                <p class="text-gray-600 text-sm mt-1 break-words">
                    {{ $user->bio ?? 'No bio yet.' }}
                </p>

                <!-- Stats -->
                <div class="flex gap-8 text-sm text-gray-700 mt-3">
                    <p>
                        <span class="font-bold">{{ $user->photos->count() }}</span> Posts
                    </p>
                    <p>
                        <span class="font-bold">{{ $user->followers->count() }}</span> Followers
                    </p>
                    <p>
                        <span class="font-bold">{{ $user->following->count() }}</span> Following
                    </p>
                </div>
            </div>

        </div>

<!-- FOLLOW / EDIT BUTTON -->
<div class="px-4 mb-6">

    @guest
        <!-- Guest: Selalu tampil Follow -->
        <a href="{{ route('login') }}"
           class="block w-full py-2 rounded-lg bg-lumina-primary text-white 
                  font-semibold text-center hover:brightness-110 transition">
            Follow
        </a>
    @endguest


    @auth

        @if(auth()->id() !== $user->id)

            {{-- User lain --}}
            @if(auth()->user()->following->contains($user->id))
                <form action="{{ route('unfollow', $user->id) }}" method="POST">
                    @csrf
                    <button class="w-full py-2 rounded-lg bg-gray-300 
                                   text-black font-medium hover:bg-gray-400 transition">
                        Following
                    </button>
                </form>
            @else
                <form action="{{ route('follow', $user->id) }}" method="POST">
                    @csrf
                    <button class="w-full py-2 rounded-lg bg-lumina-primary 
                                   text-white font-semibold hover:brightness-110 transition">
                        Follow
                    </button>
                </form>
            @endif

        @else

            {{-- Profil sendiri --}}
            <a href="/profile/edit"
               class="block w-full py-2 rounded-lg bg-lumina-primary 
                      text-white font-semibold text-center hover:brightness-110 transition">
                Edit Profile
            </a>

        @endif

    @endauth

</div>

        <!-- FOTO GRID -->
        <div class="grid grid-cols-3 gap-[2px]">
            @foreach($user->photos as $photo)
                <a href="{{ route('photo.show', $photo->id) }}"
                   class="block relative group bg-gray-200 aspect-square overflow-hidden">

                    <img src="{{ asset('storage/' . $photo->image) }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                </a>
            @endforeach
        </div>

    </div>

</x-app-layout>

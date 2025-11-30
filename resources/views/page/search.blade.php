<x-app-layout>

<div class="max-w-xl mx-auto pt-4 pb-28 px-4">

    <h1 class="text-xl font-bold text-lumina-secondary mb-4">
        Search Results for "{{ $query }}"
    </h1>

    @if($users->count() == 0)
        <p class="text-gray-500">No users found.</p>
    @endif

    <!-- USER LIST -->
    <div class="space-y-4">

        @foreach($users as $user)
        <div class="flex items-center justify-between p-4 bg-white rounded-xl shadow 
                    hover:shadow-md transition-all duration-200">

            <!-- LEFT: Profile + info -->
            <div class="flex items-center gap-3">

                <!-- Avatar -->
                <a href="/user/{{ $user->id }}">
                    <div class="w-12 h-12 rounded-full overflow-hidden bg-gray-200">
                        <img src="{{ $user->profile_photo 
                                    ? asset('storage/'.$user->profile_photo) 
                                    : 'https://via.placeholder.com/100' }}"
                             class="w-full h-full object-cover">
                    </div>
                </a>

                <div>
                    <a href="/user/{{ $user->id }}"
                       class="font-semibold text-lumina-secondary hover:underline">
                        {{ $user->name }}
                    </a>
                    <p class="text-sm text-gray-500 truncate max-w-[160px]">
                        {{ $user->bio ?? '' }}
                    </p>
                </div>

            </div>

            <!-- RIGHT: Follow / Unfollow -->
            <div>

                @guest
                    <!-- Guest → Follow = redirect login -->
                    <a href="{{ route('login') }}"
                       class="px-4 py-1 rounded-full bg-lumina-primary text-white 
                              font-medium hover:brightness-110 transition">
                        Follow
                    </a>
                @endguest


                @auth

                    @if(auth()->id() !== $user->id)

                        @if(auth()->user()->following->contains($user->id))
                            <!-- Following -->
                            <form action="{{ route('unfollow', $user->id) }}" method="POST">
                                @csrf
                                <button class="px-4 py-1 rounded-full bg-gray-300 text-black
                                               font-medium hover:bg-gray-400 transition">
                                    Following
                                </button>
                            </form>
                        @else
                            <!-- Follow -->
                            <form action="{{ route('follow', $user->id) }}" method="POST">
                                @csrf
                                <button class="px-4 py-1 rounded-full bg-lumina-primary text-white
                                               font-medium hover:brightness-110 transition">
                                    Follow
                                </button>
                            </form>
                        @endif

                    @else
                        <!-- User sendiri: hide tombol -->
                        <span class="text-xs text-gray-400">It's you</span>
                    @endif

                @endauth

            </div>

        </div>
        @endforeach

    </div>

</div>

</x-app-layout>

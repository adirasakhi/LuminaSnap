<x-app-layout>

    <!-- SEARCH BAR -->
    <div class="px-4 mt-5 mb-6">
        <form action="{{ route('search') }}" method="GET">
            <input type="text" name="q" placeholder="Search users..."
                class="w-full px-4 py-3 border border-gray-200 rounded-full bg-white shadow-sm
                       focus:ring-2 focus:ring-lumina-primary outline-none transition-all">
        </form>
    </div>

    <div class="max-w-xl mx-auto pb-32 space-y-6">

        @foreach($feed as $photo)

        <div class="bg-white rounded-xl shadow-md overflow-hidden
                    transition-all duration-300 animate-fade-in border border-gray-100">

            <!-- USER HEADER -->
            <div class="flex items-center gap-3 px-4 py-3 border-b">
                <div class="w-10 h-10 rounded-full overflow-hidden bg-gray-200 shadow-sm">
                    
                <a href="/user/{{ $photo->user->id }}"><img src="{{ $photo->user->profile_photo 
                        ? asset('storage/'.$photo->user->profile_photo)
                        : 'https://via.placeholder.com/150' }}"
                        class="w-full h-full object-cover">
                </a>
                </div>
                <div class="flex-1">
                <a href="/user/{{ $photo->user->id }}">    
                <h3 class="font-bold text-lumina-secondary text-sm">
                        {{ $photo->user->name }}
                    </h3>
                </a>
                    <p class="text-xs text-gray-400">
                        {{ $photo->created_at->diffForHumans() }}
                    </p>
                </div>
                                
                @guest
                                <form action="{{ route('follow', $photo->user->id) }}" method="POST">
                                @csrf
                                <button class="px-3 py-1 text-xs bg-lumina-primary text-white rounded-full hover:brightness-110 transition">
                                    Follow
                                </button>
                            </form>
                @endguest
                <!-- FOLLOW BUTTON -->
                @auth
                    @if(auth()->id() !== $photo->user->id)
                        @if(auth()->user()->following->contains($photo->user->id))
                            <form action="{{ route('unfollow', $photo->user->id) }}" method="POST">
                                @csrf
                                <button class="px-3 py-1 text-xs bg-gray-200 rounded-full hover:bg-gray-300 transition">
                                    Following
                                </button>
                            </form>
                        @else
                            <form action="{{ route('follow', $photo->user->id) }}" method="POST">
                                @csrf
                                <button class="px-3 py-1 text-xs bg-lumina-primary text-white rounded-full hover:brightness-110 transition">
                                    Follow
                                </button>
                            </form>
                        @endif
                    @endif
                @endauth
            </div>

            <!-- PHOTO -->
            <a href="{{ route('photo.show', $photo->id) }}">
                <img src="{{ asset('storage/' . $photo->image) }}"
                    class="w-full object-cover max-h-[600px] mx-auto">
            </a>

            <!-- CAPTION + REPORT -->
            <div class="px-4 py-3 border-b">

                @if($photo->caption)
                <p class="text-gray-700 mt-1 leading-snug text-sm">
                    {{ $photo->caption }}
                </p>
                @endif

                <form action="{{ route('photo.report', $photo->id) }}" method="POST" class="mt-2">
                    @csrf
                    <button class="text-red-500 text-xs hover:underline">
                        Report Photo
                    </button>
                </form>

            </div>

            <!-- LIKE SECTION -->
            <div class="px-4 py-3 flex items-center justify-between border-b">

                <form method="POST" action="{{ route('photo.like', $photo->id) }}">
                    @csrf
                    <button class="text-2xl leading-none transform transition 
                                   hover:scale-110 active:scale-95">

                        @auth
                            @if($photo->isLikedBy(auth()->user()))
                                <span class="text-red-500">❤️</span>
                            @else
                                <span class="text-gray-500 hover:text-red-500">🤍</span>
                            @endif
                        @else
                            <span class="text-gray-300">🤍</span>
                        @endauth

                    </button>
                </form>

                <span class="text-gray-700 text-sm font-semibold">
                    {{ $photo->likes->count() }} likes
                </span>

            </div>

            <!-- COMMENTS -->
            <div class="px-4 py-3 space-y-3">

                <!-- ONLY SHOW FIRST 3 -->
                @foreach($photo->comments->take(3) as $c)
                <div class="flex items-start gap-2">

                    <div class="w-8 h-8 rounded-full overflow-hidden bg-gray-200">
                    <a href="/user/{{ $c->user->id }}">    
                    <img src="{{ $c->user->profile_photo 
                            ? asset('storage/'.$c->user->profile_photo)
                            : 'https://via.placeholder.com/50' }}"
                            class="w-full h-full object-cover">
                    </div>

                    <div class="bg-gray-50 px-3 py-2 rounded-xl shadow-sm w-full">
                        <p class="text-sm leading-tight">
                            <a href="/user/{{ $c->user->id }}"><span class="font-semibold text-lumina-secondary">
                                {{ $c->user->name }}
                            </span>
                            </a>
                            {{ $c->comment }}
                        </p>

                        <p class="text-[10px] text-gray-400 mt-1">
                            {{ $c->created_at->diffForHumans() }}
                        </p>
                    </div>

                </div>
                @endforeach

                @if($photo->comments->count() > 3)
                <a href="{{ route('photo.show', $photo->id) }}"
                    class="text-sm text-gray-500 hover:underline">
                    View all {{ $photo->comments->count() }} comments →
                </a>
                @endif

                @auth
                <form method="POST" action="{{ route('photo.comment', $photo->id) }}" 
                      class="flex items-center gap-2 mt-2">
                    @csrf

                    <input type="text" name="comment" placeholder="Add a comment..."
                        class="flex-1 px-3 py-2 border border-gray-300 rounded-full bg-gray-50 
                               focus:ring-2 focus:ring-lumina-primary outline-none transition">

                    <button class="text-lumina-primary font-semibold hover:underline">
                        Post
                    </button>
                </form>
                @endauth

            </div>

        </div>

        @endforeach

    </div>

</x-app-layout>

<x-app-layout>

    <div class="max-w-xl mx-auto pt-6 pb-32 px-4 animate-fade-in">

        <!-- BACK BUTTON -->
        <a href="{{ url()->previous() }}" 
           class="text-gray-600 mb-4 inline-flex items-center gap-1 hover:text-lumina-primary transition">
            <span class="text-lg">←</span> Back
        </a>

        <!-- PHOTO CARD -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">

            <!-- USER BAR -->
            <div class="flex items-center justify-between px-4 py-3 border-b">

                <div class="flex items-center gap-3">
                    <!-- Avatar -->
                    <div class="w-10 h-10 rounded-full overflow-hidden bg-gray-200">
                        <a href="/user/{{ $photo->user->id }}">
                            <img src="{{ $photo->user->profile_photo 
                                   ? asset('storage/' . $photo->user->profile_photo) 
                                   : 'https://via.placeholder.com/150' }}" 
                             class="w-full h-full object-cover">
                        </a>
                            </div>

                    <div>
                        <a href="/user/{{ $photo->user->id }}">
                            <h2 class="font-semibold text-lumina-secondary text-base leading-none">
                            {{ $photo->user->name }}
                        </h2>
</a>
                        <p class="text-xs text-gray-400">
                            {{ $photo->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
@guest
                    <!-- Guest → Follow = redirect login -->
                    <a href="{{ route('login') }}"
                       class="px-4 py-1 rounded-full bg-lumina-primary text-white 
                              font-medium hover:brightness-110 transition">
                        Follow
                    </a>
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
            <div class="w-full bg-gray-100">
                <img src="{{ asset('storage/' . $photo->image) }}"
                    class="w-full object-cover max-h-[600px] mx-auto">
            </div>

            <!-- CAPTION + REPORT -->
            <div class="p-4 border-b">

                @if($photo->caption)
                    <p class="text-gray-700 leading-snug mb-2">
                        {{ $photo->caption }}
                    </p>
                @endif

                <!-- REPORT -->
                <form method="POST" action="{{ route('photo.report', $photo->id) }}">
                    @csrf
                    <button class="text-red-500 text-xs hover:underline">
                        Report Photo
                    </button>
                </form>

                @auth
@if($photo->user_id === auth()->id())
    <button onclick="document.getElementById('albumModal').classList.remove('hidden')"
        class="text-lumina-primary text-sm font-semibold hover:underline mt-2">
        Add to Album
    </button>
@endif
@endauth
            </div>

            <!-- LIKE SECTION -->
            <div class="px-4 py-3 flex items-center justify-between border-b">

                <form method="POST" action="{{ route('photo.like', $photo->id) }}">
                    @csrf
                    <button class="text-3xl transform transition 
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
            <div class="px-4 py-4 space-y-3">

                @foreach($photo->comments as $c)
                <div class="flex items-start gap-3">

                    <!-- Comment Avatar -->
                    <div class="w-8 h-8 rounded-full overflow-hidden bg-gray-200 shadow-sm">
                        <a href="/user/{{ $c->user->id }}">
                            <img src="{{ $c->user->profile_photo ? asset('storage/'.$c->user->profile_photo) : 'https://via.placeholder.com/50' }}"
                            class="w-full h-full object-cover"></a>
                    </div>

                    <!-- Bubble -->
                    <div class="bg-gray-50 px-3 py-2 rounded-xl shadow-sm flex-1">
                        <p class="text-sm leading-tight">
                            <a href="/user/{{ $c->user->id }}">
                                <span class="font-semibold text-lumina-secondary">
                                {{ $c->user->name }}
                            </span></a>
                            <span class="text-gray-700">{{ $c->comment }}</span>
                        </p>

                        <p class="text-[10px] text-gray-400 mt-1">
                            {{ $c->created_at->diffForHumans() }}
                        </p>
                    </div>

                </div>
                @endforeach

                <!-- ADD COMMENT -->
                @auth
                <form method="POST" action="{{ route('photo.comment', $photo->id) }}" class="flex items-center gap-2 mt-4">
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

    </div>
@auth
@if($photo->user_id === auth()->id())
<div id="albumModal"
     class="fixed inset-0 bg-black/40 backdrop-blur-sm hidden flex items-center justify-center z-50">

    <div class="bg-white w-full max-w-sm rounded-xl shadow-lg p-5">

        <h2 class="text-lg font-semibold text-lumina-secondary mb-3">
            Add Photo to Album
        </h2>

        <form method="POST" action="{{ route('photo.addToAlbum', $photo->id) }}" class="space-y-3">
            @csrf

            <select name="album_id"
                class="w-full border rounded-lg p-2 bg-gray-50 focus:ring-lumina-primary">
                
                @foreach(auth()->user()->albums as $album)
                    <option value="{{ $album->id }}">{{ $album->name }}</option>
                @endforeach

            </select>

            <button class="w-full py-2 bg-lumina-primary text-white rounded-lg hover:brightness-110">
                Save
            </button>
        </form>

        <button onclick="document.getElementById('albumModal').classList.add('hidden')"
            class="mt-3 text-gray-500 w-full text-center hover:text-lumina-primary text-sm">
            Cancel
        </button>

    </div>

</div>
@endif
@endauth
</x-app-layout>

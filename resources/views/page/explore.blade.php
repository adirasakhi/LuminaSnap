<x-app-layout>

<div class="max-w-7xl mx-auto px-4 py-6">

    <!-- Title -->
    <h1 class="text-2xl font-bold text-lumina-secondary mb-6">
        Explore
    </h1>

    <!-- Masonry Grid -->
    <div class="columns-2 sm:columns-3 lg:columns-4 gap-4 space-y-4">

        @foreach($photos as $photo)

        <div class="break-inside-avoid rounded-xl overflow-hidden group cursor-pointer
                    bg-white shadow-md hover:shadow-lg transition-all duration-200">

            <!-- IMAGE -->
            <a href="{{ route('photo.show', $photo->id) }}">
                <img src="{{ asset('storage/' . $photo->image) }}"
                     class="w-full h-auto object-cover transition-all 
                            duration-300 group-hover:scale-[1.03]">
            </a>

            <!-- PHOTO INFO (optional aesthetic) -->
            <div class="p-3 flex items-center justify-between">

                <div class="flex items-center gap-2">
                    <!-- Avatar mini -->
                    <div class="w-7 h-7 rounded-full overflow-hidden bg-gray-300">
                        <a href="/user/{{ $photo->user->id }}">
                            <img src="{{ $photo->user->profile_photo 
                            ? asset('storage/' . $photo->user->profile_photo) 
                            : 'https://via.placeholder.com/50' }}"
                            class="w-full h-full object-cover"></a>
                    </div>

                    <!-- Username -->
                    <a href="/user/{{ $photo->user->id }}"><p class="text-sm font-semibold text-gray-700">
                        {{ $photo->user->name }}
                    </p></a>
                </div>

                <!-- Likes -->
                <p class="text-xs text-gray-500">
                    ❤️ {{ $photo->likes->count() }}
                </p>

            </div>

        </div>

        @endforeach

    </div>

</div>

</x-app-layout>

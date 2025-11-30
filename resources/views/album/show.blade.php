<x-app-layout>

<div class="max-w-xl mx-auto p-5 animate-fade-in">

    <!-- TITLE -->
    <h1 class="text-2xl font-bold text-lumina-secondary leading-tight mb-1">
        {{ $album->name }}
    </h1>

    <!-- DESCRIPTION -->
    @if($album->description)
    <p class="text-gray-600 text-sm mb-4">
        {{ $album->description }}
    </p>
    @endif

    <!-- PHOTO GRID -->
    <div class="grid grid-cols-3 gap-[5px]">

        @forelse($album->photos as $photo)

        <a href="{{ route('photo.show', $photo->id) }}"
           class="block group overflow-hidden rounded-lg 
                  bg-gray-100 shadow-sm hover:shadow-md transition-all duration-300">

            <img src="{{ asset('storage/'.$photo->image) }}"
                class="w-full h-28 object-cover 
                       group-hover:scale-110 transition-all duration-300">

        </a>

        @empty

        <p class="text-gray-500 text-sm col-span-3 text-center py-6">
            No photos in this album yet.
        </p>

        @endforelse

    </div>

</div>

</x-app-layout>

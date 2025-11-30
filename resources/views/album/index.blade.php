<x-app-layout>

<div class="max-w-xl mx-auto p-5 animate-fade-in">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-lumina-secondary">My Albums</h1>

        <a href="{{ route('album.create') }}"
           class="px-4 py-2 rounded-lg bg-lumina-primary text-white font-semibold
                  hover:brightness-110 transition">
            + Album
        </a>
    </div>

    <!-- GRID ALBUM LIST -->
    <div class="grid grid-cols-2 gap-4">

        @forelse($albums as $album)
        <a href="{{ route('album.show', $album->id) }}"
           class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100
                  hover:shadow-lg hover:-translate-y-1 transition-all duration-300">

            <!-- COVER -->
            <img src="{{ $album->cover 
                        ? asset('storage/'.$album->cover) 
                        : 'https://picsum.photos/400' }}"
                 class="w-full h-32 object-cover">

            <!-- INFO -->
            <div class="p-3">
                <h2 class="font-semibold text-lumina-secondary truncate">
                    {{ $album->name }}
                </h2>
                <p class="text-sm text-gray-500">
                    {{ $album->photos->count() }} photos
                </p>
            </div>

        </a>
        @empty

        <p class="text-gray-500 text-sm col-span-2 text-center">
            You don’t have any albums yet.
        </p>

        @endforelse

    </div>

</div>

</x-app-layout>

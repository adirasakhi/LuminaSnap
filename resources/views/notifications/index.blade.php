<x-app-layout>

<div class="max-w-xl mx-auto px-4 pt-6 pb-32 space-y-4 animate-fade-in">

    <h1 class="text-xl font-bold text-lumina-secondary mb-4">Notifications</h1>

    @forelse($notifications as $n)

    <!-- UNREAD highlight -->
    <div class="flex items-start gap-3 p-3 rounded-xl shadow-sm
                bg-white border 
                {{ $n->read ? 'border-gray-100' : 'border-lumina-primary bg-lumina-primary/5' }}
                transition">

        <!-- Avatar -->
        <div class="w-11 h-11 rounded-full overflow-hidden bg-gray-200 shadow-sm flex-shrink-0">
            <img src="{{ $n->fromUser->profile_photo 
                        ? asset('storage/'.$n->fromUser->profile_photo)
                        : 'https://via.placeholder.com/50' }}"
                 class="w-full h-full object-cover">
        </div>

        <!-- Text + Optional Image -->
        <div class="flex-1">

            <!-- TEXT -->
            <p class="text-sm text-gray-700 leading-snug">
                <span class="font-semibold text-lumina-secondary">
                    {{ $n->fromUser->name }}
                </span>

                <!-- ICON BASED ON TYPE -->
                @if($n->type === 'like')
                    <span class="text-red-500 ml-1">❤️</span>
                @elseif($n->type === 'comment')
                    <span class="text-blue-500 ml-1">💬</span>
                @elseif($n->type === 'follow')
                    <span class="text-lumina-primary ml-1">➕</span>
                @endif

                {{ $n->message }}
            </p>

            <!-- TIME -->
            <p class="text-[11px] text-gray-400 mt-1">
                {{ $n->created_at->diffForHumans() }}
            </p>

            <!-- PHOTO PREVIEW IF EXISTS -->
            @if($n->photo_id)
            <a href="{{ route('photo.show', $n->photo_id) }}">
                <img src="{{ asset('storage/'.$n->photo->image) }}"
                     class="w-16 h-16 mt-3 object-cover rounded-md shadow-sm hover:opacity-90 transition">
            </a>
            @endif

        </div>

    </div>

    @empty

    <!-- EMPTY STATE -->
    <div class="text-center mt-10 text-gray-500">
        <div class="text-5xl mb-3">🔔</div>
        <p class="text-sm">You have no notifications yet.</p>
    </div>

    @endforelse

</div>

</x-app-layout>

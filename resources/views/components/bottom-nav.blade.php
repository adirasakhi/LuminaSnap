<style>
    .tooltip {
        position: absolute;
        top: -32px;
        left: 50%;
        transform: translateX(-50%);
        background: #ff4466;
        color: white;
        padding: 4px 8px;
        border-radius: 6px;
        font-size: 11px;
        white-space: nowrap;
        opacity: 0;
        pointer-events: none;
        transition: .2s ease;
    }

    .group:hover .tooltip {
        opacity: 1;
        top: -38px;
    }
</style>

<div class="fixed bottom-4 left-1/2 -translate-x-1/2
            bg-white shadow-lg shadow-lumina-primary/10
            border border-gray-200 rounded-full
            px-6 py-3 z-50 flex items-center gap-8">

    <!-- HOME -->
    <a href="/" class="relative group">
        <span class="tooltip">Home</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6
            {{ request()->is('/') 
                ? 'stroke-lumina-primary' 
                : 'stroke-gray-500 opacity-60' }}"
            fill="none" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M3 12l9-9 9 9M4 10v10h4m6 0h4V10" />
        </svg>
    </a>
    <!-- ADMIN -->
    @auth
    @if(auth()->user()->role === 'admin')
    <a href="/admin" class="group relative transition">
        <span class="tooltip">Admin</span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
             viewBox="0 0 24 24" stroke-width="2"
             class="w-6 h-6
              {{ request()->is('admin') 
                ? 'stroke-lumina-primary' 
                : 'stroke-gray-500 opacity-60' }}">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 2l7 4v6c0 5-3 9-7 10-4-1-7-5-7-10V6l7-4Z" />
        </svg>
    </a>
    @endif
    @endauth
    <!-- FEED -->
    <a href="/feed" class="relative group">
        <span class="tooltip">Feed</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6
            {{ request()->is('feed') 
                ? 'stroke-lumina-primary' 
                : 'stroke-gray-500 opacity-60' }}"
            fill="none" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </a>

    <!-- UPLOAD -->
    <a href="/upload" class="relative group">
        <span class="tooltip">Upload</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7
            {{ request()->is('upload') 
                ? 'stroke-lumina-primary' 
                : 'stroke-gray-500 opacity-60' }}"
            fill="none" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 4v16m8-8H4" />
        </svg>
    </a>

    <!-- ALBUM -->
    <a href="/albums" class="relative group">
        <span class="tooltip">Albums</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6
            {{ request()->is('album') 
                ? 'stroke-lumina-primary' 
                : 'stroke-gray-500 opacity-60' }}"
            fill="none" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M3 7h18M3 7l2-3h14l2 3M3 7v12h18V7" />
        </svg>
    </a>

    <!-- PROFILE -->
    <a href="/profile" class="relative group">
        <span class="tooltip">Profile</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6
            {{ request()->is('profile') 
                ? 'stroke-lumina-primary' 
                : 'stroke-gray-500 opacity-60' }}"
            fill="none" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 12a4 4 0 100-8 4 4 0 000 8Zm0 2c-4 0-8 2-8 4v2h16v-2c0-2-4-4-8-4Z" />
        </svg>
    </a>

    <!-- NOTIF -->
    <a href="/notifications" class="relative group">
        <span class="tooltip">Notifications</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6
            {{ request()->is('notifications') 
                ? 'stroke-lumina-primary' 
                : 'stroke-gray-500 opacity-60' }}"
            fill="none" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M15 17h5l-1.4-1.4A2 2 0 0118 14V10a6 6 0 10-12 0v4c0 .53-.21 1.04-.6 1.4L4 17h5m6 0v1a3 3 0 11-6 0v-1" />
        </svg>

        @php
            $unread = \App\Models\Notification::where('user_id', auth()->id())
                      ->where('read', false)->count();
        @endphp

        @if($unread > 0)
            <span class="absolute -top-1 -right-2 bg-red-500 text-white
                         text-xs rounded-full px-1">
                {{ $unread }}
            </span>
        @endif
    </a>

</div>

<x-app-layout>

<div class="max-w-6xl mx-auto p-6 space-y-10 animate-fade-in">

    <!-- TITLE -->
    <h1 class="text-3xl font-bold text-lumina-secondary mb-2">
        Admin Dashboard
    </h1>
    <p class="text-gray-600 mb-8">
        Manage reports, photos, and users.
    </p>

    <!-- SECTION: REPORTED PHOTOS -->
    <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100">

        <h2 class="text-xl font-semibold mb-4 flex items-center gap-2">
            🚨 Reported Photos
            <span class="text-sm text-gray-500 font-normal">
                ({{ $reports->count() }} items)
            </span>
        </h2>

        @if($reports->count() == 0)
            <p class="text-gray-500 text-sm">No reports at the moment 🎉</p>
        @else
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b text-gray-600">
                    <th class="text-left py-2">Photo</th>
                    <th class="text-left">Reported By</th>
                    <th class="text-left">Reason</th>
                    <th class="text-left">Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach($reports as $r)
                <tr class="border-b hover:bg-gray-50 transition">

                    <!-- Preview -->
                    <td class="py-3">
                        <img src="{{ asset('storage/'.$r->photo->image) }}"
                             class="w-16 h-16 object-cover rounded shadow-sm">
                    </td>

                    <!-- Reporter -->
                    <td class="font-medium text-gray-700">
                        {{ $r->reporter->name }}
                    </td>

                    <!-- Reason -->
                    <td class="text-gray-600">
                        {{ $r->reason }}
                    </td>

                    <!-- ACTIONS -->
                    <td>
                        <form action="{{ route('admin.delete.photo', $r->photo->id) }}" method="POST"
                              onsubmit="return confirm('Delete this photo?')">
                            @csrf @method('DELETE')
                            <button class="px-3 py-1 text-xs rounded bg-red-100 text-red-600 hover:bg-red-200">
                                Delete Photo
                            </button>
                        </form>
                    </td>

                </tr>
                @endforeach

            </tbody>
        </table>
        @endif

    </div>


    <!-- SECTION: USERS -->
    <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100">

        <h2 class="text-xl font-semibold mb-4 flex items-center gap-2">
            👤 Users
            <span class="text-sm text-gray-500 font-normal">
                ({{ $users->count() }} users)
            </span>
        </h2>

        <table class="w-full text-sm">
            <thead>
                <tr class="border-b text-gray-600">
                    <th class="text-left py-2">Name</th>
                    <th class="text-left">Role</th>
                    <th class="text-left">Actions</th>
                </tr>
            </thead>

            <tbody>

                @foreach($users as $u)
                <tr class="border-b hover:bg-gray-50 transition">

                    <!-- NAME -->
                    <td class="py-3 font-medium text-gray-700">
                        {{ $u->name }}
                    </td>

                    <!-- ROLE BADGE -->
                    <td>
                        @if($u->role === 'admin')
                            <span class="px-3 py-1 text-xs rounded-full bg-purple-100 text-purple-700">
                                Admin
                            </span>
                        @elseif($u->role === 'banned')
                            <span class="px-3 py-1 text-xs rounded-full bg-red-100 text-red-600">
                                Banned
                            </span>
                        @else
                            <span class="px-3 py-1 text-xs rounded-full bg-gray-100 text-gray-600">
                                User
                            </span>
                        @endif
                    </td>

                    <!-- ACTIONS -->
                    <td class="py-3 flex gap-3">

                        @if($u->role !== 'banned')
                        <form action="{{ route('admin.ban.user', $u->id) }}" method="POST"
                              onsubmit="return confirm('Ban this user?')">
                            @csrf
                            <button class="px-3 py-1 text-xs rounded bg-red-100 text-red-600 hover:bg-red-200">
                                Ban
                            </button>
                        </form>
                        @else
                        <form action="{{ route('admin.unban.user', $u->id) }}" method="POST"
                              onsubmit="return confirm('Unban this user?')">
                            @csrf
                            <button class="px-3 py-1 text-xs rounded bg-green-100 text-green-700 hover:bg-green-200">
                                Unban
                            </button>
                        </form>
                        @endif

                    </td>

                </tr>
                @endforeach

            </tbody>
        </table>

    </div>

</div>

</x-app-layout>

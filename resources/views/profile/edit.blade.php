<x-app-layout>

    <div class="max-w-xl mx-auto pt-6 pb-28 px-4">

        <h1 class="text-xl font-bold text-lumina-secondary mb-4">
            Edit Profile
        </h1>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf

            <!-- FOTO PROFIL -->
            <div class="flex flex-col items-center mb-6">

                <div class="w-28 h-28 rounded-full overflow-hidden shadow-md mb-3">
                    <img id="previewPhoto"
                         src="{{ $user->profile_photo ? asset('storage/'.$user->profile_photo) : 'https://via.placeholder.com/150' }}"
                         class="w-full h-full object-cover">
                </div>

                <label class="cursor-pointer px-4 py-2 bg-lumina-primary text-white rounded-lg hover:brightness-110 transition">
                    Change Photo
                    <input type="file" name="profile_photo" id="profilePhotoInput" class="hidden" accept="image/*">
                </label>

            </div>

            <!-- NAME -->
            <div class="mb-5">
                <label class="text-gray-700 font-medium">Name</label>
                <input type="text" name="name" value="{{ $user->name }}"
                       class="w-full mt-2 p-3 border rounded-lg focus:ring-2 focus:ring-lumina-primary" required>
            </div>

            <!-- BIO -->
            <div class="mb-8">
                <label class="text-gray-700 font-medium">Bio</label>
                <textarea name="bio" rows="3"
                          class="w-full mt-2 p-3 border rounded-lg focus:ring-2 focus:ring-lumina-primary"
                          placeholder="Tell something about yourself...">{{ $user->bio }}</textarea>
            </div>

            <button class="w-full bg-lumina-primary text-white font-semibold py-3 rounded-lg hover:brightness-110 transition">
                Save Changes
            </button>

        </form>

    </div>

    <script>
        document.getElementById('profilePhotoInput').addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (!file) return;
            document.getElementById('previewPhoto').src = URL.createObjectURL(file);
        });
    </script>

</x-app-layout>

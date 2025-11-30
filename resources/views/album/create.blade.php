<x-app-layout>

<div class="max-w-xl mx-auto p-6 animate-fade-in">

    <!-- TITLE -->
    <h1 class="text-2xl font-bold text-lumina-secondary mb-6">
        Create New Album
    </h1>

    <!-- CARD -->
    <div class="bg-white rounded-xl shadow-md p-5 border border-gray-100">

        <form action="{{ route('album.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Album Name -->
            <div class="mb-4">
                <label class="font-semibold text-gray-800">Album Name</label>
                <input type="text" name="name"
                    class="w-full mt-1 px-4 py-2 border rounded-lg bg-gray-50
                           focus:ring-2 focus:ring-lumina-primary focus:bg-white transition"
                    placeholder="My trip to Bali..." required>
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label class="font-semibold text-gray-800">Description</label>
                <textarea name="description" rows="3"
                    class="w-full mt-1 px-4 py-2 border rounded-lg bg-gray-50
                           focus:ring-2 focus:ring-lumina-primary focus:bg-white transition"
                    placeholder="Tell something about the album..."></textarea>
            </div>

            <!-- Preview -->
            <div class="w-full h-44 bg-gray-100 rounded-xl overflow-hidden flex items-center justify-center mb-3">
                <img id="coverPreview" class="hidden w-full h-full object-cover">
                <p id="coverText" class="text-gray-400 text-sm">No cover selected</p>
            </div>

            <!-- Cover Upload -->
            <div class="mb-6">
                <label class="font-semibold text-gray-800">Cover Photo (optional)</label>
                <input type="file" name="cover" id="coverInput"
                    accept="image/*"
                    class="mt-1 block w-full text-sm 
                           file:bg-lumina-primary file:text-white file:px-4 file:py-2
                           file:rounded-lg file:border-none cursor-pointer
                           hover:file:brightness-110 transition">
            </div>

            <!-- Submit -->
            <button class="w-full bg-lumina-primary text-white py-3 rounded-lg 
                           font-semibold hover:brightness-110 transition">
                Create Album
            </button>

        </form>

    </div>

</div>

<!-- PREVIEW SCRIPT -->
<script>
    const input = document.getElementById('coverInput');
    const preview = document.getElementById('coverPreview');
    const text = document.getElementById('coverText');

    input.addEventListener('change', () => {
        const file = input.files[0];
        if (!file) return;

        preview.src = URL.createObjectURL(file);
        preview.classList.remove('hidden');
        text.classList.add('hidden');
    });
</script>

</x-app-layout>

<x-app-layout>

<div class="max-w-xl mx-auto pt-6 pb-28 px-4">

    <h1 class="text-xl font-bold text-lumina-secondary mb-5">
        Upload Photo
    </h1>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('photo.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- PREVIEW AREA -->
        <div id="dropZone"
             class="w-full h-64 bg-gray-100 rounded-xl flex flex-col items-center justify-center 
                    overflow-hidden mb-5 border-2 border-dashed border-gray-300 
                    hover:border-lumina-primary transition-all duration-300 relative cursor-pointer">

            <!-- Preview Image -->
            <img id="previewImage" class="hidden w-full h-full object-cover absolute inset-0 rounded-xl">

            <!-- Placeholder content -->
            <div id="previewPlaceholder" class="flex flex-col items-center text-gray-400 gap-2">
                <span class="text-4xl">📷</span>
                <p class="text-sm">Click or drag an image here</p>
            </div>

            <input type="file" name="image" accept="image/*" id="imageInput"
                   class="absolute inset-0 opacity-0 cursor-pointer">
        </div>

        @error('image')
            <p class="text-red-600 text-sm mb-3">{{ $message }}</p>
        @enderror

        <!-- CAPTION INPUT -->
        <label class="block mb-6">
            <span class="text-gray-700 font-medium">Caption</span>
            <textarea name="caption" rows="3"
                class="w-full mt-2 p-3 border rounded-lg bg-gray-50
                       focus:outline-none focus:ring-2 focus:ring-lumina-primary resize-none"
                placeholder="Write something..."></textarea>
        </label>
<!-- PILIH ALBUM -->
<label class="block mb-4">
    <span class="text-gray-700 font-medium">Choose Album (optional)</span>

    <select name="album_id"
        class="w-full mt-2 p-3 border rounded-lg focus:ring-2 focus:ring-lumina-primary bg-gray-50">
        
        <option value="">No Album</option>

        @foreach(Auth::user()->albums as $album)
            <option value="{{ $album->id }}">{{ $album->name }}</option>
        @endforeach
    </select>
</label>
        <!-- SUBMIT BUTTON -->
        <button class="w-full bg-lumina-primary text-white font-semibold py-3 rounded-lg 
                       hover:brightness-110 active:scale-95 transition">
            Upload Photo
        </button>

    </form>

</div>

<!-- PREVIEW + DRAG SCRIPT -->
<script>
    const dropZone = document.getElementById('dropZone');
    const input = document.getElementById('imageInput');
    const img = document.getElementById('previewImage');
    const placeholder = document.getElementById('previewPlaceholder');

    // Standard input change
    input.addEventListener('change', (e) => loadFile(e.target.files[0]));

    // Drag over highlight
    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.classList.add('border-lumina-primary', 'bg-lumina-primary/5');
    });

    dropZone.addEventListener('dragleave', () => {
        dropZone.classList.remove('border-lumina-primary', 'bg-lumina-primary/5');
    });

    // Drop file
    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone.classList.remove('border-lumina-primary', 'bg-lumina-primary/5');
        const file = e.dataTransfer.files[0];
        if (file) loadFile(file);
    });

    // Load file into preview
    function loadFile(file) {
        img.src = URL.createObjectURL(file);
        img.classList.remove('hidden');
        placeholder.classList.add('hidden');
    }
</script>

</x-app-layout>

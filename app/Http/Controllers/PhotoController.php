<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function create()
    {
        return view('photo.upload');
    }

public function store(Request $request)
{
    $request->validate([
        'caption' => 'nullable|string|max:500',
        'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    // Upload file ke storage
    $file = $request->file('image');
    $path = $file->store('photos', 'public');

    // Simpan ke DB
    Photo::create([
        'user_id' => auth()->id(),
        'image' => $path,
        'caption' => $request->caption,
            'album_id' => $request->album_id, // ← tambahin ini

    ]);

    return back()->with('success', 'Foto berhasil diupload!');
}
public function show($id)
{
    $photo = Photo::with(['user', 'likes', 'comments.user'])->findOrFail($id);

    return view('photo.detail', compact('photo'));
}
public function addToAlbum(Request $request, $photoId)
{
    $request->validate([
        'album_id' => 'required|exists:albums,id',
    ]);

    $photo = Photo::where('user_id', auth()->id())
                  ->findOrFail($photoId);

    $photo->album_id = $request->album_id;
    $photo->save();

    return back()->with('success', 'Photo moved to album!');
}
}

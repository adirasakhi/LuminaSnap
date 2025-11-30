<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::where('user_id', Auth::id())->get();
        return view('album.index', compact('albums'));
    }

    public function create()
    {
        return view('album.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $path = null;
        if ($request->hasFile('cover')) {
            $path = $request->file('cover')->store('album_covers', 'public');
        }

        Album::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'description' => $request->description,
            'cover' => $path
        ]);

        return redirect()->route('album.index');
    }

    public function show($id)
    {
        $album = Album::with('photos')->findOrFail($id);
        return view('album.show', compact('album'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Notification;


class CommentController extends Controller
{
public function store(Request $request, $photoId)
{
    $request->validate([
        'comment' => 'required|string|max:500'
    ]);

    // Ambil data foto
    $photo = \App\Models\Photo::findOrFail($photoId);

    // Simpan komentar
    Comment::create([
        'photo_id' => $photoId,
        'user_id' => auth()->id(),
        'comment' => $request->comment
    ]);

    // Buat notifikasi
    Notification::create([
        'user_id' => $photo->user_id, // pemilik foto
        'from_user_id' => auth()->id(),
        'type' => 'comment',
        'message' => auth()->user()->name . ' commented on your photo.',
        'photo_id' => $photoId,
    ]);

    return back();
}

}

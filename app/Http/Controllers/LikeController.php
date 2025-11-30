<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Photo;
use App\Models\Notification;

use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle($photoId)
    {
        $user = Auth::user();
        $photo = Photo::findOrFail($photoId);

        // If already liked → unlike
        if ($photo->isLikedBy($user)) {
            Like::where('photo_id', $photoId)
                ->where('user_id', $user->id)
                ->delete();

        } else {
            Like::create([
                'photo_id' => $photoId,
                'user_id' => $user->id,
            ]);
        }
if (!$photo->isLikedBy($user)) {
    Notification::create([
        'user_id' => $photo->user_id,
        'from_user_id' => $user->id,
        'type' => 'like',
        'message' => $user->name . ' liked your photo.',
        'photo_id' => $photoId,
    ]);
}
        return back();
    }
}

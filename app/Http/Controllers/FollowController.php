<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Notification;

class FollowController extends Controller
{
    public function follow($id)
    {
        $user = User::findOrFail($id);
        if (!auth()->user()->following->contains($id)) {
Notification::create([
    'user_id' => $id, // yang di-follow
    'from_user_id' => auth()->id(),
    'type' => 'follow',
    'message' => auth()->user()->name . ' started following you.',
]);
        }
        Auth::user()->following()->syncWithoutDetaching([$id]);

        return back();
    }

    public function unfollow($id)
    {
        Auth::user()->following()->detach($id);

        return back();
    }
}
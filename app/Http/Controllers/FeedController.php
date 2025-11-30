<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;


class FeedController extends Controller
{
public function index()
{
    $user = Auth::user();

    // Jika user TIDAK login → global feed
    if (!$user) {
        $feed = Photo::latest()->get();  
        return view('page.feed-real', compact('feed'));
    }

    // Login → feed based on follow
    $weekAgo = now()->subDays(7);

    $followingIDs = $user->following->pluck('id');

    // 1. Foto TEMAN minggu ini dulu
    $friendPhotos = Photo::whereIn('user_id', $followingIDs)
        ->where('created_at', '>=', $weekAgo)
        ->latest()
        ->get();

    // 2. Foto ORANG LAIN
    $otherPhotos = Photo::whereNotIn('user_id', $followingIDs)
        ->where('user_id', '!=', $user->id)
        ->latest()
        ->get();

    // Gabung feed
    $feed = $friendPhotos->merge($otherPhotos);

    return view('page.feed-real', compact('feed'));
}

public function search(Request $request)
{
    $query = $request->input('q');

    $users = User::where('name', 'like', "%$query%")
                ->where('id', '!=', auth()->id())
                ->limit(20)
                ->get();

    return view('page.search', compact('users', 'query'));
}
}

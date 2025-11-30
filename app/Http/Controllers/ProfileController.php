<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;



class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // nanti kita load photo user dari database
        // $photos = Photo::where('user_id', $user->id)->get();

        return view('profile.index', compact('user'));
    }
    public function edit()
{
    $user = Auth::user();
    return view('profile.edit', compact('user'));
}

public function update(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:50',
        'bio' => 'nullable|string|max:200',
        'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Update profile photo
    if ($request->hasFile('profile_photo')) {
        $file = $request->file('profile_photo');
        $path = $file->store('profile', 'public');
        $user->profile_photo = $path;
    }

    $user->name = $request->name;
    $user->bio = $request->bio ?? null;
    $user->save();

    return redirect()->route('profile')->with('success', 'Profile updated successfully!');
}
public function show($id)
{
    $user = User::findOrFail($id);
    return view('profile.index', compact('user'));
}
}
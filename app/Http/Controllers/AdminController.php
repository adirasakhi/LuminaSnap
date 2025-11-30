<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\User;
use App\Models\Report;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'photos' => Photo::latest()->get(),
            'reports' => Report::latest()->get(),
            'users' => User::latest()->get(),
        ]);
    }

    public function deletePhoto($id)
    {
        $photo = Photo::findOrFail($id);

        // delete file dari storage
        if ($photo->image && file_exists(storage_path("app/public/".$photo->image))) {
            unlink(storage_path("app/public/".$photo->image));
        }

        $photo->delete();

        return back()->with('success', 'Photo deleted');
    }

    public function banUser($id)
    {
        $user = User::findOrFail($id);
        $user->role = 'banned';
        $user->save();

        return back()->with('success', 'User banned');
    }

    public function unbanUser($id)
    {
        $user = User::findOrFail($id);
        $user->role = 'user';
        $user->save();

        return back()->with('success', 'User unbanned');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function store(Request $request, $photo_id)
    {
        $photo = Photo::findOrFail($photo_id);

        // Cegah spam
        if (Report::where('photo_id', $photo_id)
                  ->where('reporter_id', Auth::id())
                  ->exists()) {
            return back()->with('error', 'You already reported this photo.');
        }

        Report::create([
            'photo_id' => $photo_id,
            'reporter_id' => Auth::id(),
            'reason' => $request->reason,
        ]);

        return back()->with('success', 'Photo reported successfully!');
    }
}

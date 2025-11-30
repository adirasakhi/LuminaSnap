<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::where('user_id', Auth::id())
                                    ->orderBy('created_at', 'desc')
                                    ->get();

        // tandai semua notif sebagai read
        Notification::where('user_id', Auth::id())->update(['read' => true]);

        return view('notifications.index', compact('notifications'));
    }
}

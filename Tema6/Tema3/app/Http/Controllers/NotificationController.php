<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Matcher\Not;

class NotificationController extends Controller
{
    public function index($type)
    {
        if ($type === 'admin') {
            $unseen_notifications = Notification::where('receiver_email', Auth::guard('admin')->user()->email)
                                                ->unseen()
                                                ->get();
            $seen_notifications = Notification::where('receiver_email', Auth::guard('admin')->user()->email)
                                              ->seen()
                                              ->get();

            Notification::where('receiver_email', Auth::guard('admin')->user()->email)
                        ->unseen()
                        ->update(['seen' => 1]);

            return view('notifications\index', [
                'unseen_notifications' => $unseen_notifications,
                'seen_notifications' => $seen_notifications
            ]);
        }
        else {
            $unseen_notifications = Notification::where('receiver_email', Auth::user()->email)
                                                ->unseen()
                                                ->get();
            $seen_notifications = Notification::where('receiver_email', Auth::user()->email)
                                              ->seen()
                                              ->get();

            Notification::where('receiver_email', Auth::user()->email)
                ->unseen()
                ->update(['seen' => 1]);

            return view('notifications\index', [
                'unseen_notifications' => $unseen_notifications,
                'seen_notifications' => $seen_notifications
            ]);
        }

    }

}

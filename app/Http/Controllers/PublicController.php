<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Feedback;

class PublicController extends Controller
{
    function index()
    {
        $access = false;
        return view('template.home', compact('access', $access));
    }

    function menu()
    {
        return view('template.profile');
    }
    function restaurants()
    {
        return view('template.restaurants');
    }


    function checkout()
    {
        return view('template.checkout');
    }

    function feedback()
    {
        // return view('template.contact');
        if (!session('User')) {
            $access = true;
            return redirect(route('home', ['request' => $access]));
        } else {
            $user = User::where('id', session('User'))->first();

            return view('template.contact', compact('user', $user));
        }
    }
    function save_feedback(Request $request)
    {
        $request->validate([
            'subject' => 'required | min:10',
            'message' => 'required | min:15',
        ]);

        $feedback = Feedback::create([
            'userId' => $request->userID,
            'title' => $request->subject,
            'content' => $request->message,
        ]);

        if ($feedback) {
            return back()->with('success', 1);
        } else {
            return back()->with('fail', 'Some thing went wrong !');
        }
    }
}

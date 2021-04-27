<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    function save_location(Request $request)
    {
        session()->forget('Location');
        if ($request->ajax()) {
            $location = $request->location;
            $request->session()->put('Location', $location);
            return 1;
        }

    }
}

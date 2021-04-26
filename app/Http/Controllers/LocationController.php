<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    function save_location(Request $request)
    {
        if ($request->ajax()) {
            $location = $request->location;
            // session()->flush();
            $request->session()->put('Location', $location);
            return 1;
            // return redirect(route('restaurants'));
        }

    }
}

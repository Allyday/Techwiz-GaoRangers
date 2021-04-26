<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    function save_location(Request $request)
    {
        $location = $request->location;
        // dd($location);
        $request->session()->put('Location', $location);
        
        // xoa trong session
        // session()->flush();

        return redirect(route('restaurants', ['location' => $location]));

    }
}

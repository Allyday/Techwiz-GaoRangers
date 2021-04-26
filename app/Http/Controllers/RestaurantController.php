<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{

    function restaurants(Request $request)
    {

        // get full data

        if ($request->ajax()) {
            // $loop = 3;
            $view = view('template.dataRes', compact('loop'))->render();

            return response()->json(['html' => $view]);
        }

        if (isset($_GET['search'])) {
            // get data with keysearch
            $done = $_GET['search'];
            return "done: $done";
        };

        $loop = 6;
        return view('template.restaurants', compact('loop'));
        // return view('template.restaurants', compact('data'));
    }



    public function searchFromHome(Request $request)
    {
        $keysearch = $request->keysearch;
        // dd($request->all());
        return redirect()->route('restaurants', ['search' => $keysearch]);
    }



    public function filter(Request $request)
    {
        dd($request->all());

        $keysearch = $request->keysearch;
        // dd($request->all());
        return redirect()->route('restaurants', ['search' => $keysearch]);
    }
}

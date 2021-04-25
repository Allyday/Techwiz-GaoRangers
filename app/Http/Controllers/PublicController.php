<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    function index()
    {
        $access = false;
        return view('template.home', compact('access', $access));
    }

    function profile()
    {
        return view('template.profile');
    }
    function restaurants()
    {
        return view('template.restaurants');
    }

    function feedback()
    {
        return view('template.contact');
    }
    function checkout()
    {
        return view('template.checkout');
    }
}

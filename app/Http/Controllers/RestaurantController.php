<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{

    function restaurants(Request $request)
    {
        $publicController = new PublicController;
        $data = $publicController->search();
        // dd($data);

        // get full data

        if ($request->ajax()) {
            // $loop = 3;
            $view = view('template.dataRes', compact('loop'))->render();

            return response()->json(['html' => $view]);
        }

        if (isset($_GET['search'])) {
            // get data with keysearch
            $done = $_GET['search'];
            $location = session('Location');
            // return "done: $done , location: $location";

            $data = $publicController->search($done);
            dd($data);
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


    function addToCard(Request $request)
    {
        // $cart = session()-;

        // if (cart == null) {
        //       cart = [];
        //       cart.push(temp);
        // } else {
        //       $index = cart.findIndex((e) => {
        //          if (e.id === id) return true;
        //       });
        //       if (index <= -1) {
        //          cart.push(temp);
        //       }else {
        //          cart[index].quantity += 1;
        //       }
        // }

        // test = cart;

        // window.sessionStorage.setItem("cart", JSON.stringify(test));
        // console.log(test, '');

    }
}

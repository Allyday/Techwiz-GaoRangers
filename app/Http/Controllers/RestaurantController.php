<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;

use App\Models\Dish;
use App\Models\Order;
use App\Models\OrderDish;


class RestaurantController extends Controller
{

    function restaurants(Request $request)
    {
        $publicController = new PublicController;

        // get full data
        $data = $publicController->search();
        // return var_dump($data);


        if ($request->ajax()) {
            // $loop = 3;
            $view = view('template.dataRes', compact('loop'))->render();

            return response()->json(['html' => $view]);
        }

        if (isset($_GET['search'])) {
            // get data with keysearch
            $done = $_GET['search'];
            // $location = session('Location');
            // return "done: $done , location: $location";

            $data = $publicController->search($done);
            $loop = 6;
            return view('template.restaurants', compact('loop'));
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

        if ($request->ajax()) {

            $data = $request->cart;


            if (session()->has('Cart')) {
                $cart = session()->get('Cart');

                $index = -1;

                foreach ($cart as $k => $item) {
                    if (strcmp($item['id'], $data['id']) === 0) {
                        $index = $k;
                        break;
                    }
                }

                if ($index <= -1) {
                    array_push($cart, $data);
                    return 'them moi';
                } else {
                    $cart[$index]['quantity'] = (int)$cart[$index]['quantity'] + 1;
                    return $cart[$index]['quantity'];
                }
            } else {
                $cart = [];
                array_push($cart, $data);
                $request->session()->put('Cart', $cart);
            }

            return $cart;
        }
    }


    function pay_now(Request $request)
    {
        $array = $request->data['array'];
        $subtotal = $request->data['subtotal'];
        $user_id = session('User');
        $address = session('Location');
        $status = 2;
        $delivery = 2;
        $timeCreated = date('m/d/Y h:i:s ', time());
        $res_id = Dish::where('id', $array[0]['id'])->first()->restaurantId;

        $order = Order::create([
            'userId' =>  $user_id,
            'restaurantId' => $res_id,
            'timeCreated' => $timeCreated,
            'address' =>  $address,
            'is_active' => $status,
            'totalDishPrice' => $subtotal,
            'deliveryFee' => $delivery
        ]);

        if ($order) {
            foreach ($array as $item) {
                $orderDish = OrderDish::create([
                    'orderId' => (int)$order['id'],
                    'dishId' => (int)$item['id'],
                    'dishQuantity' => (int)$item['quantity']
                ]);
            };
            return 200;
        }
        
        return 500;
    }
}

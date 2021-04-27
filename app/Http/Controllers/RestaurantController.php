<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;

use App\Models\Dish;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\OrderDish;
use App\Models\DishCategory;
use App\Models\FoodTag;


class RestaurantController extends Controller
{
    function convertObjToArray($obj)
    {
        // convert obj to array
        $array = array_map(function ($value) {
            return (array)$value;
        }, $obj);
        return $array;
    }

    function convertRestaurant($ar)
    {
        // input obj from table db
        $array = $this->convertObjToArray($ar);

        $data = [];
        foreach ($array as $item) {
            $res = Restaurant::where('id', $item['r_id'])->first();
            $id = $res['id'];
            // $img = $res['img'];
            $name = $res['name'];
            $stars = (int)$res['stars'];
            $address = $res['street'] . ' ' . $res['municipality'] . ' ' . $res['district'] . ' ' . $res['city'];
            $wrap = array(
                'id' => $id,
                'name' => $name,
                'stars' => $stars,
                'address' => $address,
            );
            array_push($data, $wrap);
        }
        return $data;
    }

    function get_dish_cat()
    {
        // get dish category
        $dishCategory = DishCategory::all();
        $nameDishCat = [];

        foreach ($dishCategory as $k => $dish) {
            if ($k >= 4) {
                break;
            }
            $id = $dish->id;
            $name = $dish->name;
            $subDish = [
                'id' => $id,
                'name' => $name
            ];
            // dd($subDish);
            array_push($nameDishCat, $subDish);
        }
        return $nameDishCat;
    }

    function get_food_tag()
    {
        // get food tag
        $foodTag = FoodTag::all();

        $nameFoodTag = [];
        foreach ($foodTag as $k => $tag) {
            if ($k >= 8) {
                break;
            }
            $id = $tag->id;
            $name = $tag->name;
            $subTag = [
                'id' => $id,
                'name' => $name
            ];
            array_push($nameFoodTag, $subTag);
        }
        return $nameFoodTag;
    }

    function restaurants(Request $request)
    {
        // get category and tag
        $nameDishCat = $this->get_dish_cat();
        $nameFoodTag = $this->get_food_tag();

        // get full data
        $publicController = new PublicController();
        $rs = $publicController->search();

        // convert data obj to array
        $data = $this->convertRestaurant($rs);

        if (isset($_GET['search'])) {
            // get data with keysearch
            $keysearch = $_GET['search'];
            $rs = $publicController->search($keysearch = $keysearch);
            $data = $this->convertRestaurant($rs);
        };

        if (isset($_GET['page'])) {
            // get page number
            $page = $_GET['page'];
            $rs = $publicController->search($pg = $page);
            $data = $this->convertRestaurant($rs);
            return view('template.restaurants', compact('data'));
        };

        // return 
        if ($request->ajax()) {
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                
                $rs = $publicController->search($pg = $page);
                $data = $this->convertRestaurant($rs);

                $view = view('template.dataRes', compact('data'))->render();
                return response()->json(['html' => $view]);
            };
        }

        return view('template.restaurants', compact('data', 'nameDishCat', 'nameFoodTag'));
    }

    public function filter(Request $request)
    {
        // get category and tag
        $nameDishCat = $this->get_dish_cat();
        $nameFoodTag = $this->get_food_tag();

        $ks = $request->keysearch;
        $cat = $request->cat;
        $prices = $request->price;
        $tags = $request->tag;
        // dd($tags);
        $dataForm = [
            'ks' => $ks,
            'cat' => $cat,
            'prices' => $prices,
            'tags' => $tags
        ];

        $publicController = new PublicController();
        // get full data
        $rs = $publicController->search($keysearch = $ks, $tag = $tags, $cate = $cat, $price = $prices);
        $data = $this->convertRestaurant($rs);

        // dd($dataForm);
        // return back()
        //     ->with('dataForm', $dataForm)
        //     ->with('data', $data)
        //     ->with('nameDishCat', $nameDishCat)
        //     ->with('nameFoodTag', $nameFoodTag);

        return view('template.restaurants', compact('data', 'dataForm', 'nameDishCat', 'nameFoodTag'));
    }

    public function searchFromHome(Request $request)
    {
        $keysearch = $request->keysearch;
        return redirect()->route('restaurants', ['search' => $keysearch]);
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

        // bi chet o day vi chua co data
        $res_id = Dish::where('id', $array[0]['id'])->first()->restaurantId;

        $order = Order::create([
            'userId' =>  $user_id,
            'restaurantId' => $res_id,
            'timeCreated' => $timeCreated,
            'address' =>  $address,
            'orderStatus' => $status,
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

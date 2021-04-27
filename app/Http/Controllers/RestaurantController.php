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
use Carbon\Carbon;

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
            $photo = $res['photo'];
            $address = $res['street'] . ' ' . $res['municipality'] . ' ' . $res['district'] . ' ' . $res['city'];

            $arrayName = explode(',', $item['arrayName']);
            $arrayPrice = explode(',', $item['arrayPrice']);
            $arrayPhoto = explode(',', $item['arrayPhoto']);
            $arrayId = explode(',', $item['arrayId']);
            // dd($item);

            $wrap = array(
                'id' => $id,
                'name' => $name,
                'stars' => $stars,
                'address' => $address,
                'photo' => $photo,
                'arrayName' => $arrayName,
                'arrayPrice' => $arrayPrice,
                'arrayPhoto' => $arrayPhoto,
                'arrayId' => $arrayId,
            );
            array_push($data, $wrap);
        }
        // var_dump($array[0]['arrayId']);
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
        // get full data
        $publicController = new PublicController();

        // get category and tag
        $nameDishCat = $this->get_dish_cat();
        $nameFoodTag = $this->get_food_tag();
        // return
        if ($request->ajax()) {
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                $page = (int)$page;
                // dd($page);
                $rs = $publicController->search('', [], 0, 10, $page);
                // dd($rs);
                $data = $this->convertRestaurant($rs);

                $view = view('template.dataRes', compact('data'))->render();
                return response()->json(['html' => $view]);
            };
        }

        if (isset($_GET['page'])) {
            // get page number
            $page = $_GET['page'];
            $page = (int)$page;
            // dd($page);
            $rs = $publicController->search('', [], 0, 10, $page);
            $data = $this->convertRestaurant($rs);
            // dd($data);
            return view('template.restaurants', compact('data', 'nameDishCat', 'nameFoodTag'));
        };

        if (isset($_GET['search'])) {
            // get data with keysearch
            $keysearch = $_GET['search'];
            $rs = $publicController->search($keysearch, [], '', '', '', 1);
            $data = $this->convertRestaurant($rs);
        };


        $rs = $publicController->search();
        // convert data obj to array
        $data = $this->convertRestaurant($rs);


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
        $dataForm = [
            'ks' => $ks,
            'cat' => $cat,
            'prices' => $prices,
            'tags' => $tags
        ];
        //        dd($dataForm);
        $publicController = new PublicController();
        // get full data
        $rs = $publicController->search($keysearch = $ks, $tag = $tags, $cate = $cat, $price = $prices, 1);
        //        dd($rs);
        $data = $this->convertRestaurant($rs);
        // return view('template.restaurants', compact('data', 'dataForm', 'nameDishCat', 'nameFoodTag'));
        return back()
            ->with('data', $data)
            ->with('dataForm', $dataForm)
            ->with('nameDishCat', $nameDishCat)
            ->with('nameFoodTag', $nameFoodTag);
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
        $timeCreated = Carbon::now();
        // bi chet o day vi chua co data
        $res_id = Dish::where('id', $array[0]['id'])->first()->restaurantId;

        $order = new Order;
        $order->userId =  $user_id;
        $order->restaurantId = $res_id;
        $order->timeCreated = $timeCreated;
        $order->address =  $address;
        $order->orderStatus = $status;
        $order->totalDishPrice = $subtotal;
        $order->deliveryFee = $delivery;

        $order->save();
        // return $array[0]['quantity'];


        if ($order) {
            foreach ($array as $item) {
                // return $item;
                $orderDish = OrderDish::create([
                    'orderId' => (int)$order->id,
                    'dishId' => (int)$item['id'],
                    'dishQuantity' => (int)$item['quantity']
                ]);
            };
            return 200;
        }

        return 500;
    }
}

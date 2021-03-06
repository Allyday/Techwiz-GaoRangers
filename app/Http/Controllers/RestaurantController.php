<?php

namespace App\Http\Controllers;

use App\Models\DiscountCode;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;

use App\Models\Dish;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\OrderDish;
use App\Models\DishCategory;
use App\Models\FoodTag;
use Carbon\Carbon;

use function PHPUnit\Framework\isNull;

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
        if(!(session('Location'))){
            return redirect(route('home', ['location' => 'null']));
        }
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

                if (isset($_GET['search'])) {
                    $keysearch = $_GET['search'];
                    $rs = $publicController->search($keysearch, [], 0, 10, $page);
                    $data = $this->convertRestaurant($rs);

                    $view = view('template.dataRes', compact('data'))->render();
                    return response()->json(['html' => $view]);
                };


                $rs = $publicController->search('', [], 0, 10, $page);
                $data = $this->convertRestaurant($rs);

                $view = view('template.dataRes', compact('data'))->render();
                return response()->json(['html' => $view]);
            };
        }

        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            $page = (int)$page;

            if (isset($_GET['search'])) {
                $keysearch = $_GET['search'];
                $rs = $publicController->search($keysearch, [], 0, 10, $page);
                $data = $this->convertRestaurant($rs);
                if (count($data) == 0) {
                    $rs = $publicController->search('', [], 0, 10, $page);
                    $data = $this->convertRestaurant($rs);
                }

                return view('template.restaurants', compact('data', 'nameDishCat', 'nameFoodTag'));
            };

            $rs = $publicController->search('', [], 0, 10, $page);
            $data = $this->convertRestaurant($rs);
            return view('template.restaurants', compact('data', 'nameDishCat', 'nameFoodTag'));
        };

        if (isset($_GET['search'])) {
            $keysearch = $_GET['search'];

            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                $page = (int)$page;

                $rs = $publicController->search($keysearch, [], 0, 10, $page);
                $data = $this->convertRestaurant($rs);

                return view('template.restaurants', compact('data', 'nameDishCat', 'nameFoodTag'));
            }

            $rs = $publicController->search($keysearch, [], 0, 10, 1);
            $data = $this->convertRestaurant($rs);
            if (count($data) == 0) {
                $rs = $publicController->search('', [], 0, 10, 1);
                $data = $this->convertRestaurant($rs);
            }
            return view('template.restaurants', compact('data', 'nameDishCat', 'nameFoodTag'));
        };


        $rs = $publicController->search();
        $data = $this->convertRestaurant($rs);

        return view('template.restaurants', compact('data', 'nameDishCat', 'nameFoodTag'));
    }

    public function filter(Request $request)
    {
        // get category and tag
        $nameDishCat = $this->get_dish_cat();
        $nameFoodTag = $this->get_food_tag();

        $ks = '';
        $cat =  0;
        $prices = 10;
        $tags = [];

        if (isset($request->keysearch)) {
            $ks = $request->keysearch;
        }
        if (isset($request->cat)) {
            $cat = $request->cat;
        }
        if (isset($request->price)) {
            $prices = $request->price;
        }
        if (isset($request->tag)) {
            $tags = $request->tag;
        }
        $publicController = new PublicController();

        $rs = $publicController->search($ks, $tags, $cat, $prices, 1);
        $data = $this->convertRestaurant($rs);
        if (count($data) == 0) {
            $rs = $publicController->search('', [], 0, 10, 1);
            $data = $this->convertRestaurant($rs);
        }

        return view('template.restaurants', compact('data', 'nameDishCat', 'nameFoodTag'));
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

    function checkCoupons(Request $request){
        if($request->ajax()){
            $code = $request->code;
            $subtotal = $request->subtotal;
            // $code = '10%discount';
            $discount = DiscountCode::where('code',$code)->first();
            if(isset($discount)){
                if($discount->is_active == 0){
                    $type = 0;
                    $message = "Code khong ton tai!";
                    $arr = array('type' => $type,'value'=>$message);
                    return ($arr);
                }elseif ($discount->endDate<now()){
                    $type = 0;
                    $message = "Code da het han su dung!";
                    $arr = array('type' => $type,'value'=>$message);
                    return ($arr);
                }elseif ($discount->orderMin>$subtotal){
                    $type = 0;
                    $message = "Tong tien can tren ".$discount->orderMin.'$'." de su dung duoc ma nay!!!";
                    $arr = array('type' => $type,'value'=>$message);
                    return ($arr);
                }else{
                    $type = $discount->discountType;
                    if($type == 1){
                        $discountAmount = $subtotal*$discount->percentDiscounted;
                    }
                    if($type == 2){
                        $discountAmount = $discount->amountDiscounted;
                    }
                    $arr = array('type' => $type,'value'=>$discountAmount);
                    return ($arr);
                }
            }else{
                $type = 0;
                $message = "Code khong ton tai!";
                $arr = array('type' => $type,'value'=>$message);
                return ($arr);
            }
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Feedback;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;

use App\Models\Order;
use App\Models\OrderDish;
use App\Models\Restaurant;

class PublicController extends Controller
{
    function index()
    {
        $access = false;
        //get dish home

        $dishhome = DB::select('Select dishes.id,dishes.photo , dishes.name,restaurants.id as rId,restaurants.name as rName,
                       	dishes.price, dishes.description,restaurants.city as city,restaurants.district as dis,
                        restaurants.municipality as mini, restaurants.street
                        from dishes inner join restaurants on dishes.restaurantId = restaurants.id
                        where dishes.id in (88,97,98)');

        $dishhome = array_map(function ($value) {
            return (array)$value;
        }, $dishhome);

        // var_dump($dishhome[0]);
        // dd($dishhome[0]['photo']);

        // get data home page
        $rs = $this->topQuanDatNhieuNhat()->toArray();

        $rs = array_map(function ($value) {
            return (array)$value;
        }, $rs);
        $data = [];
        foreach ($rs as $i) {
            $temp = Restaurant::where('id', $i['restaurantId'])->first();
            array_push($data, $temp);
        }
        // dd($data);
        $resCount = Restaurant::all()->count('id');
        return view('template.home', compact('access', 'dishhome', 'data', 'resCount'));
    }

    function menu($id)
    {
        $res = DB::select('select * from restaurants where id = ?', [$id]);
        $dishes = DB::select('select restaurants.*, dishes.name as dishName, dishes.id as dishId , dishes.photo as photoDish, dishes.price as dishPrice from restaurants inner join dishes on restaurants.id = dishes.restaurantId where restaurants.id = ?', [$id]);

        return view('template.menu', compact('res', 'dishes'));
    }

    function history()
    {
        // get order
        // $order = Order::where('orderStatus', '<', 6)->first();


        $order = Order::where('userId', '=', session('User'))
            ->where('orderStatus', '<', 6)
            ->orderBy('timeCreated', 'DESC')
            ->first();


        if ($order == null) {
            return redirect(route('home', ['order' => 'null']));
        }

        $order_id = $order->id;
        // get order dish
        $order_dish = OrderDish::where('orderId', $order_id)->get();

        // dd($order_dish);
        $arrayDish = [];

        foreach ($order_dish as $orderDish) {
            $id = $orderDish['dishId'];
            $sl = $orderDish['dishQuantity'];
            $dish = Dish::where('id', $id)->first();
            $temp = [
                'dish' => $dish,
                'sl' => $sl
            ];
            array_push($arrayDish, $temp);
        }
        // dd($arrayDish[0]['dish']);
        $data = [
            'order' => $order,
            'arrayDish' => $arrayDish,
        ];

        return view('template.order-history')->with('data', $data);
    }

    function get_past_order(Request $request)
    {
        if ($request->ajax()) {

            $data = [];

            // get order
            $order = Order::where('userId', '=', session('User'))
                ->where('orderStatus', '=', 6)
                ->orderBy('timeCreated', 'DESC')
                ->limit(2)
                ->get();


            $res = Restaurant::where('id', $order[0]['restaurantId'])->first();

            $res_name = $res['name'];
            $res_photo = $res['photo'];
            $res_id = $res['id'];

            foreach ($order as $od) {
                $order_dish = OrderDish::where('orderId', $od['id'])->get();
                $soluongmon = count($order_dish);
                $timeCreated = $od['timeCreated'];
                $timeDelivered = $od['timeDelivered'];
                $address = $od['address'];
                $totalDishPrice = $od['totalDishPrice'];

                $item = [
                    'res_id' => $res_id,
                    'resName' => $res_name,
                    'resPhoto' => $res_photo,
                    'soluongmon' => $soluongmon,
                    'timeCreated' => $timeCreated,
                    'timeDelivered' => $timeDelivered,
                    'address' => $address,
                    'totalDishPrice' => $totalDishPrice,
                ];
                array_push($data, $item);
            }
            return $data;
        }
    }

    function checkout()
    {
        return view('template.checkout');
    }

    function feedback()
    {
        // return view('template.contact');
        if (!session('User')) {
            $access = true;
            return redirect(route('home', ['request' => $access]));
        } else {
            $user = User::where('id', session('User'))->first();

            return view('template.contact', compact('user', $user));
        }
    }
    function save_feedback(Request $request)
    {
        $request->validate([
            'subject' => 'required | min:10',
            'message' => 'required | min:15',
        ]);

        $feedback = Feedback::create([
            'userId' => $request->userID,
            'title' => $request->subject,
            'content' => $request->message,
        ]);

        if ($feedback) {
            return back()->with('success', 1);
        } else {
            return back()->with('fail', 'Some thing went wrong !');
        }
    }

    public function search($keysearch = '', $tag = [], $cate = 0, $price = 10,  $pg = 1)
    {

        //các biến lấy về từ request khi submit search
        $keysearch = $keysearch; //Lấy từ search theo tên - test = rice
        $tags = $tag; //mảng id của table food_tags - test = 15
        $cate = $cate; //id của table dish_category test = 5
        $price = $price; //giá tiền;
        $page = (int)$pg;
        //        dd($keysearch);
        $sql = "SELECT restaurants.id AS r_id,
                restaurants.name,
                restaurants.photo,
                GROUP_CONCAT(dishes.id) arrayId,
                GROUP_CONCAT(dishes.name) arrayName,
                GROUP_CONCAT(dishes.price) arrayPrice,
                GROUP_CONCAT(dishes.photo) arrayPhoto
                FROM restaurants
                LEFT JOIN dishes ON restaurants.id = dishes.restaurantId
                LEFT JOIN dish_categories ON dishes.dishCategoryId = dish_categories.id
                LEFT JOIN dish_tags ON dishes.id = dish_tags.dishId
                LEFT JOIN food_tags ON dish_tags.foodTagId = food_tags.id";
        //search theo ten:
        if ($keysearch != null && strlen($keysearch) > 0) {
            $sql .= " WHERE (restaurants.name like '%" . $keysearch . "%' OR dishes.name LIKE '%" . $keysearch . "%')";
        }
        //search theo dish_categoryId
        if ($cate > 0) {
            $sql .= " AND dish_categories.id =" . $cate . "";
        }
        //search theo gia
        if ($price > 0) {
            $sql .= " AND dishes.price <= " . $price . "";
        }
        //search theo dish_tagID
        $temp = "";
        if (is_array($tags) && $tags != null) {
            foreach ($tags as $tagId) {
                if ($tagId > 0) {
                    $temp .= "," . $tagId;
                }
            }

            $sql .= " AND dishes.id in (
                    SELECT dish_tags.dishId
				    FROM dish_tags
				    GROUP BY dish_tags.dishId
				    HAVING GROUP_CONCAT(dish_tags.foodTagId) like '" . $temp . "')";
        }
        $sql .= " GROUP by restaurants.id, restaurants.name, restaurants.photo ";
        // paginate
        if ($page > 0) {

            $page = ($page - 1) * 8;
        }
        $new_sql = "select a.* from (" . $sql . ") a ";
        $new_sql .= " LIMIT $page, 8";

        $table = DB::select($new_sql);
        // dd($new_sql);
        return $table;
    }

    public function topQuanDatNhieuNhat()
    {
        $table = DB::table('restaurants')
            ->leftJoin('orders', 'restaurants.id', 'orders.restaurantId')
            ->select(DB::raw('count(orders.id) as count, orders.restaurantId as restaurantId'))
            ->groupBy('orders.restaurantId')
            ->orderBy('count', 'desc')
            ->limit(6)
            ->get();
        // dd($table);
        return $table;
    }
}

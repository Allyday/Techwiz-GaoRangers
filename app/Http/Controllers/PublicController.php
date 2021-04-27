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
        // get data home page
        $data = [
            array(
                'name' => 'day la ten nha hang',
                'address' => 'day la dia chi nha hang',
                'star' => '3',
            )
        ];

        // $data = $this->topQuanDatNhieuNhat();

        return view('template.home', compact('access', 'data'));
    }

    function menu()
    {
        return view('template.menu');
    }

    function history()
    {
        // get order
        // $order = Order::where('is_active', '<', 6)->first();
        // $order_id = $order->id;

        // get order dish
        // $order_dish = OrderDish::where('orderId', $order_id)->all();

        return view('template.order-history');
    }

    function get_past_order(Request $request)
    {
        if ($request->ajax()) {
            $data = [];
            // get order
            $order = Order::where('is_active', '=', 6);
            $order = $order->to_array();
            $res = Restaurant::where('id', $order['restaurantId'])->first();
            $res_name = $res['name'];

            foreach ($order as $od) {
                $order_dish = OrderDish::where('orderId', $order['id'])->all()->to_array();
                $soluongmon = count($order_dish);
                $timeCreated = $od['timeCreated'];
                $timeDelivered = $od['timeDelivered'];
                $address = $od['address'];
                $totalDishPrice = $od['totalDishPrice'];

                $item = [
                    'resName' => $res_name,
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

    public function search($keysearch = null, $tag = null, $cate = null, $price = null, $xeptheosao = null)
    {
        //các biến lấy về từ request khi submit search
        $keysearch = $keysearch || ""; //Lấy từ search theo tên - test = rice
        $tags = $tag || []; //mảng id của table food_tags - test = 15
        $cate = $cate || 0; //id của table dish_category test = 5
        $price = $price || ""; //giá tiền;
        $xeptheosao = $xeptheosao || 0; // = 0 thi sap xep theo gan xa, = 1 thi sap xep theo stars

        $sql = "SELECT restaurants.id AS r_id,restaurants.name AS r_name,
                dishes.id as d_id, dishes.name AS d_name,
                dish_categories.id as c_id, dish_categories.name as c_name,
                food_tags.id as t_id
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
            $sql .= " AND dishes.price > " . $price . "";
        }
        //search theo dish_tagID
        $temp = "";
        if (is_array($tags)) {
            foreach ($tags as $tagId) {
                if ($tagId > 0) {
                    $temp .= "," . $tagId;
                }
            }

            $sql .= " AND dishes.id in (
                    SELECT dish_tags.dishId
				    FROM dish_tags
				    GROUP BY dish_tags.dishId
				    HAVING GROUP_CONCAT(dish_tags.foodTagId) = '" . $temp . "')";
        }
        //sap xep theo so sao
        if ($xeptheosao = 1) {
            $sql .= " ORDER BY restaurants.stars DESC";
        }


        $table = DB::select($sql);

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
        dd($table);
        return $table;
    }
}

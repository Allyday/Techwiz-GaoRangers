<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Feedback;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    function index()
    {
        $access = false;


        // get data home page


        return view('template.home', compact('access', $access));
    }

    function menu()
    {
        return view('template.menu');
    }

    function history()
    {
        // return view('template.order-history');
        if (!session('User')) {
            $access = true;
            return redirect(route('home', ['request' => $access]));
        } else {
            $user = User::where('id', session('User'))->first();

            return view('template.order-history', compact('user', $user));
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

    public function search($keysearch=null, $tag = null, $cate = null, $price = null, $xeptheosao = null)
    {
        //các biến lấy về từ request khi submit search
        $searchTen = "" || $keysearch; //Lấy từ search theo tên - test = rice
        $tags = [] || $tag; //mảng id của table food_tags - test = 15
        $cate = 0 || $cate; //id của table dish_category test = 5
        $price = "" || $price; //giá tiền;
        $xeptheosao = 0 || $xeptheosao; // = 0 thi sap xep theo gan xa, = 1 thi sap xep theo stars
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
        if ($searchTen != null && strlen($searchTen) > 0) {
            $sql .= " WHERE (restaurants.name like '%" . $searchTen . "%' OR dishes.name LIKE '%" . $searchTen . "%')";
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
        if (is_array($tags)) {
            foreach ($tags as $tagId) {
                if ($tagId > 0) {
                    $sql .= " AND food_tags.id = " . $tagId . "";
                }
            }
        }
        //sap xep theo so sao
        if ($xeptheosao = 1) {
            $sql .= " ORDER BY restaurants.stars DESC";
        }


        $table = DB::select($sql);
        // dd($table);
        return $table;
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\DishCategory;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class testController extends Controller
{
    public function index(){
        $searchTen = "rice";
        $tags = [15,5];
        $cate = 5;
        $price = "";
        $xeptheosao = 0;
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
        if($searchTen != null && strlen($searchTen) > 0){
            $sql .= " WHERE (restaurants.name like '%".$searchTen."%' OR dishes.name LIKE '%".$searchTen."%')";
        }
        //search theo dish_categoryId
        if ($cate >0){
            $sql .= " AND dish_categories.id =".$cate."";
        }
        //search theo gia
        if($price > 0){
            $sql .=" AND dishes.price > ".$price."";
        }

        //search theo dish_tagID
        $temp = "";
        if (is_array($tags)) {
            foreach ($tags as $key=>$tagId) {
                if($tagId > 0 && $key == 0){
                    $temp .= $tagId;
                }elseif($tagId > 0) {
                    $temp .= ",".$tagId;
                }
            }

            $sql .=" AND dishes.id in (
                    SELECT dish_tags.dishId
				    FROM dish_tags
				    GROUP BY dish_tags.dishId
				    HAVING GROUP_CONCAT(dish_tags.foodTagId) = '".$temp."')";
        }
        //sap xep theo so sao
        if ($xeptheosao = 1) {
            $sql .= " ORDER BY restaurants.stars DESC";
        }
        $table = DB::select($sql);
        $table = DB::
        dd($temp);
        dd($table);
        return view('test.test');
    }

    
    public function topQuanDatNhieuNhat(){
        $table = DB::table('restaurants')
            ->leftJoin('orders','restaurants.id','orders.restaurantId')
            ->select(DB::raw('count(orders.id) as count, orders.restaurantId as restaurantId'))
            ->groupBy('orders.restaurantId')
            ->orderBy('count','desc')
            ->limit(6)
            ->get();
        return;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function index($option)
    {
        if ($option == 'day') {
            $thongke = DB::select('SELECT DATE(timeDelivered) AS label, SUM(totalDishPrice) AS y FROM orders where 1 = ? and is_active = ? and restaurantId = (SELECT restaurantId from users WHERE id = ?) GROUP BY DATE(timeDelivered)', [1,5,session('User')]);
        
         } elseif ($option == 'month') {
            $thongke = DB::select("SELECT DATE(timeDelivered) AS label, SUM(totalDishPrice) AS y FROM orders where 1 = ? and is_active = ? and DATE(timeDelivered) LIKE '%2021-04%' and restaurantId = (SELECT restaurantId from users WHERE id = ?) GROUP BY DATE(timeDelivered)", [1,5,session('User')]);
         } elseif ($option == 'quarter') {
            $thongke = DB::select("SELECT DATE(timeDelivered) AS label, SUM(totalDishPrice) AS y FROM orders where 1 = ? and is_active = ? and DATE(timeDelivered) LIKE '%2021-04%' or DATE(timeDelivered) LIKE '%2021-03%' or DATE(timeDelivered) LIKE '%2021-02%' and restaurantId = (SELECT restaurantId from users WHERE id = ?) GROUP BY DATE(timeDelivered)", [1,5,session('User')]);
         } elseif ($option == 'year') {
            $thongke = DB::select('SELECT DATE(timeDelivered) AS label, SUM(totalDishPrice) AS y FROM orders where 1 = ? and is_active = ? and DATE(timeDelivered) LIKE "%2021%" and restaurantId = (SELECT restaurantId from users WHERE id = ?) GROUP BY DATE(timeDelivered)', [1,5,session('User')]);
         } else return null;

        $hoanthanh = DB::select('SELECT COUNT(id) as c from orders WHERE is_active = ? or is_active = ? and restaurantId = (SELECT restaurantId from users WHERE id = ?)', [4,5,session('User')]);
        $bihuy = DB::select('SELECT COUNT(id) as c from orders WHERE is_active = ? and restaurantId = (SELECT restaurantId from users WHERE id = ?)', [6,session('User')]);
        $tuchoi = DB::select('SELECT COUNT(id) as c from orders WHERE is_active = ? and restaurantId = (SELECT restaurantId from users WHERE id = ?)', [7,session('User')]);
        $khachhang = DB::select('SELECT COUNT(userId) as c from orders WHERE restaurantId = (SELECT restaurantId from users WHERE id = ?) GROUP BY userId', [session('User')]);

  
        return view('view_admin.index', compact('thongke', 'tuchoi', 'bihuy', 'hoanthanh', 'khachhang'));
    }

    function products()
    {
        return view('view_admin.productAll');
    }

    function type_product()
    {
        return view('view_admin.typeproduct');
    }
    
    // function getRevenue($option)
    // {
    //    if ($option == 'day') {
    //       $query = "SELECT DATE(timeDelivered) AS label, SUM(totalDishPrice) AS y FROM orders where 1 = ? GROUP BY DATE(timeDelivered)";
    //    } elseif ($option == 'month') {
    //       $query = "SELECT CONCAT(MONTH( DATE(date_order)),' - ',YEAR( DATE(date_order))) AS label , SUM(total_bill) AS y FROM bill GROUP BY MONTH( DATE(date_order)),YEAR( DATE(date_order))";
    //    } elseif ($option == 'quarter') {
    //       $query = "SELECT CONCAT('Quý ',QUARTER(date_order),' - ',YEAR( DATE(date_order))) AS label , SUM(total_bill) AS y FROM bill GROUP BY QUARTER( date_order),YEAR( DATE(date_order))";
    //    } elseif ($option == 'year') {
    //       $query = "SELECT YEAR( DATE(date_order)) AS label, SUM(total_bill) AS y FROM bill GROUP BY YEAR( DATE(date_order))";
    //    } else return null;

    //    return DB::select('$query', [1]);
    // }

    function setting_account()
    {
        return view('view_admin.adminaccount');
    }


}

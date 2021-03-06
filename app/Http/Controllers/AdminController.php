<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function index($option)
    {
        if (!session('User_type') || session('User_type') != 1) {
            return redirect(route('home'));
        }
        if ($option == 'day') {
            $thongke = DB::select('SELECT DATE(timeDelivered) AS label, SUM(totalDishPrice) AS y FROM orders where 1 = ? and orderStatus = ? and restaurantId = (SELECT restaurantId from users WHERE id = ?) GROUP BY DATE(timeDelivered)', [1, 6, session('User')]);
        } elseif ($option == 'month') {
            $thongke = DB::select("SELECT DATE(timeDelivered) AS label, SUM(totalDishPrice) AS y FROM orders where 1 = ? and orderStatus = ? and DATE(timeDelivered) LIKE '%2021-04%' and restaurantId = (SELECT restaurantId from users WHERE id = ?) GROUP BY DATE(timeDelivered)", [1, 6, session('User')]);
        } elseif ($option == 'quarter') {
            $thongke = DB::select("SELECT DATE(timeDelivered) AS label, SUM(totalDishPrice) AS y FROM orders where 1 = ? and orderStatus = ? and DATE(timeDelivered) LIKE '%2021-04%' or DATE(timeDelivered) LIKE '%2021-03%' or DATE(timeDelivered) LIKE '%2021-02%' and restaurantId = (SELECT restaurantId from users WHERE id = ?) GROUP BY DATE(timeDelivered)", [1, 6, session('User')]);
        } elseif ($option == 'year') {
            $thongke = DB::select('SELECT DATE(timeDelivered) AS label, SUM(totalDishPrice) AS y FROM orders where 1 = ? and orderStatus = ? and DATE(timeDelivered) LIKE "%2021%" and restaurantId = (SELECT restaurantId from users WHERE id = ?) GROUP BY DATE(timeDelivered)', [1, 6, session('User')]);
        } else return null;

        $hoanthanh = DB::select('SELECT COUNT(id) as c from orders WHERE orderStatus = ? or orderStatus = ? and restaurantId = (SELECT restaurantId from users WHERE id = ?)', [6, 7, session('User')]);
        $bihuy = DB::select('SELECT COUNT(id) as c from orders WHERE orderStatus = ? and restaurantId = (SELECT restaurantId from users WHERE id = ?)', [8, session('User')]);
        $tuchoi = DB::select('SELECT SUM(totalDishPrice) as c from orders WHERE restaurantId = (SELECT restaurantId from users WHERE id = ?)', [session('User')]);
        $khachhang = DB::select('SELECT COUNT(userId) as c from orders WHERE restaurantId = (SELECT restaurantId from users WHERE id = ?) GROUP BY restaurantId', [session('User')]);


        return view('view_admin.index', compact('thongke', 'tuchoi', 'bihuy', 'hoanthanh', 'khachhang'));
    }

    function products()
    {
        return view('view_admin.productAll');
    }

    function type_product()
    {
        if (!session('User_type') || session('User_type') != 1) {
            return redirect(route('home'));
        }
        return view('view_admin.typeproduct');
    }

    // function getRevenue($option)
    // {
    //    if ($option == 'day') {
    //       $query = "SELECT DATE(timeDelivered) AS label, SUM(totalDishPrice) AS y FROM orders where 1 = ? GROUP BY DATE(timeDelivered)";
    //    } elseif ($option == 'month') {
    //       $query = "SELECT CONCAT(MONTH( DATE(date_order)),' - ',YEAR( DATE(date_order))) AS label , SUM(total_bill) AS y FROM bill GROUP BY MONTH( DATE(date_order)),YEAR( DATE(date_order))";
    //    } elseif ($option == 'quarter') {
    //       $query = "SELECT CONCAT('Qu?? ',QUARTER(date_order),' - ',YEAR( DATE(date_order))) AS label , SUM(total_bill) AS y FROM bill GROUP BY QUARTER( date_order),YEAR( DATE(date_order))";
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

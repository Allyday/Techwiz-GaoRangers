<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    public function index()
    {
        $dsorders = DB::select('Select orders.*, users.firstName, users.lastName from orders INNER JOIN users on orders.userId = users.id WHERE orders.restaurantId = (SELECT restaurantId from users WHERE id = ?);', [session('User')]);
        return view('view_staff.order', compact("dsorders"));
    }

    public function create()
    {
        //
    }   

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $order = Order::find($id);
        $dsdish = DB::select('SELECT * FROM orderdish inner join orders on orderdish.orderId = orders.id INNER JOIN dishes on orderdish.dishId = dishes.id where orderId =  ?', [$id]);
        $ttorder = DB::select('Select orders.*, users.firstName, users.lastName from orders INNER JOIN users on orders.userId = users.id WHERE orders.id = ?', [$id]);
        return view('view_staff.orderDetail', compact("dsdish","ttorder"))->with('order',$order);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $time = now();
        if ($request->input('orderStatus') == 3) {
            $order = Order::where('id',$id)
                ->update([
                    'orderStatus'=>$request->input('orderStatus'),
                    'timeAccepted'=>$time
                ]);
        }
        elseif ($request->input('orderStatus') == 4){
            $order = Order::where('id',$id)
                ->update([
                    'orderStatus'=>$request->input('orderStatus'),
                    'timeDoneCooking'=>$time
                ]);
        }
        // elseif ($request->input('orderStatus') == 5){
        //     $order = Order::where('id',$id)
        //         ->update([
        //             'orderStatus'=>$request->input('orderStatus'),
        //             'timePickedUp'=>$time
        //         ]);
        // }
        return redirect('/staff/orderStaff');
    }

    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {   
        $search = $request->input('search');
        $dsorders = DB::select('Select orders.*, users.firstName, users.lastName from orders INNER JOIN users on orders.userId = users.id WHERE orders.restaurantId = (SELECT restaurantId from users WHERE id = ?) and orders.id = ?;', [session('User'), $search]);
        return view('view_staff.orderSearch', compact("dsorders"));
    }

    public function searchStatus(Request $request)
    {   
        $dsorders = ['không có dữ liệu'];
        if ($request->search == 2) {
            $dsorders = DB::select('Select orders.*, users.firstName, users.lastName from orders INNER JOIN users on orders.userId = users.id WHERE orders.restaurantId = (SELECT restaurantId from users WHERE id = ?) and orders.orderStatus = ?;', [session('User'), 2]);
            return view('view_staff.orderSearchStatus', compact("dsorders"));

        }
        if ($request->search == 3) {
            $dsorders = DB::select('Select orders.*, users.firstName, users.lastName from orders INNER JOIN users on orders.userId = users.id WHERE orders.restaurantId = (SELECT restaurantId from users WHERE id = ?) and orders.orderStatus = ?;', [session('User'), 3]);
            return view('view_staff.orderSearchStatus', compact("dsorders"));

        }
        if ($request->search == 4) {
            $dsorders = DB::select('Select orders.*, users.firstName, users.lastName from orders INNER JOIN users on orders.userId = users.id WHERE orders.restaurantId = (SELECT restaurantId from users WHERE id = ?) and orders.orderStatus >= ?;', [session('User'), 4]);
            return view('view_staff.orderSearchStatus', compact("dsorders"));

        }
    }

    public function cancel(Request $request, $id)
    {
        $time = now();
        $order = Order::where('id',$id)
            ->update([
                'orderStatus'=>$request->input('orderCancel'),
                'timeRejected'=>$time
            ]);

        return redirect('/staff/orderStaff');
    }
}

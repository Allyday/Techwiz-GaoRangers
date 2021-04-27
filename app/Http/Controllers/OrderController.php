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
        if ($request->input('is_active') == 2) {
            $order = Order::where('id',$id)
                ->update([
                    'is_active'=>$request->input('is_active'),
                    'timeAccepted'=>$time
                ]);
        }
        elseif ($request->input('is_active') == 3){
            $order = Order::where('id',$id)
                ->update([
                    'is_active'=>$request->input('is_active'),
                    'timeDoneCooking'=>$time
                ]);
        }
        // elseif ($request->input('is_active') == ){
        //     $order = Order::where('id',$id)
        //         ->update([
        //             'is_active'=>$request->input('is_active'),
        //             'timePickedUp'=>$time
        //         ]);
        // }
        return redirect('/staff/orderStaff');
    }

    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsorders = DB::select('Select orders.*, users.firstName, users.lastName from orders INNER JOIN users on orders.userId = users.id WHERE orders.restaurantId = (SELECT restaurantId from users WHERE id = ?);', [session('User')]);
        return view('view_staff.order', compact("dsorders"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $dsdish = DB::select('SELECT * FROM orderdish inner join orders on orderdish.orderId = orders.id INNER JOIN dishes on orderdish.dishId = dishes.id where orderId =  ?', [$id]);
        $ttorder = DB::select('Select orders.*, users.firstName, users.lastName from orders INNER JOIN users on orders.userId = users.id WHERE orders.id = ?', [$id]);
        return view('view_staff.orderDetail', compact("dsdish","ttorder"))->with('order',$order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $time = now();
        if ($request->input('is_active') == 3) {
            $order = Order::where('id',$id)
                ->update([
                    'is_active'=>$request->input('is_active'),
                    'timeAccepted'=>$time
                ]);
        }
        elseif ($request->input('is_active') == 4){
            $order = Order::where('id',$id)
                ->update([
                    'is_active'=>$request->input('is_active'),
                    'timeDoneCooking'=>$time
                ]);
        }
        // elseif ($request->input('is_active') == 5){
        //     $order = Order::where('id',$id)
        //         ->update([
        //             'is_active'=>$request->input('is_active'),
        //             'timePickedUp'=>$time
        //         ]);
        // }
        return redirect('/staff/orderStaff');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            $dsorders = DB::select('Select orders.*, users.firstName, users.lastName from orders INNER JOIN users on orders.userId = users.id WHERE orders.restaurantId = (SELECT restaurantId from users WHERE id = ?) and orders.is_active = ?;', [session('User'), 2]);
            return view('view_staff.orderSearchStatus', compact("dsorders"));

        }
        if ($request->search == 3) {
            $dsorders = DB::select('Select orders.*, users.firstName, users.lastName from orders INNER JOIN users on orders.userId = users.id WHERE orders.restaurantId = (SELECT restaurantId from users WHERE id = ?) and orders.is_active = ?;', [session('User'), 3]);
            return view('view_staff.orderSearchStatus', compact("dsorders"));

        }
        if ($request->search == 4) {
            $dsorders = DB::select('Select orders.*, users.firstName, users.lastName from orders INNER JOIN users on orders.userId = users.id WHERE orders.restaurantId = (SELECT restaurantId from users WHERE id = ?) and orders.is_active >= ?;', [session('User'), 4]);
            return view('view_staff.orderSearchStatus', compact("dsorders"));

        }
    }
}

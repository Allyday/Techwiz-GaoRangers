<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!session('User_type') || session('User_type') != 1) {
            return redirect(route('home'));
        }
        $dsdishes = DB::select('select dishes.*,dish_categories.name as categoryName, restaurants.name as restaurantName from dishes inner join dish_categories on dishes.dishCategoryId = dish_categories.id inner join restaurants on dishes.restaurantId = restaurants.id where restaurants.id in (select restaurants.id from users inner join restaurants on users.restaurantId = restaurants.id where users.id = ?) and dishes.is_active = ?', [session('User'), 1]);
        return view('view_staff.dishes', compact("dsdishes"));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        if (!session('User_type') || session('User_type') != 1) {
            return redirect(route('home'));
        }
        $restaurant = DB::select('select restaurantId from users where id = ?', [session('User')]);
        $category = DB::select('select * from dish_categories where 1 = ?', [1]);
        return view('view_staff.createDish', compact("restaurant", "category"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!session('User_type') || session('User_type') != 1) {
            return redirect(route('home'));
        }
        $dish = Dish::create([
            'name'=>$request->input('name'),
            'dishCategoryId'=>$request->input('categoryId'),
            'restaurantId'=>$request->input('restaurantId'),
            'description'=>$request->input('description'),
            'price'=>$request->input('price'),
            'photo'=>$request->input('photo'),
        ]);

        return redirect('/staff/dishes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!session('User_type') || session('User_type') != 1) {
            return redirect(route('home'));
        }
        $dish = Dish::find($id);
        $restaurant = DB::select('select restaurants.id as restaurantsId, restaurants.name as restaurantName, dish_categories.id as categoryId, dish_categories.name as categoryName from dishes inner join restaurants on dishes.restaurantId = restaurants.id inner join dish_categories on dishes.dishCategoryId = dish_categories.id where dishes.id = ?', [$id]);
        $category = DB::select('select * from dish_categories where 1 = ?', [1]);

        return view('view_staff.editDish', compact("restaurant", "category"))->with('dish', $dish, $restaurant);
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
        if (!session('User_type') || session('User_type') != 1) {
            return redirect(route('home'));
        }
        $dish = Dish::where('id',$id)
            ->update([
                'name'=>$request->input('name'),
                'dishCategoryId'=>$request->input('categoryId'),
                'description'=>$request->input('description'),
                'price'=>$request->input('price'),
                'photo'=>$request->input('photo'),
        ]);
        return redirect('/staff/dishes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (!session('User_type') || session('User_type') != 1) {
            return redirect(route('home'));
        }
        $dish = Dish::where('id',$id)
        ->update([
            'is_active'=>$request->input('is_active'),
        ]);
        return redirect('/staff/dishes');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

use App\Http\Requests\ValidateRegisterRequest;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    function index(){
        $dsusers = DB::select('select * from users where 1 = ? and id = ?', [1, session('User')]);
        return view('view_admin.adminaccount', compact("dsusers", $dsusers ));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $restaurant = DB::select('select users.*, restaurant.name from user inner join restaurants on user.restaurantId = restaurants.id where users.id = ?', [session('User')]);
        return view('view_staff.editDish', compact("restaurant", "category"))->with('dish', $user, $restaurant);
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
        $user = User::where('id',$id)
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
    public function destroy($id)
    {
        session()->flush();
        $delete = DB::delete('delete from users where id = ?', [$id]);  
        $deleteAddress = DB::delete('delete from user_addresses where userId = ?', [$id]); 
        return redirect('/');

    }

    function setting($id)
    {
        $user = User::find($id);
        $dsusers = DB::select('select users.*, user_addresses.address from users inner join user_addresses on users.id = user_addresses.userId where 1 = ? and users.id = ?', [1, session('User')]);
        return view('view_staff.settingAuth', compact("dsusers"))->with('user', $user);
    }


    function editpass(Request $request, $id)
    {
        $request->validate([
            'password' => 'required | max: 12 | min:4',
            'newpass' => 'required | max: 12 | min:4',
            'confirmpass' => 'required | max: 12 | min:4'
        ]);


        // get user
        $user = User::get()->where('id', '=', $request->id)->first();
        
        // get password, check password
        if (!Hash::check($request->password, $user->password)) {
            return back()->with('fail', 'Incorrect password');
        } else {
            if (Hash::check($request->newpass, $user->password)) {
                return back()->with('fail', 'Do not type your old password');
            } else {
                if ($request->newpass != $request->confirmpass) {
                    return back()->with('fail', 'Password not same with confirm password');
                }
                // update
                $user->password = Hash::make($request->newpass);
                $user->save();
                $users = User::where('id', $id)
                    ->update([
                        'phoneNumber'=>$request->input('phoneNumber'),
                        'firstName'=>$request->input('firstName'),
                        'lastName'=>$request->input('lastName'),
                        'gender'=>$request->input('gender'),
                        'mail'=>$request->input('mail'),
                ]);
                $useraAdress = UserAddress::where('userId', $id)
                    ->update([
                        'address'=>$request->input('address'),
                ]);

                return back()->with('success', 'Update password success');
            }
        }
        return redirect('/staff');
       
    }
}

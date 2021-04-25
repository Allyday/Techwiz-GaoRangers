<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Models\User;
use App\Rules\StaffRule;
use App\Http\Requests\ValidateRegisterRequest;


class AuthController extends Controller
{
    function login()
    {
        $access = true;
        return redirect(route('home', ['request' => $access]));
    }

    function check(Request $request)
    {
        // validation request
        $request->validate([
            'username' => 'required ',
            'password' => 'required | max: 12 | min:4',
        ]);

        $user = User::get()->where('userName', '=', $request->username)->first();
        print_r($user);

        if (!$user) {
            return back()->with('fail', 'We do not recognize your email address !');
        } else {
            // check password

            if (!Hash::check($request->password, $user->password)) {

                return back()->with('fail', 'Incorrect password');
            } else {
                if ($user->type == 2) {
                    $request->session()->put('User', $user->id);
                    return redirect(route('home'));
                }

                $request->session()->put('User', $user->id);
                $request->session()->put('User_type', $user->type);
                return redirect(route('staff'));
            }
        }
    }



    function register()
    {
        return view('auth.registration');
    }

    function save(ValidateRegisterRequest $request)
    {
        // validation request
        $request->validated();

        if ($request->repeatPass == $request->password) {
            // set default for column : `picture`
            $picture = 'http://img/';


            if ($request->type == 1) {
                // create user for staff
                $user = new User();

                $user->phoneNumber = $request->phoneNumber;
                $user->mail = $request->mail;
                $user->password = Hash::make($request->password);
                $user->gender = $request->gender;
                $user->firstName = $request->firstName;
                $user->lastName = $request->lastName;
                $user->type = $request->type;
                $user->picture = $picture;
                $user->userName = '_' . $request->restaurantId . $request->userName;
                $user->restaurantId = $request->restaurantId;

                $save = $user->save();

                if ($save) {

                    $request->session()->put('User', $user->id);
                    $request->session()->put('User_type', $user->type);

                    return redirect(route('staff'));
                } else {
                    return back()->with('fail, Something went wrong, try again later !');
                }
            } else {
                // create user for customer
                $user = new User();

                $user->phoneNumber = $request->phoneNumber;
                $user->mail = $request->mail;
                $user->password = Hash::make($request->password);
                $user->gender = $request->gender;
                $user->firstName = $request->firstName;
                $user->lastName = $request->lastName;
                $user->type = $request->type;
                $user->picture = $picture;
                $user->userName = $request->userName;

                $save = $user->save();

                if ($save) {
                    $request->session()->put('User', $user->id);
                    $request->session()->put('User_type', $user->type);

                    return redirect(route('home'));
                } else {
                    return back()->with('fail', 'Something went wrong, try again later !');
                }
            }
        } else {
            return back()->with('repeatPass', 'Check Repeat pass field !');
        }
    }


    function register_staff()
    {
        return view('auth.register_staff');
    }

    function logout()
    {
        if (session()->has('User')) {
            session()->flush();
            return redirect(route('home'));
        }
        return redirect(route('home'));
    }

    function admin()
    {
        $user = User::get()->where('id', '=', session('User'))->first();
        $data = ['user' => $user];
        return view('admin/dashboard', compact('user', $data));
    }


    function editpass(Request $request)
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

                return back()->with('success', 'Update password success');
            }
        }
    }
}

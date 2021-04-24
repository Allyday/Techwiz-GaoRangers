<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Models\Admin;

use App\Http\Requests\RegisterValidationRequest;
use App\Http\Requests\LoginValidationRequest;

class AuthController extends Controller
{
    function login()
    {
        return view('auth.login');
    }

    function check(LoginValidationRequest $request)
    {
        // validation request
        $request->validated();

        $user = Admin::get()->where('email', '=', $request->email)->first();

        if (!$user) {
            return back()->with('fail', 'We do not recognize your email address !');
        } else {
            // check password
            if (!Hash::check($request->password, $user->password)) {
                return back()->with('fail', 'Incorrect password');
            } else {
                $request->session()->put('User', $user->id);

                return redirect(route('admin'));
            }
        }
    }



    function register()
    {
        return view('auth.register');
    }

    function save(RegisterValidationRequest $request)
    {
        // validation request
        $request->validated();

        // insert to database
        $user = Admin::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $save = $user->save();

        if ($save) {
            return back()->with('success', 'Create success account !');
        } else {
            return back()->with('fail', 'Something went wrong, try again later !');
        }
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
        $user = Admin::get()->where('id', '=', session('User'))->first();
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
        $user = Admin::get()->where('id', '=', $request->id)->first();

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

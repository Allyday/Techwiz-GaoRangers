<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function index(){
        $dsusers = DB::select('select * from users where 1 = ? and id = ?', [1, session('User')]);
        return view('view_admin.adminaccount', compact("dsusers", $dsusers ));
    }

}

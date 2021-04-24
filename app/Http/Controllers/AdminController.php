<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        return view('view_admin.index');
    }

    function products()
    {
        return view('view_admin.productAll');
    }

    function type_product()
    {
        return view('view_admin.typeproduct');
    }

    function setting_account()
    {
        return view('view_admin.adminaccount');
    }
}

<?php 

use App\Models\User;

if (session('User')) {
    $user = User::where('id', session('User'))->first();
}
?>

<!--header starts-->
<header id="header" class="header-scroll top-header headrom">
    <!-- .navbar -->
    <nav class="navbar navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}"> <img class="img-rounded" src="{{ asset('images/food-picky-logo.png') }}" alt=""> </a>

            @if ($_SERVER['REQUEST_URI'] == '/auth/register')
            @else
            <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
            <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link @if(url()->current() == route('home')) active @endif" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link @if(url()->current() == route('restaurants')) active @endif" href="{{ route('restaurants') }}">All Restaurants</a>
                    </li>

                    @if (session('User'))

                    <li class="nav-item">
                        <a class="nav-link @if(url()->current() == route('order-history')) active @endif" href="{{route('order-history')}}">My Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(url()->current() == route('checkout')) active @endif" href="{{route('checkout')}}">My Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(url()->current() == route('feedback')) active @endif" href="{{route('feedback')}}">Feedback</a>
                    </li>



                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Hello, {{ $user->firstName }}</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="javascript:void(0)">Account Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#sureLogout">Log out</a>
                        </div>
                    </li>

                    @else
                    <li class="nav-item"> <a class="nav-link" href="javascript:void(0)" data-toggle="modal" data-target="#modalLogin">Log in </a> </li>
                    @endif

                </ul>
            </div>

            @endif
        </div>
    </nav>
    <!-- /.navbar -->
</header>

<div id="sureLogout" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure logout ?</h5>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a href="{{ route('auth.logout') }}" type="button" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</div>
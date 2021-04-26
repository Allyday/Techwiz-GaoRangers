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
                        <a class="nav-link active" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('restaurants') }}">Restaurants</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('feedback')}}">Feedback</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('checkout')}}">Checkout</a>
                        </div>
                    </li>
                    @if (session('User'))
                    <li class="nav-item"> <a class="nav-link" href="javascript: void(0)" data-toggle="modal" data-target="#sureLogout">Logout</a> </li>
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
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
                    <li class="nav-item"> <a class="nav-link active" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a> </li>

                    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Food</a>
                        <div class="dropdown-menu"> <a class="dropdown-item" href="{{ route('food_result') }}">Food results</a> <a class="dropdown-item" href="map_results.html">Map results</a></div>
                    </li>
                    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Restaurants</a>
                        <div class="dropdown-menu"> <a class="dropdown-item" href="restaurants.html">Search results</a> <a class="dropdown-item" href="profile.html">Profile page</a></div>
                    </li>
                    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
                        <div class="dropdown-menu"> <a class="dropdown-item" href="pricing.html">Pricing</a> <a class="dropdown-item" href="contact.html">Contact</a> <a class="dropdown-item" href="submition.html">Submit restaurant</a> <a class="dropdown-item" href="registration.html">Registration</a>
                            <div class="dropdown-divider"></div> <a class="dropdown-item" href="checkout.html">Checkout</a>
                        </div>
                    </li>
                    @if (session('User'))
                    <li class="nav-item"> <a class="nav-link" href="{{ route('auth.logout') }}">Logout</a> </li>
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
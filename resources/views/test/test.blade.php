@extends('layout_template.base')
@section('title', 'Food result Page')

@section('content')
    <div class="page-wrapper">
        <!-- top Links -->
        <div class="top-links">
            <div class="container">
                <ul class="row links">
                    <li class="col-xs-12 col-sm-3 link-item"><span>1</span><a href="#" data-toggle="modal" data-target="#locationModal">Choose Your Location</a></li>
                    <li class="col-xs-12 col-sm-3 link-item"><span>2</span><a href="restaurants">Choose Restaurant</a></li>
                    <li class="col-xs-12 col-sm-3 link-item active"><span>3</span><a href="restaurant-details/1">Pick Your favorite food</a></li>
                    <li class="col-xs-12 col-sm-3 link-item"><span>4</span><a href="checkout.html">Order and Pay online</a></li>
                </ul>
            </div>
        </div>
        <!-- end:Top links -->
        <!-- start: Inner page hero -->
        <div class="inner-page-hero bg-image" data-image-src="http://placehold.it/1670x480">
            <div class="container"> </div>
            <!-- end:Container -->
        </div>
        <div class="result-show">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <p><span class="primary-color"><strong>124</strong></span> Results so far
                    </div>
                    </p>
                    <div class="col-sm-9">
                        <select class="custom-select pull-right">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!-- //results show -->
        <section class="restaurants-page">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
                        <div class="sidebar clearfix m-b-20">
                            //search
                            <div class="main-block">
                                <div class="sidebar-title white-txt">
                                    <h6>Choose Cusine</h6> <i class="fa fa-cutlery pull-right"></i>
                                </div>
                                //search ten
                                <div class="input-group">
                                    <input type="text" class="form-control search-field" placeholder="Search your favorite food"> <span class="input-group-btn">
                                    <button class="btn btn-secondary search-btn" type="button"><i class="fa fa-search"></i></button>
                                </span>
                                </div>
                                <form>
                                    <ul>
                                        //loai mon an
                                        <li>
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"> <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Barbecuing and Grilling</span> </label>
                                        </li>
                                    </ul>
                                </form>
                                <div class="clearfix"></div>
                            </div>
                            <!-- end:Sidebar nav -->
                        </div>
                        <div class="widget clearfix">
                            <!-- /widget heading -->
                            <div class="widget-heading">
                                <h3 class="widget-title text-dark">
                                    Price range
                                </h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="widget-body">
                                //gia tien
                                <div class="range-slider m-b-10"> <span id="ex2CurrentSliderValLabel"> Filter by price:<span id="ex2SliderVal"><strong>35</strong></span>€</span>
                                    <br>
                                    <input id="ex2" type="text" data-slider-min="1" data-slider-max="100" data-slider-step="1" data-slider-value="35" />
                                </div>
                            </div>
                        </div>
                        <!-- end:Pricing widget -->
                        <div class="widget clearfix">
                            <!-- /widget heading -->
                            <div class="widget-heading">
                                <h3 class="widget-title text-dark">
                                    Popular tags
                                </h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="widget-body">
                                <ul class="tags">
                                    <li> <a href="#" class="tag">
                                            Pizza
                                        </a> </li>

                                </ul>
                            </div>
                        </div>
                        <!-- end:Widget -->
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-8 col-lg-9">
                        <div class="row">
                            <!-- Each popular food item starts -->
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 food-item">
                                <div class="food-item-wrap">
                                    <div class="figure-wrap bg-image" data-image-src="http://placehold.it/380x210">
                                        <div class="distance"><i class="fa fa-pin"></i>1240m</div>
                                        <div class="rating pull-left"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
                                        <div class="review pull-right"><a href="#">198 reviews</a> </div>
                                    </div>
                                    <div class="content">
                                        <h5><a href="#">The South"s Best Fried Chicken</a></h5>
                                        <div class="product-name">Fried Chicken with cheese</div>
                                        <div class="price-btn-block"> <span class="price">$ 15,99</span> <a href="restaurant-details/1" class="btn theme-btn-dash pull-right">Order Now</a> </div>
                                    </div>
                                    <div class="restaurant-block">
                                        <div class="left">
                                            <a class="pull-left" href="#"> <img src="http://placehold.it/50x46" alt="Restaurant logo"> </a>
                                            <div class="pull-left right-text"> <a href="#">Chicken Restaurant</a> <span>68 5th Avenue New York</span> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end:right row -->
                    </div>
                </div>
            </div>
        </section>
        <section class="app-section">
            <div class="app-wrap">
                <div class="container">
                    <div class="row text-img-block text-xs-left">
                        <div class="container">
                            <div class="col-xs-12 col-sm-6 right-image text-center hidden-xs-down">
                                <figure> <img src="{{ asset('images/app.png') }}" alt="Right Image"> </figure>
                            </div>
                            <div class="col-xs-12 col-sm-6 left-text">
                                <h3>The Best Food Delivery App</h3>
                                <p>Now you can make food happen pretty much wherever you are thanks to the free easy-to-use Food Delivery &amp; Takeout App.</p>
                                <div class="social-btns">
                                    <a href="#" class="app-btn apple-button clearfix">
                                        <div class="pull-left"><i class="fa fa-apple"></i> </div>
                                        <div class="pull-right"> <span class="text">Available on the</span> <span class="text-2">App Store</span> </div>
                                    </a>
                                    <a href="#" class="app-btn android-button clearfix">
                                        <div class="pull-left"><i class="fa fa-android"></i> </div>
                                        <div class="pull-right"> <span class="text">Available on the</span> <span class="text-2">Play store</span> </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endsection


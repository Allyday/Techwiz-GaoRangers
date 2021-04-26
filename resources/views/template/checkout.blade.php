@extends('layout_template.base')

@section('title', 'Checkout')

@section('content')

<div class="page-wrapper">
    <div class="top-links">
        <div class="container">
            <ul class="row links">
                <li class="col-xs-12 col-sm-3 link-item active"><span>1</span><a href="#" data-toggle="modal" data-target="#locationModal">Choose Your Location</a></li>
                <li class="col-xs-12 col-sm-3 link-item active"><span>2</span><a href="restaurants.html">Choose Restaurant</a></li>
                <li class="col-xs-12 col-sm-3 link-item active"><span>3</span><a href="restaurant-details/1">Pick Your favorite food</a></li>
                <li class="col-xs-12 col-sm-3 link-item"><span>4</span><a href="checkout.html">Order and Pay online</a></li>
            </ul>
        </div>
    </div>
    <div class="container m-t-30">
        <div class="widget clearfix">
            <!-- /widget heading -->
            <div class="widget-heading">
                <h2 class="text-dark">
                    Cart Summary
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="widget-body">
                <form method="post" action="#">
                    <div class="row menu-widget">
                        <div class="col-sm-9 margin-b-30">
                            <div class="cart-table-header">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-lg-5">
                                        <h5 class="cart-table-heading">ITEM</h5>
                                    </div>
                                    <!-- end:col -->
                                    <div class="col-xs-12 col-sm-12 col-lg-2 item-cart-info">
                                        <h5 class="cart-table-heading">PRICE</h5>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-lg-3 item-cart-info">
                                        <h5 class="cart-table-heading">QUANTITY</h5>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-lg-2 item-cart-info">
                                        <h5 class="cart-table-heading">TOTAL</h5>
                                    </div>
                                </div>
                                <!-- end:row -->
                            </div>
                            <div class="food-item">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-lg-5">
                                        <div class="rest-logo pull-left">
                                            <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/100x80" alt="Food logo"></a>
                                        </div>
                                        <!-- end:Logo -->
                                        <div class="rest-descr">
                                            <h6><a href="#">Veg Extravaganza</a></h6>
                                            <p> Burgers, American, Sandwiches, Fast Food, BBQ</p>
                                        </div>
                                        <!-- end:Description -->
                                    </div>
                                    <!-- end:col -->
                                    <div class="col-xs-12 col-sm-12 col-lg-2 item-cart-info">
                                        <span class="price pull-left">$ 19.99</span>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-lg-3 item-cart-info">
                                        <div class="btn btn-small btn-secondary quantity-btn dec">&#8722;</div>
                                        <input class="quantity-input" type="number" class="cart-item-quantity" value="1">
                                        <div class="btn btn-small btn-secondary quantity-btn inc">&#43;</div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-lg-2 item-cart-info">
                                        <span class="price pull-left">$ 39.99</span>
                                    </div>
                                </div>
                                <!-- end:row -->
                            </div>
                            <!-- end:food-item -->

                            <div class="food-item">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-lg-5">
                                        <div class="rest-logo pull-left">
                                            <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/100x80" alt="Food logo"></a>
                                        </div>
                                        <!-- end:Logo -->
                                        <div class="rest-descr">
                                            <h6><a href="#">Veg Extravaganza</a></h6>
                                            <p> Burgers, American, Sandwiches, Fast Food, BBQ</p>
                                        </div>
                                        <!-- end:Description -->
                                    </div>
                                    <!-- end:col -->
                                    <div class="col-xs-12 col-sm-12 col-lg-2 item-cart-info">
                                        <span class="price pull-left">$ 19.99</span>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-lg-3 item-cart-info">
                                        <div class="btn btn-small btn-secondary quantity-btn dec">&#8722;</div>
                                        <input class="quantity-input" type="number" class="cart-item-quantity" value="1">
                                        <div class="btn btn-small btn-secondary quantity-btn inc">&#43;</div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-lg-2 item-cart-info">
                                        <span class="price pull-left">$ 39.99</span>
                                    </div>
                                </div>
                                <!-- end:row -->
                            </div>
                            <!-- end:food-item -->
                        </div>
                        <div class="col-sm-3">
                            <div class="cart-totals margin-b-20">
                                <div class="cart-totals-fields">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Cart Subtotal</td>
                                                <td>$29.00</td>
                                            </tr>
                                            <tr>
                                                <td>Shipping &amp; Handling</td>
                                                <td>$2.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-color"><strong>Total</strong></td>
                                                <td class="text-color"><strong>$31.00</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--cart summary-->
                            <div class="payment-option">
                                <ul class=" list-unstyled">
                                    <li>
                                        <label class="custom-control custom-radio  m-b-20">
                                            <input id="radioStacked1" name="radio-stacked" type="radio" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Cash on delivery</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="custom-control custom-radio  m-b-10">
                                            <input name="radio-stacked" type="radio" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Paypal <img src="{{asset('images/paypal.jpg')}}" alt="" width="90"></span> </label>
                                    </li>
                                </ul>
                                <p class="text-xs-center"> <a href="#" class="btn btn-outline-success btn-block">Pay now</a> </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- script --}}
    <script src="{{ asset('template/js/jquery.js') }}"></script>
    <script>
        $('.quantity-btn').on('click', function() {

            var $button = $(this);
            var oldValue = $button.parent().find('input').val();
            console.log('$button', $button)
            console.log('oldValue', oldValue)
            if ($button.text() == '+') {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                // Don't allow decrementing below zero
                if (oldValue > 0) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 0;
                }
            }

            $button.parent().find('input').val(newVal);

        });
    </script>
    {{-- end script --}}

    @endsection